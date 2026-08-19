#!/bin/sh

set -eu

interval="${FPM_WATCHDOG_INTERVAL_SECONDS:-10}"
timeout_seconds="${FPM_WATCHDOG_TIMEOUT_SECONDS:-5}"
failure_threshold="${FPM_WATCHDOG_FAILURE_THRESHOLD:-3}"
recovery_delay="${FPM_WATCHDOG_RECOVERY_DELAY_SECONDS:-5}"
max_checks="${FPM_WATCHDOG_MAX_CHECKS:-0}"
probe_command="${FPM_WATCHDOG_PROBE_COMMAND:-/usr/local/bin/fpm-healthcheck}"
supervisorctl_command="${FPM_WATCHDOG_SUPERVISORCTL_COMMAND:-supervisorctl}"
sleep_command="${FPM_WATCHDOG_SLEEP_COMMAND:-sleep}"
timeout_command="${FPM_WATCHDOG_TIMEOUT_COMMAND:-timeout}"

validate_non_negative_integer() {
    name="$1"
    value="$2"

    case "$value" in
        ''|*[!0-9]*)
            printf '%s must be a non-negative integer, got: %s\n' "$name" "$value" >&2
            exit 64
            ;;
    esac
}

validate_positive_integer() {
    name="$1"
    value="$2"

    validate_non_negative_integer "$name" "$value"

    if [ "$value" -eq 0 ]; then
        printf '%s must be greater than zero\n' "$name" >&2
        exit 64
    fi
}

validate_positive_integer FPM_WATCHDOG_INTERVAL_SECONDS "$interval"
validate_positive_integer FPM_WATCHDOG_TIMEOUT_SECONDS "$timeout_seconds"
validate_positive_integer FPM_WATCHDOG_FAILURE_THRESHOLD "$failure_threshold"
validate_non_negative_integer FPM_WATCHDOG_RECOVERY_DELAY_SECONDS "$recovery_delay"
validate_non_negative_integer FPM_WATCHDOG_MAX_CHECKS "$max_checks"

failures=0
checks=0

while true; do
    checks=$((checks + 1))

    if "$timeout_command" "$timeout_seconds" "$probe_command" >/dev/null 2>&1; then
        if [ "$failures" -gt 0 ]; then
            printf 'FPM watchdog: probe recovered after %s consecutive failure(s)\n' "$failures" >&2
        fi
        failures=0
    else
        failures=$((failures + 1))
        printf 'FPM watchdog: probe failed (%s/%s)\n' "$failures" "$failure_threshold" >&2

        if [ "$failures" -ge "$failure_threshold" ]; then
            printf 'FPM watchdog: restarting unresponsive php-fpm through Supervisor\n' >&2

            if "$supervisorctl_command" restart php-fpm; then
                printf 'FPM watchdog: php-fpm restart completed\n' >&2
                failures=0

                if [ "$recovery_delay" -gt 0 ]; then
                    "$sleep_command" "$recovery_delay"
                fi
            else
                printf 'FPM watchdog: php-fpm restart failed; retrying after the next probe\n' >&2
            fi
        fi
    fi

    if [ "$max_checks" -gt 0 ] && [ "$checks" -ge "$max_checks" ]; then
        exit 0
    fi

    "$sleep_command" "$interval"
done
