FROM php:7.4.1-cli-alpine

ENV TERM screen-256color

RUN apk add --update \
    git \
    unzip \
    libzip-dev \
    libgcc \
    libbz2 \
    bzip2-dev \
    autoconf \
    make \
    zlib \
    zlib-dev \
    g++ \
    && docker-php-ext-install bz2 \
    && docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer --version

RUN pecl install xdebug-2.8.1 \
    && echo "zend_extension=xdebug.so" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN mkdir -p /var/apps/getchip

VOLUME /var/apps/getchip

WORKDIR /var/apps/getchip