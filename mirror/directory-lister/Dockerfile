FROM php:8.3-apache

LABEL maintainer="Chris Kankiewicz <Chris@ChrisKankiewicz.com>"

ENV HOME="/tmp"
ENV COMPOSER_HOME="/tmp"
ENV XDG_CONFIG_HOME="/tmp/.config"

COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

COPY --from=node:20.14 /usr/local/bin/node /usr/local/bin/node
COPY --from=node:20.14 /usr/local/lib/node_modules /usr/local/lib/node_modules

RUN ln --symbolic../lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm \
    && ln --symbolic../lib/node_modules/npm/bin/npx-cli.js /usr/local/bin/npx

# Create a non-root user and switch to it
RUN groupadd -r www-data && useradd -r -g www-data www-data

# Switch to the non-root user
USER www-data

RUN apt-get update && apt-get install --assume-yes --no-install-recommends \
    libmemcached-dev libzip-dev libssl-dev tar zip \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install opcache zip \
    && pecl install apcu \
    && pecl install memcached \
    && pecl install redis \
    && pecl install xdebug

# Fix for memcached
RUN echo extension=memcached.so >> /usr/local/etc/php/conf.d/memcached.ini

RUN docker-php-ext-enable apcu memcached redis xdebug

RUN a2enmod rewrite

COPY.docker/apache2/config/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY.docker/php/config/php.ini /usr/local/etc/php/php.ini

# Adjust permissions for the non-root user
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html
