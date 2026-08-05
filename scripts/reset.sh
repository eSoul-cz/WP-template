#!/usr/bin/env bash
set -Eeuo pipefail

# Reset one deployed WordPress site to the repository baseline.
#
# The script is intentionally single-site only. It expects the selected
# container to bind-mount this project's wp-content directory and the supplied
# database to belong exclusively to that site.

SCRIPT_DIR="$(CDPATH= cd -- "$(dirname -- "${BASH_SOURCE[0]}")" && pwd -P)"
PROJECT_ROOT="$(dirname -- "$SCRIPT_DIR")"

DEFAULT_REPO_URL="https://github.com/eSoul-cz/WP-template.git"
if git -C "$PROJECT_ROOT" remote get-url origin >/dev/null 2>&1; then
  DEFAULT_REPO_URL="$(git -C "$PROJECT_ROOT" remote get-url origin)"
fi

REPO_URL="$DEFAULT_REPO_URL"
REF="master"
CONTAINER=""
CONTENT_DIR="$PROJECT_ROOT/wp-content"
BACKUP_ROOT="$PROJECT_ROOT/.reset-backups"
DB_HOST="127.0.0.1"
DB_PORT="3306"
DB_NAME=""
DB_USER=""
DB_PASSWORD="${WP_RESET_DB_PASSWORD:-}"
SITE_URL=""
SOURCE_URL="http://nginx.wp-template.orb.local"
ASSUME_YES=0
ADMINS=()

TMP_DIR=""
DB_CONFIG=""
DB_CLIENT=""
DB_DUMP_CLIENT=""
RUN_BACKUP_DIR=""
DB_BACKUP=""
CONTENT_BACKUP=""
ADMIN_CREDENTIALS=""
CONTAINER_STOPPED=0
BACKUP_READY=0
MUTATION_STARTED=0
CONTENT_UID="82"
CONTENT_GID="82"

usage() {
  cat <<EOF
Usage: $(basename "$0") [options]

Destructively resets one WordPress installation to db.sql and wp-content from
a GitHub repository ref. The existing DB and wp-content are backed up first.

Required (prompted when omitted):
  --container NAME        Deployed WordPress container, e.g. wp1
  --db-name NAME          Dedicated database/schema for this site
  --db-user USER          Application-level database user
  --url URL               Final site URL, including http:// or https://
  --admin USER:EMAIL      Administrator to create; repeatable

Database options:
  --db-host HOST          Database host as reached from the server (default: 127.0.0.1)
  --db-port PORT          Database port (default: 3306)
  WP_RESET_DB_PASSWORD    Optional environment variable for non-interactive use;
                          otherwise the DB password is requested with hidden input

Repository/content options:
  --repo URL              Git repository (default: $DEFAULT_REPO_URL)
  --ref REF               Branch or tag to reset from (default: master)
  --content-dir PATH      Host wp-content bind mount (default: $CONTENT_DIR)
  --backup-dir PATH       Backup root (default: $BACKUP_ROOT)
  --source-url URL        URL stored in db.sql (default: $SOURCE_URL)

Safety/automation:
  --yes                   Skip the typed container-name confirmation
  -h, --help              Show this help

Example:
  sudo scripts/reset.sh --container wp1 --db-name wp1 --db-user wp1 --url https://wp1.example.com --admin admin:admin@example.com

Requirements:
  docker, git, php, rsync, tar, gzip, and mariadb/mysql client utilities.
  Run as root so restored content can be owned by the container user 82:82.
  The DB user needs all normal WordPress schema privileges, including CREATE,
  DROP, ALTER, LOCK TABLES and SHOW VIEW, on its dedicated schema. Git
  authentication must already work for private repos. Multisite is unsupported.
EOF
}

die() {
  echo "Error: $*" >&2
  exit 1
}

warn() {
  echo "Warning: $*" >&2
}

require_value() {
  local option="$1"
  local value="${2-}"
  [[ -n "$value" ]] || die "$option requires a value"
}

parse_args() {
  while [[ $# -gt 0 ]]; do
    case "$1" in
      --container)
        require_value "$1" "${2-}"; CONTAINER="$2"; shift 2;;
      --container=*) CONTAINER="${1#*=}"; shift;;
      --db-host)
        require_value "$1" "${2-}"; DB_HOST="$2"; shift 2;;
      --db-host=*) DB_HOST="${1#*=}"; shift;;
      --db-port)
        require_value "$1" "${2-}"; DB_PORT="$2"; shift 2;;
      --db-port=*) DB_PORT="${1#*=}"; shift;;
      --db-name)
        require_value "$1" "${2-}"; DB_NAME="$2"; shift 2;;
      --db-name=*) DB_NAME="${1#*=}"; shift;;
      --db-user)
        require_value "$1" "${2-}"; DB_USER="$2"; shift 2;;
      --db-user=*) DB_USER="${1#*=}"; shift;;
      --url)
        require_value "$1" "${2-}"; SITE_URL="$2"; shift 2;;
      --url=*) SITE_URL="${1#*=}"; shift;;
      --source-url)
        require_value "$1" "${2-}"; SOURCE_URL="$2"; shift 2;;
      --source-url=*) SOURCE_URL="${1#*=}"; shift;;
      --admin)
        require_value "$1" "${2-}"; ADMINS+=("$2"); shift 2;;
      --admin=*) ADMINS+=("${1#*=}"); shift;;
      --repo)
        require_value "$1" "${2-}"; REPO_URL="$2"; shift 2;;
      --repo=*) REPO_URL="${1#*=}"; shift;;
      --ref)
        require_value "$1" "${2-}"; REF="$2"; shift 2;;
      --ref=*) REF="${1#*=}"; shift;;
      --content-dir)
        require_value "$1" "${2-}"; CONTENT_DIR="$2"; shift 2;;
      --content-dir=*) CONTENT_DIR="${1#*=}"; shift;;
      --backup-dir)
        require_value "$1" "${2-}"; BACKUP_ROOT="$2"; shift 2;;
      --backup-dir=*) BACKUP_ROOT="${1#*=}"; shift;;
      --yes) ASSUME_YES=1; shift;;
      -h|--help) usage; exit 0;;
      *) die "unknown option: $1";;
    esac
  done
}

prompt_missing_values() {
  if [[ -z "$CONTAINER" ]]; then
    read -r -p "WordPress container name (for example wp1): " CONTAINER
  fi
  if [[ -z "$DB_NAME" ]]; then
    read -r -p "Dedicated database name for $CONTAINER: " DB_NAME
  fi
  if [[ -z "$DB_USER" ]]; then
    read -r -p "Application DB user for $DB_NAME: " DB_USER
  fi
  if [[ -z "$DB_PASSWORD" ]]; then
    read -r -s -p "Password for DB user $DB_USER: " DB_PASSWORD
    echo
  fi
  if [[ -z "$SITE_URL" ]]; then
    read -r -p "Final site URL (including https://): " SITE_URL
  fi
  if [[ ${#ADMINS[@]} -eq 0 ]]; then
    local admin
    read -r -p "Administrator as USER:EMAIL: " admin
    ADMINS+=("$admin")
  fi
}

find_requirements() {
  local command
  for command in docker git php rsync tar gzip; do
    command -v "$command" >/dev/null 2>&1 || die "$command is required"
  done

  if command -v mariadb >/dev/null 2>&1; then
    DB_CLIENT="mariadb"
  elif command -v mysql >/dev/null 2>&1; then
    DB_CLIENT="mysql"
  else
    die "mariadb or mysql client is required"
  fi

  if command -v mariadb-dump >/dev/null 2>&1; then
    DB_DUMP_CLIENT="mariadb-dump"
  elif command -v mysqldump >/dev/null 2>&1; then
    DB_DUMP_CLIENT="mysqldump"
  else
    die "mariadb-dump or mysqldump is required"
  fi
}

validate_inputs() {
  [[ "${EUID:-$(id -u)}" -eq 0 ]] || die "run this reset as root (for example with sudo) so wp-content can be owned by 82:82"
  [[ -n "$CONTAINER" ]] || die "container name cannot be empty"
  [[ "$CONTAINER" =~ ^[a-zA-Z0-9][a-zA-Z0-9_.-]*$ ]] || die "invalid container name"
  [[ "$DB_PORT" =~ ^[0-9]+$ ]] || die "DB port must be numeric"
  (( DB_PORT > 0 && DB_PORT <= 65535 )) || die "DB port must be between 1 and 65535"
  [[ "$DB_NAME" =~ ^[a-zA-Z0-9_$-]+$ ]] || die "DB name contains unsupported characters"
  [[ "$DB_USER" != *$'\n'* && "$DB_USER" != *$'\r'* ]] || die "DB user cannot contain a newline"
  [[ "$DB_PASSWORD" != *$'\n'* && "$DB_PASSWORD" != *$'\r'* ]] || die "DB password cannot contain a newline"
  [[ "$SITE_URL" =~ ^https?://[^[:space:]]+$ ]] || die "site URL must start with http:// or https:// and contain no spaces"
  [[ "$SOURCE_URL" =~ ^https?://[^[:space:]]+$ ]] || die "source URL must start with http:// or https:// and contain no spaces"

  SITE_URL="${SITE_URL%/}"
  SOURCE_URL="${SOURCE_URL%/}"

  local normalized_db_name
  normalized_db_name="$(printf '%s' "$DB_NAME" | tr '[:upper:]' '[:lower:]')"
  case "$normalized_db_name" in
    mysql|information_schema|performance_schema|sys)
      die "refusing to reset system database $DB_NAME";;
  esac

  local entry username email
  for entry in "${ADMINS[@]}"; do
    username="${entry%%:*}"
    email="${entry#*:}"
    [[ "$entry" == *:* && -n "$username" && -n "$email" ]] || die "invalid --admin '$entry'; expected USER:EMAIL"
    [[ "$username" =~ ^[a-zA-Z0-9_.@-]+$ ]] || die "admin username '$username' contains unsupported characters"
    [[ "$email" =~ ^[^[:space:]@]+@[^[:space:]@]+\.[^[:space:]@]+$ ]] || die "invalid admin email '$email'"
  done

  docker inspect "$CONTAINER" >/dev/null 2>&1 || die "Docker container '$CONTAINER' does not exist"
  [[ -d "$CONTENT_DIR" ]] || die "wp-content directory does not exist: $CONTENT_DIR"
  CONTENT_DIR="$(CDPATH= cd -- "$CONTENT_DIR" && pwd -P)"
  [[ "$CONTENT_DIR" != "/" && "$CONTENT_DIR" != "$PROJECT_ROOT" ]] || die "unsafe wp-content path: $CONTENT_DIR"

  local mounted_source
  mounted_source="$(docker inspect --format '{{range .Mounts}}{{if eq .Destination "/var/www/html/wp-content"}}{{println .Source}}{{end}}{{end}}' "$CONTAINER")"
  mounted_source="${mounted_source%$'\n'}"
  [[ -n "$mounted_source" ]] || die "$CONTAINER does not mount /var/www/html/wp-content"
  mounted_source="$(CDPATH= cd -- "$mounted_source" && pwd -P)"
  [[ "$mounted_source" == "$CONTENT_DIR" ]] || die "$CONTAINER mounts $mounted_source, not requested $CONTENT_DIR"

}

write_db_config() {
  local escaped_password="$DB_PASSWORD"
  escaped_password="${escaped_password//\\/\\\\}"
  escaped_password="${escaped_password//\"/\\\"}"

  umask 077
  DB_CONFIG="$TMP_DIR/db-client.cnf"
  {
    printf '[client]\n'
    printf 'password="%s"\n' "$escaped_password"
  } >"$DB_CONFIG"
}

db() {
  "$DB_CLIENT" --defaults-extra-file="$DB_CONFIG" \
    --protocol=tcp -h "$DB_HOST" -P "$DB_PORT" -u "$DB_USER" "$DB_NAME" "$@"
}

test_db_connection() {
  local selected_db
  selected_db="$(db --batch --skip-column-names -e 'SELECT DATABASE();')"
  [[ "$selected_db" == "$DB_NAME" ]] || die "connected to unexpected database '$selected_db'"
}

download_baseline() {
  local snapshot="$TMP_DIR/repository"
  echo "Downloading $REPO_URL at ref $REF ..."
  git clone --quiet --depth 1 --filter=blob:none --sparse --branch "$REF" -- "$REPO_URL" "$snapshot"
  git -C "$snapshot" sparse-checkout set wp-content scripts

  [[ -d "$snapshot/wp-content" ]] || die "selected repository ref has no wp-content directory"
  [[ -f "$snapshot/db.sql" ]] || die "selected repository ref has no db.sql"
  grep -Eq '^[[:space:]]*CREATE TABLE `wp_options`' "$snapshot/db.sql" || die "db.sql does not create wp_options"
  grep -Eq '^[[:space:]]*CREATE TABLE `wp_users`' "$snapshot/db.sql" || die "db.sql does not create wp_users"
  grep -Fq "'siteurl'" "$snapshot/db.sql" || die "db.sql has no siteurl option; the baseline appears incomplete or over-sanitized"
  grep -Fq "'home'" "$snapshot/db.sql" || die "db.sql has no home option; the baseline appears incomplete or over-sanitized"

  if grep -Eiq '^[[:space:]]*((CREATE|DROP)[[:space:]]+DATABASE|USE[[:space:]])' "$snapshot/db.sql"; then
    die "db.sql contains database-level CREATE, DROP, or USE statements"
  fi
}

confirm_reset() {
  echo
  echo "DESTRUCTIVE RESET SUMMARY"
  echo "  Container:  $CONTAINER"
  echo "  Database:   $DB_USER@$DB_HOST:$DB_PORT/$DB_NAME"
  echo "  wp-content: $CONTENT_DIR"
  echo "  Baseline:   $REPO_URL @ $REF"
  echo "  Site URL:   $SITE_URL"
  echo "  Backups:    $BACKUP_ROOT/$CONTAINER/<timestamp>"
  echo
  echo "All existing tables/views and all current wp-content files will be replaced."

  if [[ "$ASSUME_YES" -eq 1 ]]; then
    return
  fi

  local confirmation
  read -r -p "Type the container name '$CONTAINER' to continue: " confirmation
  [[ "$confirmation" == "$CONTAINER" ]] || die "confirmation did not match; nothing was changed"
}

stop_container() {
  local running
  running="$(docker inspect --format '{{.State.Running}}' "$CONTAINER")"
  if [[ "$running" == "true" ]]; then
    echo "Stopping $CONTAINER ..."
    docker stop --time 30 "$CONTAINER" >/dev/null
    CONTAINER_STOPPED=1
  else
    warn "$CONTAINER was already stopped"
  fi
}

create_backups() {
  local timestamp
  timestamp="$(date -u +'%Y%m%dT%H%M%SZ')"
  RUN_BACKUP_DIR="$BACKUP_ROOT/$CONTAINER/$timestamp"
  mkdir -p "$RUN_BACKUP_DIR"
  RUN_BACKUP_DIR="$(CDPATH= cd -- "$RUN_BACKUP_DIR" && pwd -P)"
  DB_BACKUP="$RUN_BACKUP_DIR/database.sql.gz"
  CONTENT_BACKUP="$RUN_BACKUP_DIR/wp-content.tar.gz"
  ADMIN_CREDENTIALS="$RUN_BACKUP_DIR/new-admins.txt"

  echo "Backing up database ..."
  "$DB_DUMP_CLIENT" --defaults-extra-file="$DB_CONFIG" \
    --protocol=tcp -h "$DB_HOST" -P "$DB_PORT" -u "$DB_USER" \
    --single-transaction --quick --skip-lock-tables --no-tablespaces --default-character-set=utf8mb4 \
    "$DB_NAME" | gzip -c >"$DB_BACKUP"
  [[ -s "$DB_BACKUP" ]] || die "database backup is empty"

  echo "Backing up wp-content ..."
  tar -C "$(dirname -- "$CONTENT_DIR")" -czf "$CONTENT_BACKUP" "$(basename -- "$CONTENT_DIR")"
  [[ -s "$CONTENT_BACKUP" ]] || die "wp-content backup is empty"

  {
    printf 'container=%s\n' "$CONTAINER"
    printf 'database=%s@%s:%s/%s\n' "$DB_USER" "$DB_HOST" "$DB_PORT" "$DB_NAME"
    printf 'content_dir=%s\n' "$CONTENT_DIR"
    printf 'repository=%s\n' "$REPO_URL"
    printf 'ref=%s\n' "$REF"
    printf 'site_url=%s\n' "$SITE_URL"
    printf 'created_utc=%s\n' "$timestamp"
  } >"$RUN_BACKUP_DIR/reset-metadata.txt"

  BACKUP_READY=1
  echo "Backups created in $RUN_BACKUP_DIR"
}

clear_database() {
  local drop_sql="$TMP_DIR/drop-all.sql"
  {
    printf 'SET FOREIGN_KEY_CHECKS=0;\n'
    db --batch --skip-column-names -e \
      'SELECT CONCAT("DROP VIEW IF EXISTS `", REPLACE(TABLE_NAME, "`", "``"), "`;") FROM information_schema.VIEWS WHERE TABLE_SCHEMA = DATABASE();'
    db --batch --skip-column-names -e \
      'SELECT CONCAT("DROP TABLE IF EXISTS `", REPLACE(TABLE_NAME, "`", "``"), "`;") FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() AND TABLE_TYPE = "BASE TABLE";'
    printf 'SET FOREIGN_KEY_CHECKS=1;\n'
  } >"$drop_sql"
  db --binary-mode=1 <"$drop_sql"
}

sql_hex() {
  php -r 'echo bin2hex(stream_get_contents(STDIN));'
}

generate_password() {
  php -r '
    $chars = "abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789!@#$%^&*()-_=+";
    $password = "";
    for ($i = 0; $i < 20; $i++) {
        $password .= $chars[random_int(0, strlen($chars) - 1)];
    }
    echo $password;
  '
}

hash_password() {
  php -r '
    $password = stream_get_contents(STDIN);
    $prepared = base64_encode(hash_hmac("sha384", trim($password), "wp-sha384", true));
    echo "\x24wp" . password_hash($prepared, PASSWORD_BCRYPT);
  '
}

configure_site_and_admins() {
  local setup_sql="$TMP_DIR/configure-site.sql"
  local site_url_hex source_url_hex primary_admin_email primary_admin_email_hex
  site_url_hex="$(printf '%s' "$SITE_URL" | sql_hex)"
  source_url_hex="$(printf '%s' "$SOURCE_URL" | sql_hex)"
  primary_admin_email="${ADMINS[0]#*:}"
  primary_admin_email_hex="$(printf '%s' "$primary_admin_email" | sql_hex)"

  {
    printf 'START TRANSACTION;\n'
    printf "INSERT INTO wp_options (option_name, option_value, autoload) VALUES ('siteurl', CONVERT(UNHEX('%s') USING utf8mb4), 'on'), ('home', CONVERT(UNHEX('%s') USING utf8mb4), 'on'), ('admin_email', CONVERT(UNHEX('%s') USING utf8mb4), 'on') ON DUPLICATE KEY UPDATE option_value=VALUES(option_value);\n" "$site_url_hex" "$site_url_hex" "$primary_admin_email_hex"
    printf "UPDATE wp_posts SET post_content=REPLACE(post_content, CONVERT(UNHEX('%s') USING utf8mb4), CONVERT(UNHEX('%s') USING utf8mb4)), post_excerpt=REPLACE(post_excerpt, CONVERT(UNHEX('%s') USING utf8mb4), CONVERT(UNHEX('%s') USING utf8mb4));\n" \
      "$source_url_hex" "$site_url_hex" "$source_url_hex" "$site_url_hex"
    printf 'DELETE FROM wp_usermeta;\n'
    printf 'DELETE FROM wp_users;\n'
    printf 'ALTER TABLE wp_users AUTO_INCREMENT=1;\n'
    printf 'ALTER TABLE wp_usermeta AUTO_INCREMENT=1;\n'

    local id=1 entry username email password hash
    local username_hex email_hex password_hash_hex registered_at
    registered_at="$(date -u +'%Y-%m-%d %H:%M:%S')"
    : >"$ADMIN_CREDENTIALS"
    chmod 600 "$ADMIN_CREDENTIALS"

    for entry in "${ADMINS[@]}"; do
      username="${entry%%:*}"
      email="${entry#*:}"
      password="$(generate_password)"
      hash="$(printf '%s' "$password" | hash_password)"
      username_hex="$(printf '%s' "$username" | sql_hex)"
      email_hex="$(printf '%s' "$email" | sql_hex)"
      password_hash_hex="$(printf '%s' "$hash" | sql_hex)"

      printf "INSERT INTO wp_users (ID, user_login, user_pass, user_nicename, user_email, user_url, user_registered, user_activation_key, user_status, display_name) VALUES (%d, CONVERT(UNHEX('%s') USING utf8mb4), CONVERT(UNHEX('%s') USING utf8mb4), CONVERT(UNHEX('%s') USING utf8mb4), CONVERT(UNHEX('%s') USING utf8mb4), '', '%s', '', 0, CONVERT(UNHEX('%s') USING utf8mb4));\n" \
        "$id" "$username_hex" "$password_hash_hex" "$username_hex" "$email_hex" "$registered_at" "$username_hex"
      printf "INSERT INTO wp_usermeta (user_id, meta_key, meta_value) VALUES (%d, 'wp_capabilities', 'a:1:{s:13:\"administrator\";b:1;}'), (%d, 'wp_user_level', '10');\n" "$id" "$id"
      printf 'User: %s\nEmail: %s\nPassword: %s\n\n' "$username" "$email" "$password" >>"$ADMIN_CREDENTIALS"
      id=$((id + 1))
    done
    printf 'COMMIT;\n'
  } >"$setup_sql"

  db --binary-mode=1 <"$setup_sql"
}

restore_baseline_content() {
  echo "Replacing wp-content from repository baseline ..."
  rsync -a --delete --no-owner --no-group "$TMP_DIR/repository/wp-content/" "$CONTENT_DIR/"
  normalize_content_permissions
}

normalize_content_permissions() {
  find "$CONTENT_DIR" -type d -exec chmod 0755 {} +
  find "$CONTENT_DIR" -type f -exec chmod 0644 {} +
  chown -R "$CONTENT_UID:$CONTENT_GID" "$CONTENT_DIR"
}

import_baseline() {
  echo "Clearing database $DB_NAME ..."
  clear_database
  echo "Importing repository db.sql ..."
  db --binary-mode=1 <"$TMP_DIR/repository/db.sql"
  configure_site_and_admins
  restore_baseline_content
}

start_and_wait_for_container() {
  echo "Starting $CONTAINER ..."
  docker start "$CONTAINER" >/dev/null
  CONTAINER_STOPPED=0

  local attempt running health
  for attempt in $(seq 1 45); do
    running="$(docker inspect --format '{{.State.Running}}' "$CONTAINER")"
    health="$(docker inspect --format '{{if .State.Health}}{{.State.Health.Status}}{{else}}none{{end}}' "$CONTAINER")"
    if [[ "$running" == "true" && ( "$health" == "healthy" || "$health" == "none" ) ]]; then
      echo "$CONTAINER is running (health: $health)."
      return 0
    fi
    if [[ "$running" != "true" || "$health" == "unhealthy" ]]; then
      docker logs --tail 50 "$CONTAINER" >&2 || true
      return 1
    fi
    sleep 2
  done

  docker logs --tail 50 "$CONTAINER" >&2 || true
  die "$CONTAINER did not become healthy within 90 seconds"
}

rollback() {
  echo "Reset failed; restoring database and wp-content backups ..." >&2
  local rollback_status=0
  clear_database || rollback_status=1
  if [[ "$rollback_status" -eq 0 ]]; then
    gzip -dc "$DB_BACKUP" | db --binary-mode=1 || rollback_status=1
  fi

  local rollback_dir="$TMP_DIR/rollback"
  mkdir -p "$rollback_dir" || rollback_status=1
  tar -xzf "$CONTENT_BACKUP" -C "$rollback_dir" || rollback_status=1
  if [[ "$rollback_status" -eq 0 ]]; then
    rsync -a --delete --no-owner --no-group "$rollback_dir/$(basename -- "$CONTENT_DIR")/" "$CONTENT_DIR/" || rollback_status=1
  fi
  normalize_content_permissions || rollback_status=1
  [[ "$rollback_status" -eq 0 ]] || return 1
  echo "Rollback completed." >&2
}

handle_exit() {
  local exit_code=$?
  trap - EXIT INT TERM

  if [[ "$exit_code" -eq 0 ]]; then
    if [[ -n "$TMP_DIR" && -d "$TMP_DIR" ]]; then
      rm -rf -- "$TMP_DIR"
    fi
    return 0
  fi

  set +e

  if [[ "$BACKUP_READY" -eq 1 && "$MUTATION_STARTED" -eq 1 ]]; then
    if [[ "$(docker inspect --format '{{.State.Running}}' "$CONTAINER" 2>/dev/null)" == "true" ]]; then
      docker stop --time 30 "$CONTAINER" >/dev/null || true
      CONTAINER_STOPPED=1
    fi
    if ! rollback; then
      echo "AUTOMATIC ROLLBACK FAILED. Backups are in $RUN_BACKUP_DIR" >&2
    fi
  fi

  if [[ "$CONTAINER_STOPPED" -eq 1 ]]; then
    docker start "$CONTAINER" >/dev/null || true
  fi
  if [[ -n "$TMP_DIR" && -d "$TMP_DIR" ]]; then
    rm -rf -- "$TMP_DIR"
  fi
  exit "$exit_code"
}

main() {
  parse_args "$@"
  find_requirements
  prompt_missing_values
  validate_inputs

  TMP_DIR="$(mktemp -d "${TMPDIR:-/tmp}/wp-reset.XXXXXXXX")"
  trap handle_exit EXIT
  trap 'exit 130' INT
  trap 'exit 143' TERM
  write_db_config
  test_db_connection
  download_baseline
  confirm_reset
  stop_container
  create_backups

  MUTATION_STARTED=1
  import_baseline
  start_and_wait_for_container
  MUTATION_STARTED=0

  rm -rf -- "$TMP_DIR"
  TMP_DIR=""
  trap - EXIT INT TERM

  echo
  echo "Reset completed successfully."
  echo "Backups:          $RUN_BACKUP_DIR"
  echo "Admin credentials: $ADMIN_CREDENTIALS"
  echo
  cat "$ADMIN_CREDENTIALS"
  echo "Store these passwords securely, then remove the credentials file when no longer needed."
}

main "$@"
