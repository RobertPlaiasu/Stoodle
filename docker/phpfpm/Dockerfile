FROM php:7.4.0-fpm-alpine

RUN apk update \
 && apk add --no-cache $PHPIZE_DEPS \
    git \
    zip \
    unzip \
 && docker-php-ext-install \
    opcache \
    pdo_mysql \
 && docker-php-ext-enable \
    opcache \
 && rm -rf \
    /var/cache/apk/* \
    /var/lib/apt/lists/*


COPY ./docker/phpfpm/php.ini /usr/local/etc/php/conf.d/php.override.ini
COPY ./nginx-server/default.conf /usr/local/etc/php-fpm.d/default.conf