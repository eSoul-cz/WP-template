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

## Resetting a deployed installation

`scripts/reset.sh` resets one single-site installation without replacing its
container. It downloads `db.sql` and `wp-content` from a selected Git ref,
backs up the current database and content, clears the dedicated site database,
imports the baseline, creates new administrators, restores the repository
content, and restarts the container. If a destructive step fails, the script
attempts to restore both backups automatically.

Each WordPress installation must use its own database/schema. Separate users
on a database shared by several WordPress installations are not sufficient.
The application DB user must be allowed to create and drop tables in its own
schema. The reset script targets a single-site installation with the standard
`wp_` table prefix; it does not support WordPress Multisite.

Run it on the Docker host from the project directory:

```bash
sudo scripts/reset.sh \
  --container wp1 \
  --db-name wp1 \
  --db-user wp1 \
  --url https://wp1.example.com \
  --admin admin:admin@example.com
```

The database password is requested without echoing it. Repeat `--admin` to
create more administrators. Use `--repo` and `--ref` to select another GitHub
repository or release. Run `scripts/reset.sh --help` for all options.

The selected `db.sql` must be a valid, sanitized baseline containing the
standard `siteurl` and `home` options. The reset preflight checks this before it
stops the container or changes either persistent store.

The script updates `siteurl`, `home`, the site administrator email, and plain
post content. It deliberately does not perform a blind replacement inside
serialized plugin settings; use that plugin's migration tool or a WP-CLI
serialization-aware `search-replace` when a baseline stores environment-specific
URLs there.

## Generating WordPress secrets

Generate a separate env file containing WordPress's eight authentication keys
and salts on the deployment server:

```bash
scripts/generate-wp-secrets.sh
```

The default output is `.env.wp-secrets`. It is created atomically with mode
`0600`, is ignored by Git, and is never overwritten unless `--force` is given.
Each secret has 256 bits of randomness and contains only dotenv-safe hexadecimal
characters. Add the file to the deployed WordPress service's `env_file` list:

```yaml
env_file:
  - .env
  - .env.secrets
  - .env.wp-secrets
```

Keeping this file separate is intentional: the existing `.env.secrets` may
also contain `WORDPRESS_DB_PASSWORD`, so a secrets rotation must not replace
that file. Use `--output FILE` to choose another path or `--stdout` for output
managed by an external secrets system.
