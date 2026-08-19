#!/bin/sh

set -eu

: "${FPM_WATCHDOG_TEST_PROBE_STATE:?probe state path is required}"

count=0
if [ -f "$FPM_WATCHDOG_TEST_PROBE_STATE" ]; then
    count="$(cat "$FPM_WATCHDOG_TEST_PROBE_STATE")"
fi
count=$((count + 1))
printf '%s\n' "$count" > "$FPM_WATCHDOG_TEST_PROBE_STATE"

if [ "$count" -eq 2 ]; then
    exit 0
fi

exit 1
