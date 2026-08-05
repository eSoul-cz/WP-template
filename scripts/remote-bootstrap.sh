#!/usr/bin/env bash
set -euo pipefail

# Remote bootstrap installer for WP-project-template
# Usage (example):
#   curl -fsSL https://raw.githubusercontent.com/<owner>/<repo>/<ref>/scripts/remote-bootstrap.sh \
#     | bash -s -- \
#       --ref v1.0.0 \
#       --target-dir my-wp-site \
#       --domain mysite.local \
#       --db-name wp_db \
#       --db-user wp_user \
#       --db-pass 'supersecret' \
#       --admin admin:admin@mysite.local

REPO_DEFAULT="https://github.com/<owner>/<repo>"
REF_DEFAULT="master"
TARGET_DIR_DEFAULT="WP-project-template"

REPO_URL="$REPO_DEFAULT"
REF="$REF_DEFAULT"
TARGET_DIR="$TARGET_DIR_DEFAULT"
PROJECT_NAME=""
OVERWRITE=0
REUSE_EXISTING=0

INSTALL_ARGS=()

usage() {
  cat <<EOF
Remote bootstrap for WP-project-template

Bootstrap options:
  --repo URL           Git repository HTTPS URL (default: $REPO_DEFAULT)
  --ref REF            Git ref (branch or tag) to download (default: $REF_DEFAULT)
  --project-name NAME  Logical project name (used to derive subdirectory)
  --target-dir DIR     Target directory to extract into (default: derived from project name or $TARGET_DIR_DEFAULT)
  --overwrite          Remove existing target directory before download
  --reuse-existing     Skip download if target directory already exists
  -h, --help           Show this help

All other options are passed through to scripts/install.sh inside the downloaded project.
EOF
}

has_cmd() {
  command -v "$1" >/dev/null 2>&1
}

normalize_dir_name() {
  local name="$1"
  if [[ -z "$name" ]]; then
    echo "$TARGET_DIR_DEFAULT"
    return
  fi
  local normalized
  normalized="$(echo "$name" | iconv -c -t ascii//TRANSLIT 2>/dev/null || echo "$name")"
  # Replace non-alphanumeric with hyphen, trim
  normalized="${normalized//[^a-zA-Z0-9]+/-}"
  normalized="${normalized// /_}"
  normalized="${normalized//--/-}"
  normalized="${normalized#-}"
  normalized="${normalized%-}"
  # Preserve case for directory
  echo "$normalized"
}

parse_args() {
  while [[ $# -gt 0 ]]; do
    case "$1" in
      --repo)
        shift; REPO_URL="${1:-}";;
      --repo=*)
        REPO_URL="${1#*=}";;
      --ref)
        shift; REF="${1:-}";;
      --ref=*)
        REF="${1#*=}";;
      --project-name)
        shift; PROJECT_NAME="${1:-}"; INSTALL_ARGS+=("--project-name" "$PROJECT_NAME");;
      --project-name=*)
        PROJECT_NAME="${1#*=}"; INSTALL_ARGS+=("--project-name=$PROJECT_NAME");;
      --target-dir)
        shift; TARGET_DIR="${1:-}";;
      --target-dir=*)
        TARGET_DIR="${1#*=}";;
      --overwrite)
        OVERWRITE=1;;
      --reuse-existing)
        REUSE_EXISTING=1;;
      -h|--help)
        usage; exit 0;;
      --)
        shift
        INSTALL_ARGS+=("$@")
        break;;
      *)
        INSTALL_ARGS+=("$1");;
    esac
    shift || true
  done

  # If target dir not explicitly set, derive it from project name
  if [[ "$TARGET_DIR" == "$TARGET_DIR_DEFAULT" || -z "$TARGET_DIR" ]]; then
    TARGET_DIR="$(normalize_dir_name "$PROJECT_NAME")"
  fi
}

ensure_tools() {
  has_cmd tar || { echo "Error: tar is required" >&2; exit 1; }
  if ! has_cmd curl && ! has_cmd wget; then
    echo "Error: either curl or wget is required" >&2
    exit 1
  fi
}

archive_url() {
  # Convert HTTPS URL to API tarball URL
  # https://github.com/owner/repo -> https://github.com/owner/repo/tarball/REF
  echo "${REPO_URL%/}/tarball/$REF"
}

download_and_extract() {
  local url
  url="$(archive_url)"

  if [[ -d "$TARGET_DIR" ]]; then
    if [[ "$REUSE_EXISTING" -eq 1 ]]; then
      echo "Target directory '$TARGET_DIR' exists, reusing without download" >&2
      return 0
    fi
    if [[ "$OVERWRITE" -eq 1 ]]; then
      echo "Removing existing directory '$TARGET_DIR'" >&2
      rm -rf "$TARGET_DIR"
    else
      echo "Error: target directory '$TARGET_DIR' already exists. Use --overwrite or --reuse-existing." >&2
      exit 1
    fi
  fi

  local tmpdir
  tmpdir="$(mktemp -d)"
  trap 'rm -rf "$tmpdir"' EXIT

  echo "Downloading $url ..." >&2

  if has_cmd curl; then
    curl -fsSL "$url" | tar -xz -C "$tmpdir"
  else
    wget -qO- "$url" | tar -xz -C "$tmpdir"
  fi

  # Find extracted top-level directory
  local extracted_dir
  extracted_dir="$(find "$tmpdir" -mindepth 1 -maxdepth 1 -type d | head -n1)"
  if [[ -z "$extracted_dir" ]]; then
    echo "Error: failed to find extracted directory" >&2
    exit 1
  fi

  mv "$extracted_dir" "$TARGET_DIR"
}

run_installer() {
  cd "$TARGET_DIR"
  if [[ ! -x scripts/install.sh ]]; then
    if [[ -f scripts/install.sh ]]; then
      chmod +x scripts/install.sh
    else
      echo "Error: scripts/install.sh not found in '$TARGET_DIR'" >&2
      exit 1
    fi
  fi

  echo "Running installer in '$(pwd)'" >&2
  bash scripts/install.sh "${INSTALL_ARGS[@]}"
}

main() {
  parse_args "$@"
  ensure_tools
  download_and_extract
  run_installer
}

main "$@"
