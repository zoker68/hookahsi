FROM php:8.2-fpm-alpine3.18

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR "/var/www"

RUN set -ex; \
    apk add --no-cache git bash; \
    apk add --no-cache --virtual .build-deps \
        ${PHPIZE_DEPS} \
        linux-headers \
    ; \
    pecl update-channels; \
    pecl install xdebug; \
    docker-php-ext-enable --ini-name pecl-modules.ini xdebug

