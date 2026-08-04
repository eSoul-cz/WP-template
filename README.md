# eSoul WordPress Docker template

WordPress core is baked into the application image. The image owns
`wp-admin`, `wp-includes`, the root WordPress PHP files, and `wp-config.php`.

Supervisor is PID 1 and manages both PHP-FPM and a CLI WP-Cron runner. Check
their state with `supervisorctl status` inside the container.

The cron runner executes `wp-cron.php` without overlapping its own runs and
waits one minute after each completed run by default. Configure it with:

- `WP_CRON_INTERVAL_SECONDS` — positive-integer delay between completed runs;
  default `60`.
- `WP_CRON_INITIAL_DELAY_SECONDS` — startup delay before the first run;
  default `10`; accepts non-negative integers including `0`.

Invalid values make the cron process fail after three bounded Supervisor start
attempts, and the container healthcheck then reports the container unhealthy.

Request-triggered WP-Cron is disabled by default. A deployment can define
`DISABLE_WP_CRON` itself through `WORDPRESS_CONFIG_EXTRA`; the runtime config
respects an existing definition.

## Updating WordPress

1. Optionally set the Jenkins `WP_VERSION` and `PHP_VERSION` parameters. Blank
   values use the build-argument defaults at the top of `Dockerfile`.
2. Build and test the `final` target.
3. Jenkins passes both values as Docker build arguments and publishes `latest`,
   the Git revision, `${WP_VERSION}-php${PHP_VERSION}`, and any Git tags pointing
   at the commit whose names are also valid Docker tags.
4. Deploy the new image and run the normal WordPress database upgrade if the
   release requires one.

## Runtime volumes

Do not mount a volume or bind mount over `/var/www/html`, `/var/www/html/wp-admin`,
or `/var/www/html/wp-includes` in production. Such a mount hides the core files
from the image and prevents an image rollout from upgrading them.

Persist the database and user-generated content only. The production Compose
file mounts `wp-content`; installations that also bake plugins and themes into
an image should instead persist only `wp-content/uploads` and other explicitly
runtime-generated directories.

`docker-compose.dev.yml` mounts the complete document root for local sharing
with nginx. That volume must be recreated when testing a new WordPress core
image; it is not the production deployment model.
