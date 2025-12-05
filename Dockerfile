# Dockerfile para Laravel en Render
FROM php:8.2-fpm

# 1. Instalar dependencias del sistema (incluido libpq-dev para Postgres)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_pgsql

# 2. Instalar Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# 3. Directorio de trabajo
WORKDIR /var/www

# 4. Copiar el código fuente
COPY . /var/www

# 5. Instalar dependencias de PHP de Laravel
RUN composer install --optimize-autoloader --no-dev

# 6. Permisos para storage y cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# 7. Exponer puerto (Render usará la variable $PORT, pero dejamos 8080 por defecto)
EXPOSE 8080

# 8. Comando de inicio:
#    - Corre migraciones en Neon
#    - Luego levanta el servidor de Laravel
CMD ["sh", "-c", "php artisan migrate --force && php artisan db:seed --force && php artisan serve --host=0.0.0.0 --port=${PORT:-8080}"]
