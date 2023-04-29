FROM php:8.1-fpm-alpine

WORKDIR /var/www/html

RUN apk --no-cache add \
    git \
    curl \
    libzip-dev \
    zip \
    libpng-dev \
    libxml2-dev \
    libmcrypt-dev \
    libxslt-dev \
    libzip-dev

RUN docker-php-ext-install \
    pdo_mysql \
    bcmath \
    gd \
    soap \
    xsl \
    zip \
    sockets \
    pcntl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-interaction --no-plugins --no-scripts

CMD php artisan serve --host=0.0.0.0 --port=8000

EXPOSE 8000
