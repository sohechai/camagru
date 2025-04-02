FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libpng-dev \
    imagemagick \
    libmagickwand-dev \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_pgsql gd

RUN pecl install imagick \
    && docker-php-ext-enable imagick

WORKDIR /var/www/
