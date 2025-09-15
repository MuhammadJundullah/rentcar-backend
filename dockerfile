# Gunakan image PHP dengan FPM sebagai base image
FROM php:8.2-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Install dependensi sistem yang dibutuhkan untuk ekstensi PHP
RUN apk update && apk add --no-cache \
    nginx \
    curl \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    jpeg-dev \
    freetype-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    oniguruma-dev \
    libxml2-dev \
    icu-dev \
    $PHPIZE_DEPS \
    supervisor \
    && rm -rf /var/cache/apk/*

# Install ekstensi PHP yang diperlukan
# Filament/Laravel membutuhkan ekstensi seperti pdo_mysql, mbstring, exif, intl, dll.
RUN docker-php-ext-install -j$(nproc) \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip \
    intl \
    opcache \
    && docker-php-ext-configure gd --with-jpeg --with-freetype --with-webp \
    && docker-php-ext-install -j$(nproc) gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Salin kode aplikasi dari host ke container
COPY . .

# Jalankan composer install. "--no-dev" untuk production.
RUN composer install --no-dev --optimize-autoloader

# Salin konfigurasi nginx
COPY docker/nginx/nginx.conf /etc/nginx/nginx.conf

# Salin konfigurasi supervisord
COPY docker/supervisor/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Bersihkan cache
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

RUN mkdir -p /var/log/supervisord /var/log/supervisor

# Expose port 80
EXPOSE 80

# Mulai Nginx dan PHP-FPM menggunakan supervisord
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]