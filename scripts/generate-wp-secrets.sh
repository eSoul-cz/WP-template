#!/usr/bin/env bash
set -Eeuo pipefail

SCRIPT_DIR="$(CDPATH= cd -- "$(dirname -- "${BASH_SOURCE[0]}")" && pwd -P)"
PROJECT_ROOT="$(dirname -- "$SCRIPT_DIR")"

OUTPUT_FILE="$PROJECT_ROOT/.env.wp-secrets"
OUTPUT_EXPLICIT=0
FORCE=0
STDOUT=0
TEMP_FILE=""

usage() {
  cat <<EOF
Usage: $(basename "$0") [options]

Generate the eight WordPress authentication keys and salts using PHP's
cryptographically secure random_bytes(). Each value contains 256 bits of
entropy and uses a dotenv-safe hexadecimal representation.

Options:
  -o, --output FILE   Output file (default: $OUTPUT_FILE)
  -f, --force         Replace an existing output file
      --stdout        Print to stdout instead of writing a file
  -h, --help          Show this help

The generated file is written atomically with permission mode 0600. It contains
only WordPress keys and salts; it will not modify the existing .env.secrets file
that may also contain the database password.
EOF
}

die() {
  echo "Error: $*" >&2
  exit 1
}

cleanup() {
  if [[ -n "$TEMP_FILE" && -f "$TEMP_FILE" ]]; then
    rm -f -- "$TEMP_FILE"
  fi
}

parse_args() {
  while [[ $# -gt 0 ]]; do
    case "$1" in
      -o|--output)
        [[ -n "${2-}" ]] || die "$1 requires a path"
        OUTPUT_FILE="$2"
        OUTPUT_EXPLICIT=1
        shift 2
        ;;
      --output=*)
        OUTPUT_FILE="${1#*=}"
        [[ -n "$OUTPUT_FILE" ]] || die "--output requires a path"
        OUTPUT_EXPLICIT=1
        shift
        ;;
      -f|--force)
        FORCE=1
        shift
        ;;
      --stdout)
        STDOUT=1
        shift
        ;;
      -h|--help)
        usage
        exit 0
        ;;
      *)
        die "unknown option: $1"
        ;;
    esac
  done

  if [[ "$STDOUT" -eq 1 && "$OUTPUT_EXPLICIT" -eq 1 ]]; then
    die "--stdout and --output cannot be used together"
  fi
}

generate_secrets() {
  php -r '
    $keys = [
        "WORDPRESS_AUTH_KEY",
        "WORDPRESS_SECURE_AUTH_KEY",
        "WORDPRESS_LOGGED_IN_KEY",
        "WORDPRESS_NONCE_KEY",
        "WORDPRESS_AUTH_SALT",
        "WORDPRESS_SECURE_AUTH_SALT",
        "WORDPRESS_LOGGED_IN_SALT",
        "WORDPRESS_NONCE_SALT",
    ];

    foreach ($keys as $key) {
        printf("%s=\"%s\"\n", $key, bin2hex(random_bytes(32)));
    }
  '
}

validate_generated_file() {
  local file="$1"
  local line_count unique_value_count

  line_count="$(wc -l <"$file" | tr -d '[:space:]')"
  [[ "$line_count" -eq 8 ]] || die "generator produced $line_count lines instead of 8"

  if grep -Evq '^WORDPRESS_(AUTH_KEY|SECURE_AUTH_KEY|LOGGED_IN_KEY|NONCE_KEY|AUTH_SALT|SECURE_AUTH_SALT|LOGGED_IN_SALT|NONCE_SALT)="[0-9a-f]{64}"$' "$file"; then
    die "generator produced an invalid env entry"
  fi

  unique_value_count="$(cut -d= -f2- "$file" | sort -u | wc -l | tr -d '[:space:]')"
  [[ "$unique_value_count" -eq 8 ]] || die "generator produced duplicate secret values"
}

write_file() {
  local output_dir output_name
  output_dir="$(dirname -- "$OUTPUT_FILE")"
  output_name="$(basename -- "$OUTPUT_FILE")"

  [[ -d "$output_dir" ]] || die "output directory does not exist: $output_dir"
  output_dir="$(CDPATH= cd -- "$output_dir" && pwd -P)"
  OUTPUT_FILE="$output_dir/$output_name"

  if [[ ( -e "$OUTPUT_FILE" || -L "$OUTPUT_FILE" ) && "$FORCE" -ne 1 ]]; then
    die "$OUTPUT_FILE already exists; use --force to replace it"
  fi

  umask 077
  TEMP_FILE="$(mktemp "$output_dir/.wp-secrets.XXXXXXXX")"
  generate_secrets >"$TEMP_FILE"
  validate_generated_file "$TEMP_FILE"
  chmod 0600 "$TEMP_FILE"
  mv -f -- "$TEMP_FILE" "$OUTPUT_FILE"
  TEMP_FILE=""

  echo "Generated $OUTPUT_FILE (mode 0600)"
}

main() {
  parse_args "$@"
  command -v php >/dev/null 2>&1 || die "php CLI is required"

  if [[ "$STDOUT" -eq 1 ]]; then
    generate_secrets
  else
    trap cleanup EXIT
    trap 'exit 130' INT
    trap 'exit 143' TERM
    write_file
    trap - EXIT INT TERM
  fi
}

main "$@"
