#!/usr/bin/env php
<?php

declare(strict_types=1);

/**
 * Convert a single-site Sequel Ace WordPress export into a reusable baseline.
 *
 * Usage:
 *   php scripts/sanitize-db-export.php INPUT.sql OUTPUT.sql [PLACEHOLDER_URL]
 *
 * The placeholder must have the same byte length as the exported site URL.
 * This lets the replacement remain safe even when the URL occurs inside PHP
 * serialized strings. Options containing the source URL outside siteurl/home
 * are removed so installers may later replace the placeholder without needing
 * to rewrite serialized data.
 */

const DEFAULT_PLACEHOLDER_URL = 'http://wp-template.local';

$inputPath = $argv[1] ?? null;
$outputPath = $argv[2] ?? null;
$placeholderUrl = rtrim($argv[3] ?? DEFAULT_PLACEHOLDER_URL, '/');

if ($inputPath === null || $outputPath === null || in_array($inputPath, ['-h', '--help'], true)) {
    fwrite(STDERR, "Usage: php scripts/sanitize-db-export.php INPUT.sql OUTPUT.sql [PLACEHOLDER_URL]\n");
    exit($inputPath === null ? 1 : 0);
}

$inputRealPath = realpath($inputPath);
if ($inputRealPath === false || !is_file($inputRealPath)) {
    fail("Input SQL file does not exist: {$inputPath}");
}

$outputDirectory = dirname($outputPath);
if (!is_dir($outputDirectory)) {
    fail("Output directory does not exist: {$outputDirectory}");
}
$outputDirectoryRealPath = realpath($outputDirectory);
if ($outputDirectoryRealPath === false) {
    fail("Cannot resolve output directory: {$outputDirectory}");
}
$outputPath = $outputDirectoryRealPath . DIRECTORY_SEPARATOR . basename($outputPath);
if ($inputRealPath === $outputPath) {
    fail('Input and output paths must be different.');
}

$sql = file_get_contents($inputRealPath);
if ($sql === false) {
    fail("Could not read {$inputRealPath}");
}

$sourceUrl = detectSourceUrl($sql);
if (strlen($sourceUrl) !== strlen($placeholderUrl)) {
    fail(sprintf(
        'Placeholder URL must be %d bytes to match source URL length; got %d bytes.',
        strlen($sourceUrl),
        strlen($placeholderUrl),
    ));
}

$sourceHost = parse_url($sourceUrl, PHP_URL_HOST);
if (!is_string($sourceHost) || $sourceHost === '') {
    fail('Could not determine the source hostname from siteurl.');
}

// Remove deployment identity from the dump header.
$sql = preg_replace('/^# Host:.*$/m', '# Host: sanitized WordPress template export', $sql) ?? $sql;
$sql = preg_replace('/^# Databáze:.*$/mu', '# Databáze: wordpress_template', $sql) ?? $sql;
$sql = preg_replace('/^# Čas vytvoření:.*$/mu', '# Čas vytvoření: sanitized', $sql) ?? $sql;

// The equal-length replacement is safe inside serialized PHP values.
$sql = str_replace($sourceUrl, $placeholderUrl, $sql);

$clearDataTables = array_fill_keys([
    'wp_actionscheduler_actions',
    'wp_actionscheduler_claims',
    'wp_actionscheduler_groups',
    'wp_actionscheduler_logs',
    'wp_asenha_email_delivery',
    'wp_asenha_failed_logins',
    'wp_asenha_formbuilder_entries',
    'wp_asenha_formbuilder_entry_meta',
    'wp_asenha_formbuilder_fields',
    'wp_asenha_formbuilder_forms',
    'wp_commentmeta',
    'wp_comments',
    'wp_links',
    'wp_postmeta',
    'wp_posts',
    'wp_rank_math_internal_links',
    'wp_rank_math_internal_meta',
    'wp_snippets',
    'wp_term_relationships',
    'wp_term_taxonomy',
    'wp_termmeta',
    'wp_terms',
    'wp_usermeta',
    'wp_users',
], true);

$lines = preg_split('/\r\n|\n|\r/', $sql);
if ($lines === false) {
    fail('Could not split SQL into lines.');
}

$sanitized = [];
$lineCount = count($lines);
for ($index = 0; $index < $lineCount; $index++) {
    $line = $lines[$index];

    if (preg_match('/^LOCK TABLES `([^`]+)` WRITE;$/', $line, $match) === 1
        && isset($clearDataTables[$match[1]])) {
        $table = $match[1];
        while ($index < $lineCount && trim($lines[$index]) !== 'UNLOCK TABLES;') {
            $index++;
        }
        if ($index >= $lineCount) {
            fail("Unterminated LOCK TABLES block for {$table}");
        }
        $sanitized[] = "-- Baseline intentionally contains no data for `{$table}`.";
        continue;
    }

    if (str_starts_with($line, 'INSERT INTO `wp_options`')) {
        $statement = [$line];
        while (!str_ends_with(rtrim($lines[$index]), ';')) {
            $index++;
            if ($index >= $lineCount) {
                fail('Unterminated wp_options INSERT statement.');
            }
            $statement[] = $lines[$index];
        }
        foreach (sanitizeOptionsInsert($statement, $sourceHost) as $statementLine) {
            $sanitized[] = $statementLine;
        }
        continue;
    }

    // Insert a valid default category after all schemas exist and before the
    // dump restores the original session settings.
    if (str_starts_with($line, '/*!40111 SET SQL_NOTES=')) {
        foreach (defaultTaxonomySql() as $taxonomyLine) {
            $sanitized[] = $taxonomyLine;
        }
    }

    $sanitized[] = $line;
}

$output = implode("\n", $sanitized);
if (!str_ends_with($output, "\n")) {
    $output .= "\n";
}

validateOutput($output, $sourceUrl, $sourceHost, $placeholderUrl);

$temporaryPath = tempnam($outputDirectoryRealPath, '.sanitized-db.');
if ($temporaryPath === false) {
    fail('Could not create temporary output file.');
}

try {
    if (file_put_contents($temporaryPath, $output) === false) {
        fail("Could not write temporary output {$temporaryPath}");
    }
    chmod($temporaryPath, 0644);
    if (!rename($temporaryPath, $outputPath)) {
        fail("Could not replace {$outputPath}");
    }
} finally {
    if (is_file($temporaryPath)) {
        unlink($temporaryPath);
    }
}

printf(
    "Sanitized %s -> %s\nSource URL replaced with %s\n",
    $inputRealPath,
    $outputPath,
    $placeholderUrl,
);

function fail(string $message): never
{
    fwrite(STDERR, "Error: {$message}\n");
    exit(1);
}

function detectSourceUrl(string $sql): string
{
    if (preg_match(
        '/^\s*\(\d+,\x27siteurl\x27,\x27((?:\\\\.|[^\x27])*)\x27,\x27[^\x27]*\x27\)[,;]$/m',
        $sql,
        $match,
    ) !== 1) {
        fail('Could not find a simple siteurl row in wp_options.');
    }

    $sourceUrl = rtrim(sqlUnescape($match[1]), '/');
    if (filter_var($sourceUrl, FILTER_VALIDATE_URL) === false) {
        fail('The exported siteurl is not a valid URL.');
    }
    return $sourceUrl;
}

/** @param list<string> $statement */
function sanitizeOptionsInsert(array $statement, string $sourceHost): array
{
    $header = [];
    $rows = [];

    foreach ($statement as $line) {
        if (preg_match('/^\s*\(/', $line) !== 1) {
            $header[] = $line;
            continue;
        }

        $fields = parseSqlTuple($line);
        if (count($fields) !== 4) {
            fail('Unexpected wp_options row shape.');
        }

        $optionName = sqlUnquote($fields[1]);
        if (shouldDropOption($optionName, $line, $sourceHost)) {
            continue;
        }

        if ($optionName === 'admin_email') {
            $fields[2] = sqlQuote('admin@example.invalid');
        } elseif ($optionName === 'mailserver_login') {
            $fields[2] = sqlQuote('login@example.invalid');
        } elseif ($optionName === 'mailserver_pass') {
            $fields[2] = sqlQuote('');
        }

        $rows[] = "\t(" . implode(',', $fields) . ')';
    }

    if ($rows === []) {
        return [];
    }

    // Preserve only the INSERT header and VALUES line. Comments and lock
    // statements live outside these individual statements.
    $normalizedHeader = [];
    foreach ($header as $line) {
        $normalizedHeader[] = $line;
        if (trim($line) === 'VALUES') {
            break;
        }
    }
    if ($normalizedHeader === [] || trim(end($normalizedHeader)) !== 'VALUES') {
        fail('wp_options INSERT has no VALUES marker.');
    }

    $last = count($rows) - 1;
    foreach ($rows as $rowIndex => $row) {
        $normalizedHeader[] = $row . ($rowIndex === $last ? ';' : ',');
    }
    return $normalizedHeader;
}

function shouldDropOption(string $name, string $rawRow, string $sourceHost): bool
{
    foreach (['_transient_', '_site_transient_', 'webpc_notice_', 'webpc_stats_', 'vgse_hide_whats_new_'] as $prefix) {
        if (str_starts_with($name, $prefix)) {
            return true;
        }
    }

    if (preg_match('/(secret|token|license|api[_-]?key)/i', $name) === 1) {
        return true;
    }

    $drop = [
        'cron',
        'rewrite_rules',
        'recently_edited',
        'recently_activated',
        'uninstall_plugins',
        'admin_email_lifespan',
        'nonce_key',
        'nonce_salt',
        'auth_key',
        'auth_salt',
        'logged_in_key',
        'logged_in_salt',
        'recovery_keys',
        'user_count',
        'fs_active_plugins',
        'fs_debug_mode',
        'fs_accounts',
        'fs_api_cache',
        'admin_site_enhancements_stats',
        'vgse_last_csv_purge_check',
        'vgse_welcome_redirect',
        'recently_activated_snippets',
        'code_snippets_cloud_settings',
        'code_snippets_assets_rev',
        'action_scheduler_lock_async-request-runner',
        'rank-math-options-instant-indexing',
        'rank_math_install_date',
        'rank_math_flush_rewrite',
        'rank_math_notifications',
        'webpc_errors_cache',
        'webpc_latest_version',
        'db_upgraded',
        'can_compress_scripts',
    ];
    if (in_array($name, $drop, true)) {
        return true;
    }

    // Environment-specific plugin options are safer to regenerate than to
    // rewrite blindly after deployment. siteurl/home are plain scalar rows.
    foreach ([$sourceHost, 'nginx.wp-template.orb.local'] as $environmentHost) {
        if (!in_array($name, ['siteurl', 'home'], true) && str_contains($rawRow, $environmentHost)) {
            return true;
        }
    }
    return false;
}

/** @return list<string> */
function parseSqlTuple(string $line): array
{
    $trimmed = rtrim(trim($line), ',;');
    if (!str_starts_with($trimmed, '(') || !str_ends_with($trimmed, ')')) {
        fail(sprintf(
            'Invalid SQL tuple in wp_options (length %d, first byte %s, last byte %s).',
            strlen($trimmed),
            $trimmed === '' ? 'none' : bin2hex($trimmed[0]),
            $trimmed === '' ? 'none' : bin2hex($trimmed[-1]),
        ));
    }

    $body = substr($trimmed, 1, -1);
    $fields = [];
    $buffer = '';
    $quoted = false;
    $escaped = false;
    $length = strlen($body);

    for ($index = 0; $index < $length; $index++) {
        $character = $body[$index];
        if ($quoted) {
            $buffer .= $character;
            if ($escaped) {
                $escaped = false;
            } elseif ($character === '\\') {
                $escaped = true;
            } elseif ($character === "'") {
                $quoted = false;
            }
            continue;
        }

        if ($character === "'") {
            $quoted = true;
            $buffer .= $character;
        } elseif ($character === ',') {
            $fields[] = trim($buffer);
            $buffer = '';
        } else {
            $buffer .= $character;
        }
    }

    if ($quoted || $escaped) {
        fail('Unterminated quoted value in wp_options tuple.');
    }
    $fields[] = trim($buffer);
    return $fields;
}

function sqlUnquote(string $value): string
{
    if (strlen($value) < 2 || $value[0] !== "'" || $value[-1] !== "'") {
        fail('Expected a quoted SQL string.');
    }
    return sqlUnescape(substr($value, 1, -1));
}

function sqlUnescape(string $value): string
{
    return preg_replace_callback('/\\\\(.)/s', static function (array $match): string {
        return match ($match[1]) {
            '0' => "\0",
            'n' => "\n",
            'r' => "\r",
            't' => "\t",
            'Z' => "\x1a",
            default => $match[1],
        };
    }, $value) ?? $value;
}

function sqlQuote(string $value): string
{
    return "'" . strtr($value, [
        "\\" => "\\\\",
        "\0" => "\\0",
        "\n" => "\\n",
        "\r" => "\\r",
        "\x1a" => "\\Z",
        "'" => "\\'",
        '"' => '\\"',
    ]) . "'";
}

/** @return list<string> */
function defaultTaxonomySql(): array
{
    return [
        '',
        '-- Sanitized default taxonomy data.',
        'LOCK TABLES `wp_terms` WRITE, `wp_term_taxonomy` WRITE;',
        'INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`)',
        "VALUES (1,'Nezařazené','nezarazene',0);",
        'INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`)',
        "VALUES (1,1,'category','',0,0);",
        'UNLOCK TABLES;',
        '',
    ];
}

function validateOutput(string $output, string $sourceUrl, string $sourceHost, string $placeholderUrl): void
{
    $required = [
        'CREATE TABLE `wp_options`',
        'CREATE TABLE `wp_users`',
        "'siteurl','{$placeholderUrl}'",
        "'home','{$placeholderUrl}'",
        "'active_plugins'",
        "'wp_user_roles'",
    ];
    foreach ($required as $needle) {
        if (!str_contains($output, $needle)) {
            fail("Sanitized output is missing required content: {$needle}");
        }
    }

    if (substr_count($output, $placeholderUrl) !== 2) {
        fail('The placeholder URL must occur exactly twice (siteurl and home).');
    }

    $forbidden = [
        $sourceUrl,
        $sourceHost,
        'nginx.wp-template.orb.local',
        '@esoul.cz',
        'session_tokens',
        'community-events-location',
        'INSERT INTO `wp_users`',
        'INSERT INTO `wp_usermeta`',
        'vgse_secret_key',
        'fs_accounts',
        'code_snippets_cloud_settings',
    ];
    foreach ($forbidden as $needle) {
        if (str_contains($output, $needle)) {
            fail("Sanitized output still contains forbidden content: {$needle}");
        }
    }
}
