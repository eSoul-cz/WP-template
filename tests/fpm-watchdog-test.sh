#!/bin/sh

set -eu

project_root="$(CDPATH= cd -- "$(dirname "$0")/.." && pwd)"
watchdog="$project_root/fpm-watchdog.sh"
supervisorctl_recorder="$project_root/tests/fixtures/supervisorctl-recorder.sh"
timeout_passthrough="$project_root/tests/fixtures/timeout-passthrough.sh"
reset_probe="$project_root/tests/fixtures/probe-fail-success-fail.sh"
test_dir="$(mktemp -d)"
restart_log="$test_dir/restarts.log"
probe_state="$test_dir/probe-state"

cleanup() {
    status="$?"
    trap - EXIT HUP INT TERM
    rm -rf "$test_dir"
    exit "$status"
}

trap cleanup EXIT HUP INT TERM

fail() {
    printf 'FAIL: %s\n' "$1" >&2
    exit 1
}

run_watchdog() {
    probe_command="$1"
    failure_threshold="$2"
    max_checks="$3"

    FPM_WATCHDOG_PROBE_COMMAND="$probe_command" \
    FPM_WATCHDOG_SUPERVISORCTL_COMMAND="$supervisorctl_recorder" \
    FPM_WATCHDOG_SLEEP_COMMAND=/usr/bin/true \
    FPM_WATCHDOG_TIMEOUT_COMMAND="$timeout_passthrough" \
    FPM_WATCHDOG_INTERVAL_SECONDS=1 \
    FPM_WATCHDOG_TIMEOUT_SECONDS=1 \
    FPM_WATCHDOG_FAILURE_THRESHOLD="$failure_threshold" \
    FPM_WATCHDOG_RECOVERY_DELAY_SECONDS=0 \
    FPM_WATCHDOG_MAX_CHECKS="$max_checks" \
    FPM_WATCHDOG_TEST_RESTART_LOG="$restart_log" \
    FPM_WATCHDOG_TEST_PROBE_STATE="$probe_state" \
        "$watchdog"
}

: > "$restart_log"
run_watchdog /bin/false 3 3 >/dev/null 2>&1

restart_count="$(wc -l < "$restart_log" | tr -d ' ')"
[ "$restart_count" -eq 1 ] || fail "expected one restart after three failed probes, got $restart_count"
grep -Fxq 'restart php-fpm' "$restart_log" || fail 'watchdog did not restart php-fpm through supervisorctl'

: > "$restart_log"
run_watchdog /usr/bin/true 2 3 >/dev/null 2>&1

[ ! -s "$restart_log" ] || fail 'healthy probes must not restart php-fpm'

: > "$restart_log"
rm -f "$probe_state"
run_watchdog "$reset_probe" 2 3 >/dev/null 2>&1

[ ! -s "$restart_log" ] || fail 'a successful probe must reset the consecutive failure count'

set +e
FPM_WATCHDOG_FAILURE_THRESHOLD=0 \
FPM_WATCHDOG_MAX_CHECKS=1 \
FPM_WATCHDOG_TIMEOUT_COMMAND="$timeout_passthrough" \
    "$watchdog" >/dev/null 2>&1
invalid_status="$?"
set -e

[ "$invalid_status" -eq 64 ] || fail "invalid configuration should exit 64, got $invalid_status"

printf 'PASS: fpm watchdog behavior\n'
