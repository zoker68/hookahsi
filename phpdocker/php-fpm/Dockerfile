FROM php:8.2-fpm

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR "/var/www"

RUN apt-get update && apt-get install -y \
    git \
    bash \
    libpq-dev \
    && docker-php-ext-install pdo pdo_mysql

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug