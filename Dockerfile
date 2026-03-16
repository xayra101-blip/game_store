FROM php:7.4-apache

# Cài thư viện hệ thống
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libxml2-dev \
    libonig-dev \
    libzip-dev

# Cài extension PHP cho Laravel
RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    bcmath \
    xml

# bật rewrite cho Laravel
RUN a2enmod rewrite

# set thư mục làm việc
WORKDIR /var/www/html

# copy source
COPY . .

# cài composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# cài package laravel
RUN composer install --no-dev --optimize-autoloader

# quyền ghi cho laravel
RUN chmod -R 777 storage bootstrap/cache

# trỏ apache vào public
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80
