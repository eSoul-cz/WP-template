#!/bin/sh

set -eu

status="$(supervisorctl status php-fpm fpm-watchdog wp-cron)"

printf '%s\n' "$status" | grep -Eq '^php-fpm[[:space:]]+RUNNING[[:space:]]'
printf '%s\n' "$status" | grep -Eq '^fpm-watchdog[[:space:]]+RUNNING[[:space:]]'
printf '%s\n' "$status" | grep -Eq '^wp-cron[[:space:]]+RUNNING[[:space:]]'

exec fpm-healthcheck
