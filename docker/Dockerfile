FROM php:8.3-cli-alpine

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN apk add --no-cache git unzip \
    && adduser -D -u 1000 dev \
    && mkdir -p /app/vendor \
    && chown -R dev:dev /app

USER dev
WORKDIR /app
