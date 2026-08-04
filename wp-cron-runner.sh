#!/bin/sh

set -eu

interval="${WP_CRON_INTERVAL_SECONDS:-60}"
initial_delay="${WP_CRON_INITIAL_DELAY_SECONDS:-10}"
sleep_pid=''

validate_seconds() {
    name="$1"
    value="$2"

    case "$value" in
        ''|*[!0-9]*)
            printf '%s must be a non-negative integer, got: %s\n' "$name" "$value" >&2
            exit 64
            ;;
    esac
}

sleep_for() {
    duration="$1"

    if [ "$duration" -eq 0 ]; then
        return
    fi

    sleep "$duration" &
    sleep_pid="$!"
    wait "$sleep_pid"
    sleep_pid=''
}

shutdown() {
    if [ -n "$sleep_pid" ]; then
        kill "$sleep_pid" 2>/dev/null || true
    fi

    exit 0
}

validate_seconds WP_CRON_INTERVAL_SECONDS "$interval"
validate_seconds WP_CRON_INITIAL_DELAY_SECONDS "$initial_delay"

if [ "$interval" -eq 0 ]; then
    printf 'WP_CRON_INTERVAL_SECONDS must be greater than zero\n' >&2
    exit 64
fi

trap shutdown INT QUIT TERM

sleep_for "$initial_delay"

while true; do
    if ! /usr/local/bin/php /var/www/html/wp-cron.php; then
        printf 'WordPress cron execution failed; retrying in %s seconds\n' "$interval" >&2
    fi

    sleep_for "$interval"
done
