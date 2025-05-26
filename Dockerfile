FROM php:8.3-fpm
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip \
    libpq-dev && docker-php-ext-install pdo pdo_pgsql pgsql mbstring exif pcntl bcmath gd
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /var/www
COPY . /var/www
RUN chown -R www-data:www-data /var/www 