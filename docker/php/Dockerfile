FROM php:7.4-cli

RUN apk add --git \
    && docker-php-ext-install -j$(nproc) iconv mysqli pdo_mysql zip tokenizer xml pcntl\
    && docker-php-ext-install intl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ADD php.ini /usr/local/etc/php/conf.d/40-custom.ini

RUN addgroup -S web && adduser -S web -D -u 1000 -h /home/web -G web

WORKDIR /var/www/

USER web

CMD ["php-fpm"]
