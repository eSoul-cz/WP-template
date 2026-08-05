#!/usr/bin/env bash
set -euo pipefail

# WordPress Docker template installer
# Generates .env, .env.secrets, docker-compose.project.yml (if needed),
# prepares db.generated.sql with updated domain and admin users, and
# optionally imports it into the configured MySQL database.

PROJECT_ROOT="$(pwd)"
ENV_FILE="$PROJECT_ROOT/.env"
ENV_SECRETS_FILE="$PROJECT_ROOT/.env.secrets"
DB_SQL_TEMPLATE="$PROJECT_ROOT/db.sql"
DB_SQL_GENERATED="$PROJECT_ROOT/db.generated.sql"
DOCKER_COMPOSE_BASE="$PROJECT_ROOT/docker-compose.template.yml"
DOCKER_COMPOSE_LOCAL="$PROJECT_ROOT/docker-compose.yml"
NGINX_TEMPLATE="$PROJECT_ROOT/nginx-site.conf"

DB_HOST_DEFAULT="host.docker.internal"
DB_PORT_DEFAULT=3306

DOMAIN=""
PROJECT_NAME=""
CONTAINER_NAME=""
DB_HOST="$DB_HOST_DEFAULT"
DB_PORT="$DB_PORT_DEFAULT"
DB_NAME=""
DB_USER=""
DB_PASS=""
FORCE=0
NO_DB_IMPORT=0
ADMINS=()

# Prefer mariadb client if available, otherwise fall back to mysql
DB_CLIENT=""

if command -v mariadb >/dev/null 2>&1; then
  DB_CLIENT="mariadb"
elif command -v mysql >/dev/null 2>&1; then
  DB_CLIENT="mysql"
fi

usage() {
  cat <<EOF
Usage: $(basename "$0") [options]

Required:
  -d, --domain DOMAIN          Site domain (e.g. mysite.local)
  -n, --db-name NAME           Database name
  -u, --db-user USER           Database user
  -a, --admin USER:EMAIL       Admin user (repeatable)

Optional:
  -H, --db-host HOST           Database host (default: $DB_HOST_DEFAULT)
  -P, --db-port PORT           Database port (default: $DB_PORT_DEFAULT)
  -p, --db-pass PASS           Database password (will prompt if omitted)
      --project-name NAME      Logical project name (used for container and nginx)
      --no-db-import           Generate files only, skip SQL import
  -f, --force                  Overwrite existing .env, .env.secrets, db.generated.sql
  -h, --help                   Show this help

Examples:
  $(basename "$0") -d mysite.local -n wp_db -u wp_user -a admin:admin@example.com
  $(basename "$0") --domain=blog.local --db-name=blogdb --db-user=blog --admin=admin:admin@blog.local
EOF
}

error() {
  echo "Error: $*" >&2
  exit 1
}

check_requirements() {
  command -v php >/dev/null 2>&1 || error "php CLI is required but not found in PATH"
  if [[ -z "$DB_CLIENT" ]]; then
    error "Neither 'mariadb' nor 'mysql' client is available in PATH; please install one of them."
  fi
  [[ -f "$DB_SQL_TEMPLATE" ]] || error "Template SQL file not found at $DB_SQL_TEMPLATE"
  [[ -f "$PROJECT_ROOT/scripts/passwords.php" ]] || error "scripts/passwords.php not found; run from WP template root"
  [[ -f "$NGINX_TEMPLATE" ]] || error "nginx-site.conf not found at $NGINX_TEMPLATE"
}

parse_args() {
  local arg
  while [[ $# -gt 0 ]]; do
    arg="$1"; shift
    case "$arg" in
      -d|--domain)
        [[ $# -gt 0 ]] || error "--domain requires a value"
        DOMAIN="$1"; shift;
        ;;
      --domain=*)
        DOMAIN="${arg#*=}"
        ;;
      -H|--db-host)
        [[ $# -gt 0 ]] || error "--db-host requires a value"
        DB_HOST="$1"; shift;
        ;;
      --db-host=*)
        DB_HOST="${arg#*=}"
        ;;
      -P|--db-port)
        [[ $# -gt 0 ]] || error "--db-port requires a value"
        DB_PORT="$1"; shift;
        ;;
      --db-port=*)
        DB_PORT="${arg#*=}"
        ;;
      -n|--db-name)
        [[ $# -gt 0 ]] || error "--db-name requires a value"
        DB_NAME="$1"; shift;
        ;;
      --db-name=*)
        DB_NAME="${arg#*=}"
        ;;
      -u|--db-user)
        [[ $# -gt 0 ]] || error "--db-user requires a value"
        DB_USER="$1"; shift;
        ;;
      --db-user=*)
        DB_USER="${arg#*=}"
        ;;
      -p|--db-pass)
        [[ $# -gt 0 ]] || error "--db-pass requires a value"
        DB_PASS="$1"; shift;
        ;;
      --db-pass=*)
        DB_PASS="${arg#*=}"
        ;;
      -a|--admin)
        [[ $# -gt 0 ]] || error "--admin requires USER:EMAIL value"
        ADMINS+=("$1"); shift;
        ;;
      --admin=*)
        ADMINS+=("${arg#*=}")
        ;;
      --project-name)
        [[ $# -gt 0 ]] || error "--project-name requires a value"
        PROJECT_NAME="$1"; shift;
        ;;
      --project-name=*)
        PROJECT_NAME="${arg#*=}"
        ;;
      --no-db-import)
        NO_DB_IMPORT=1
        ;;
      -f|--force)
        FORCE=1
        ;;
      -h|--help)
        usage
        exit 0
        ;;
      *)
        error "Unknown argument: $arg"
        ;;
    esac
  done
}

normalize_project_name() {
  if [[ -z "$PROJECT_NAME" ]]; then
    # Default to domain without dots if project name not provided
    PROJECT_NAME="$DOMAIN"
  fi
  # container_name: ascii, lowercase, snake_case
  local normalized
  normalized="$(echo "$PROJECT_NAME" | iconv -c -t ascii//TRANSLIT 2>/dev/null || echo "$PROJECT_NAME")"
  normalized="${normalized//[^a-zA-Z0-9]+/_}"
  normalized="${normalized//__/_}"
  normalized="${normalized// /_}"
  normalized="${normalized##_}"
  normalized="${normalized%%_}"
  CONTAINER_NAME="$(echo "$normalized" | tr 'A-Z' 'a-z')_wordpress"
}

prompt_for_missing_values() {
  [[ -n "$DOMAIN" ]] || error "--domain is required"
  [[ -n "$DB_NAME" ]] || error "--db-name is required"
  [[ -n "$DB_USER" ]] || error "--db-user is required"
  if [[ ${#ADMINS[@]} -eq 0 ]]; then
    error "At least one --admin USER:EMAIL is required"
  fi
  if [[ -z "$DB_PASS" ]]; then
    read -r -s -p "Enter database password for user '$DB_USER': " DB_PASS
    echo
    [[ -n "$DB_PASS" ]] || error "Database password cannot be empty"
  fi
  normalize_project_name
}

write_env_files() {
  if [[ -f "$ENV_FILE" || -f "$ENV_SECRETS_FILE" || -f "$DB_SQL_GENERATED" ]]; then
    if [[ "$FORCE" -ne 1 ]]; then
      error ".env, .env.secrets or db.generated.sql already exist. Use --force to overwrite."
    fi
  fi

  cat >"$ENV_FILE" <<EOF
PROJECT_DOMAIN=$DOMAIN
PROJECT_NAME="$PROJECT_NAME"
CONTAINER_NAME="$CONTAINER_NAME"
MYSQL_HOST=$DB_HOST
MYSQL_PORT=$DB_PORT
MYSQL_DATABASE=$DB_NAME
MYSQL_USER=$DB_USER
WORDPRESS_DB_HOST=$DB_HOST:$DB_PORT
WORDPRESS_DB_NAME=$DB_NAME
WORDPRESS_DB_USER=$DB_USER
WORDPRESS_TABLE_PREFIX=wp_
WORDPRESS_SITE_URL=http://$DOMAIN
WORDPRESS_HOME=http://$DOMAIN
WORDPRESS_DEBUG=true
WORDPRESS_CONFIG_EXTRA="define('CONCATENATE_SCRIPTS', false);"
EOF

  cat >"$ENV_SECRETS_FILE" <<EOF
MYSQL_PASSWORD=$DB_PASS
WORDPRESS_DB_PASSWORD=$DB_PASS
WORDPRESS_AUTH_KEY="$(generate_password 64)"
WORDPRESS_SECURE_AUTH_KEY="$(generate_password 64)"
WORDPRESS_LOGGED_IN_KEY="$(generate_password 64)"
WORDPRESS_NONCE_KEY="$(generate_password 64)"
WORDPRESS_AUTH_SALT="$(generate_password 64)"
WORDPRESS_SECURE_AUTH_SALT="$(generate_password 64)"
WORDPRESS_LOGGED_IN_SALT="$(generate_password 64)"
WORDPRESS_NONCE_SALT="$(generate_password 64)"
EOF
}

prepare_compose_file() {
  if [[ ! -f "$DOCKER_COMPOSE_BASE" ]]; then
    echo "Warning: base docker-compose.yml not found at $DOCKER_COMPOSE_BASE; skipping compose copy" >&2
    return
  fi
  if [[ -f "$DOCKER_COMPOSE_LOCAL" && "$FORCE" -ne 1 ]]; then
    echo "docker-compose.project.yml already exists, leaving as is" >&2
    return
  fi
  cp "$DOCKER_COMPOSE_BASE" "$DOCKER_COMPOSE_LOCAL"
  # Update container_name with normalized project name
  if [[ -n "$CONTAINER_NAME" ]]; then
    # Replace the specific template value to avoid regex issues
    sed -i.bak "s/container_name: project_wordpress/container_name: $CONTAINER_NAME/" "$DOCKER_COMPOSE_LOCAL" || true
  fi
}

configure_nginx() {
  local target_name
  target_name="$PROJECT_NAME"
  local target_path
  target_path="/etc/nginx/sites-available/$target_name"

  if [[ ! -f "$NGINX_TEMPLATE" ]]; then
    echo "Warning: nginx-site.conf template not found, skipping nginx configuration" >&2
    return
  fi

  local tmp
  tmp="$(mktemp)"
  cp "$NGINX_TEMPLATE" "$tmp"

  # Update server_name and root
  sed -i.bak "s/server_name .*/server_name $DOMAIN;/" "$tmp" || true
  sed -i.bak "s#root .*#root $PROJECT_ROOT/html;#" "$tmp" || true
  # Update fastcgi_pass to use container name
  sed -i.bak "s/fastcgi_pass .*/fastcgi_pass $CONTAINER_NAME:9000;/" "$tmp" || true

  if [[ -w "/etc/nginx/sites-available" ]]; then
    sudo cp "$tmp" "$target_path"
    echo "Copied nginx config to $target_path" >&2
  else
    echo "Warning: cannot write to /etc/nginx/sites-available; run manually:" >&2
    echo "  sudo cp $tmp $target_path" >&2
  fi
}

# Generate a random password of given length
generate_password() {
  local LENGTH="$1"
  PHP_INI_SCAN_DIR= php -d error_reporting=0 -r "require 'scripts/passwords.php'; echo generate_password((int) $LENGTH);" <<<"" 2>/dev/null
}

hash_password() {
  local plain="$1"
  PHP_INI_SCAN_DIR= php -d error_reporting=0 -r "require 'scripts/passwords.php'; echo hash_password('$plain');" <<<"" 2>/dev/null
}

# Generate SQL for admin users and emit to stdout
# Also populate global arrays ADMIN_USERS, ADMIN_EMAILS, ADMIN_PASSWORDS for summary output

ADMIN_USERS=()
ADMIN_EMAILS=()
ADMIN_PASSWORDS=()

generate_admin_sql() {
  local idx=0
  local base_id=1
  local sql="LOCK TABLES \`wp_users\` WRITE, \`wp_usermeta\` WRITE;"

  sql+=$'\n/*!40000 ALTER TABLE `wp_users` DISABLE KEYS */;'
  sql+=$'\n/*!40000 ALTER TABLE `wp_usermeta` DISABLE KEYS */;'

  ADMIN_USERS=()
  ADMIN_EMAILS=()
  ADMIN_PASSWORDS=()

  for entry in "${ADMINS[@]}"; do
    local user email
    user="${entry%%:*}"
    email="${entry#*:}"
    [[ -n "$user" && -n "$email" ]] || error "Invalid --admin value '$entry', expected USER:EMAIL"

    # Normalize username (lowercase)
    local uname
    uname="$(echo "$user" | tr 'A-Z' 'a-z')"

    local password
    password="$(generate_password 12)"
    local hash
    # Export password via env for PHP snippet
    hash="$(hash_password "$password")"

    ADMIN_USERS+=("$uname")
    ADMIN_EMAILS+=("$email")
    ADMIN_PASSWORDS+=("$password")

    local id=$((base_id + idx))
    local now
    now="$(date +"%Y-%m-%d %H:%M:%S")"

    sql+=$'\n'
    sql+="INSERT INTO wp_users (ID, user_login, user_pass, user_nicename, user_email, user_url, user_registered, user_status, display_name) VALUES ($id, '"$uname"', '"$hash"', '"$uname"', '"$email"', '', '"$now"', 0, '"$uname"');"$'\n'
    sql+="INSERT INTO wp_usermeta (user_id, meta_key, meta_value) VALUES"$'\n'
    sql+=$'\t'"($id, 'wp_capabilities', 'a:1:{s:13:\"administrator\";b:1;}'),"$'\n'
    sql+=$'\t'"($id, 'wp_user_level', '10');"$'\n'

    idx=$((idx + 1))
  done

  sql+=$'\n/*!40000 ALTER TABLE `wp_users` ENABLE KEYS */;'
  sql+=$'\n/*!40000 ALTER TABLE `wp_usermeta` ENABLE KEYS */;'
  sql+=$'\nUNLOCK TABLES;'

  printf '%s
' "$sql"
}

# Replace domain and append admin SQL

generate_sql() {
  # Replace hardcoded domain in template. Assumes safe to replace.
  php -d error_reporting=0 -r "echo str_replace('nginx.wp-template.orb.local', '$DOMAIN', file_get_contents('$DB_SQL_TEMPLATE'));" >"$DB_SQL_GENERATED" || error "Failed to generate SQL with updated domain"

  local admin_sql
  {
      printf '\n-- Admin users added by install script\n'
      generate_admin_sql
      printf '\n'
    } >>"$DB_SQL_GENERATED"
}

# Test DB connection

test_db_connection() {
  # Replace host.docker.internal with localhost if needed
  if [[ "$DB_HOST" == "host.docker.internal" ]]; then
    DB_HOST="localhost"
  fi
  "$DB_CLIENT" -h "$DB_HOST" -P "$DB_PORT" -u "$DB_USER" -p"$DB_PASS" -e "SELECT 1" "$DB_NAME" >/dev/null 2>&1 || error "Unable to connect to database $DB_NAME at $DB_HOST:$DB_PORT with provided credentials"
}

import_sql() {
  # Replace host.docker.internal with localhost if needed
  if [[ "$DB_HOST" == "host.docker.internal" ]]; then
    DB_HOST="localhost"
  fi
  echo "$DB_CLIENT -h \"$DB_HOST\" -P \"$DB_PORT\" -u \"$DB_USER\" -p\"$DB_PASS\" \"$DB_NAME\""
  "$DB_CLIENT" --binary-mode=1 -h "$DB_HOST" -P "$DB_PORT" -u "$DB_USER" -p"$DB_PASS" "$DB_NAME" <"$DB_SQL_GENERATED" || error "Failed to import SQL into database"
}

print_summary() {
  echo
  echo "Installation completed. Admin credentials:"
  echo "----------------------------------------"
  local i
  for ((i = 0; i < ${#ADMIN_USERS[@]}; i++)); do
    echo "User: ${ADMIN_USERS[$i]}"
    echo "Email: ${ADMIN_EMAILS[$i]}"
    echo "Password: ${ADMIN_PASSWORDS[$i]}"
    echo "----------------------------------------"
  done
}

main() {
  parse_args "$@"
  check_requirements
  prompt_for_missing_values
  write_env_files
  prepare_compose_file
  configure_nginx
  generate_sql

  if [[ "$NO_DB_IMPORT" -eq 0 ]]; then
    test_db_connection
    import_sql
  else
    echo "Skipping DB import as requested (--no-db-import)." >&2
  fi

  print_summary
}

main "$@"
