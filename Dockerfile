FROM node:24-alpine AS assets

WORKDIR /app

COPY package*.json vite.config.js ./
COPY resources ./resources
COPY public ./public
RUN npm install --ignore-scripts && npm run build

FROM php:8.4-apache

WORKDIR /var/www/html

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        git \
        libicu-dev \
        libonig-dev \
        libsqlite3-dev \
        libzip-dev \
        unzip \
        zip \
    && docker-php-ext-install \
        bcmath \
        intl \
        mbstring \
        opcache \
        pdo_mysql \
        pdo_sqlite \
        zip \
    && a2enmod rewrite \
    && sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY composer.json composer.lock ./
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-scripts

COPY . .
COPY --from=assets /app/public/build ./public/build
COPY docker/entrypoint.sh /usr/local/bin/docker-entrypoint

RUN composer dump-autoload --optimize \
    && chmod +x /usr/local/bin/docker-entrypoint \
    && chown -R www-data:www-data storage bootstrap/cache database

EXPOSE 80

ENTRYPOINT ["docker-entrypoint"]
CMD ["apache2-foreground"]
