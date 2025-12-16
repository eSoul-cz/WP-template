<?php
/**
 * Preload all WP core php files in opcache
 */
declare(strict_types=1);

const APP_PATH = '/var/www/html/';

$preload_patterns = [
    // WP native files (priority).
    'wp-load.php',
    'wp-config.php',
    'wp-settings.php',
    'wp-login.php',

    'wp-includes/class-wp-error.php',
    'wp-includes/wp-db.php',

    // HTTP / template / links
    'wp-includes/http.php',
    'wp-includes/class-http.php',
    'wp-includes/general-template.php',
    'wp-includes/link-template.php',

    // HTTP response / request
    'wp-includes/class-wp-http-response.php',
    'wp-includes/class-wp-http-requests-hooks.php',
    'wp-includes/class-wp-http-proxy.php',
    'wp-includes/class-wp-http-requests-response.php',
    'wp-includes/class-wp-http-cookie.php',

    // Query / user / post / roles
    'wp-includes/class-wp-query.php',
    'wp-includes/class-wp-tax-query.php',
    'wp-includes/class-wp-user.php',
    'wp-includes/class-wp-post.php',
    'wp-includes/class-wp-roles.php',
    'wp-includes/class-wp-role.php',

    // Functional core
    'wp-includes/taxonomy.php',
    'wp-includes/post.php',
    'wp-includes/user.php',
    'wp-includes/pluggable.php',
    'wp-includes/rest-api.php',
    'wp-includes/kses.php',
    'wp-includes/capabilities.php',
    'wp-includes/comment.php',
    'wp-includes/query.php',
    'wp-includes/l10n.php',
    'wp-includes/shortcodes.php',
    'wp-includes/theme.php',
    'wp-includes/post-template.php',
    'wp-includes/post-thumbnail-template.php',
    'wp-includes/media.php',
    'wp-includes/date.php',
    'wp-includes/author-template.php',
    'wp-includes/functions.php',
];

foreach ($preload_patterns as $file) {
    opcache_compile_file(APP_PATH . $file);
}