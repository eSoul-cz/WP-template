#!/bin/sh

set -eu

: "${FPM_WATCHDOG_TEST_RESTART_LOG:?restart log path is required}"

printf '%s\n' "$*" >> "$FPM_WATCHDOG_TEST_RESTART_LOG"
