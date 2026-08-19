# syntax=docker/dockerfile:1

ARG WP_VERSION=7.0.4
ARG PHP_VERSION=8.4

FROM wordpress:${WP_VERSION}-php${PHP_VERSION}-fpm-alpine AS wordpress-source

# This must be the base of the final image. The official WordPress image declares
# /var/www/html as a volume, which would allow persisted files to hide a newer
# WordPress release after an image update.
FROM rg.fr-par.scw.cloud/esoul-starters/php-fpm:${PHP_VERSION} AS php-base

# Extensions supplied by php-base are augmented with the WordPress-specific set.
RUN install-php-extensions \
    @composer \
    apcu \
    exif \
    gd \
    gettext \
    imagick \
    mysqli \
    redis \
    soap

# Install instrumentation libraries via Composer
FROM php-base AS composer-dependencies

WORKDIR /app

COPY composer.json composer.lock ./
RUN --mount=type=cache,id=wp-template-composer,target=/tmp/composer-cache,sharing=locked \
    COMPOSER_CACHE_DIR=/tmp/composer-cache composer install \
    --no-dev \
    --no-interaction \
    --no-progress \
    --optimize-autoloader

FROM php-base AS final

ARG WP_VERSION

LABEL authors="Tomáš Vojík <vojik@esoul.cz>"
LABEL maintainer="Tomáš Vojík <vojik@esoul.cz>"
LABEL org.opencontainers.image.title="eSoul WordPress"
LABEL org.opencontainers.image.version="${WP_VERSION}"

WORKDIR /var/www/html

# WordPress core is part of the image, not initialized into a runtime volume.
COPY --chown=root:www-data --from=wordpress-source /usr/src/wordpress/ ./
COPY --chown=root:www-data --from=composer-dependencies /app/vendor/ ./vendor/

# Custom php.ini settings
COPY php.ini $PHP_INI_DIR/conf.d/wordpress.ini

# Optimized PHP-FPM pool configuration
COPY fpm-www.conf /usr/local/etc/php-fpm.d/www.conf

# Copy preload file
COPY --chown=root:www-data preload.php ./preload.php

# Install the process supervisor and healthcheck dependencies.
RUN apk add --no-cache busybox fcgi grep lz4-libs supervisor

COPY supervisord.conf /etc/supervisord.conf
COPY wp-cron-runner.sh /usr/local/bin/wp-cron-runner
COPY fpm-healthcheck.sh /usr/local/bin/fpm-healthcheck
COPY fpm-watchdog.sh /usr/local/bin/fpm-watchdog
COPY container-healthcheck.sh /usr/local/bin/container-healthcheck
RUN chmod +x \
    /usr/local/bin/container-healthcheck \
    /usr/local/bin/fpm-healthcheck \
    /usr/local/bin/fpm-watchdog \
    /usr/local/bin/wp-cron-runner
HEALTHCHECK --interval=30s --timeout=10s --start-period=5s CMD ["container-healthcheck"]

# The external cron runner replaces WordPress's request-triggered cron spawning.
COPY wordpress-runtime.php /usr/local/etc/wordpress/runtime.php

# wp-config-docker.php reads the WORDPRESS_* environment variables at runtime.
# Core remains root-owned so it can only be changed by deploying another image;
# wp-content remains writable for installations that do not mount it separately.
RUN cp wp-config-docker.php wp-config.php \
    && sed -i "/\/\* That's all, stop editing! Happy publishing. \*\//i require_once '/usr/local/etc/wordpress/runtime.php';" wp-config.php \
    && chown -R root:www-data /var/www/html \
    && find /var/www/html -type d -exec chmod 0755 {} + \
    && find /var/www/html -type f -exec chmod 0644 {} + \
    && mkdir -p wp-content/uploads \
    && chown -R www-data:www-data wp-content \
    && test -f index.php \
    && test -f wp-admin/index.php \
    && test -f wp-includes/version.php

USER www-data

# Setup otel ENV variables
ENV OTEL_PHP_AUTOLOAD_ENABLED=true
ENV OTEL_SERVICE_NAME=wordpress
ENV OTEL_TRACES_EXPORTER=otlp
ENV OTEL_EXPORTER_OTLP_PROTOCOL=http/protobuf
ENV OTEL_EXPORTER_OTLP_ENDPOINT=http://collector:4318
ENV OTEL_PROPAGATORS=baggage,tracecontext

# Expose FPM port
EXPOSE 9000

ENTRYPOINT ["/usr/bin/supervisord"]
CMD ["-c", "/etc/supervisord.conf"]
