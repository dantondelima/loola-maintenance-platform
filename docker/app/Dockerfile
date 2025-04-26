# Builder
FROM php:8.3-fpm-alpine as builder

RUN apk add --no-cache curl

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /app

COPY . .

# Runtime
FROM php:8.3-fpm-alpine

WORKDIR /app

RUN apk add --no-cache curl

# Copy PHP extensions and config from builder
COPY --from=builder /usr/local/lib/php/extensions/ /usr/local/lib/php/extensions/
COPY --from=builder /usr/local/etc/php/conf.d/ /usr/local/etc/php/conf.d/

COPY --from=builder /app /app

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY ["docker/app/docker-entrypoint.sh", "/usr/local/bin/docker-entrypoint.sh"]

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD ["php-fpm"]