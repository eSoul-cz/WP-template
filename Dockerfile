# Install additional PHP extensions into the official WordPress PHP-FPM Alpine image
FROM wordpress:php8.4-fpm-alpine AS extension-installer

COPY --from=ghcr.io/mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions  \
    mysqli  \
    zip  \
    exif  \
    intl  \
    opcache  \
    soap  \
    bcmath  \
    gd  \
    imagick  \
    gettext  \
    redis  \
    apcu  \
    sockets  \
    igbinary \
    opentelemetry \
    protobuf

# Install instrumentation libraries via Composer
FROM composer:2.9 AS build

COPY composer.json .
RUN composer install --ignore-platform-reqs

FROM wordpress:php8.4-fpm-alpine AS final

LABEL authors="Tomáš Vojík <vojik@esoul.cz>"
LABEL maintainer="Tomáš Vojík <vojik@esoul.cz>"

WORKDIR /var/www/html

# Copy installed extensions from the previous stage
COPY --from=extension-installer /usr/local/lib/php/extensions/ /usr/local/lib/php/extensions/
COPY --from=extension-installer /usr/local/etc/php/conf.d/ /usr/local/etc/php/conf.d/

# Copy Composer and vendor files from the previous stage
COPY --from=build /usr/bin/composer /usr/bin/composer
COPY --from=build /app/vendor /var/www/html/vendor

# Custom php.ini settings
COPY php.ini $PHP_INI_DIR/conf.d/wordpress.ini

# Optimized PHP-FPM pool configuration
COPY fpm-www.conf /usr/local/etc/php-fpm.d/www.conf

# Copy all wordpress files from /usr/src/wordpress to /var/www/html
COPY --chown=www-data:www-data --from=wordpress:php8.4-fpm-alpine /usr/src/wordpress /var/www/html

# Copy preload file
COPY preload.php /var/www/html/preload.php

# Setup healthcheck script
RUN apk add --no-cache fcgi busybox grep lz4-libs
COPY fpm-healthcheck.sh /usr/local/bin/fpm-healthcheck
RUN chmod +x /usr/local/bin/fpm-healthcheck
HEALTHCHECK --interval=30s --timeout=10s --start-period=5s CMD ["fpm-healthcheck"]

# Ensure ownership
RUN chown -R www-data:www-data /var/www

USER www-data

# Setup otel ENV variables
ENV OTEL_PHP_AUTOLOAD_ENABLED=true
ENV OTEL_SERVICE_NAME=wordpress
ENV OTEL_TRACES_EXPORTER=otlp
ENV OTEL_EXPORTER_OTLP_PROTOCOL=http/protobuf
ENV OTEL_EXPORTER_OTLP_ENDPOINT=http://collector:4318
ENV OTEL_PROPAGATORS=baggage,tracecontext

# Copy wp-config
RUN cp wp-config-docker.php wp-config.php

# Expose FPM port
EXPOSE 9000
