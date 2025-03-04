# Use the official PHP image as the base image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Copy requirements file
COPY docker/requirements.txt /tmp/

# Install dependencies
RUN apt-get update && cat /tmp/requirements.txt | xargs apt-get install -y

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN pecl install mcrypt-1.0.7 && docker-php-ext-enable mcrypt

# Install extensions
RUN docker-php-ext-install iconv intl xml soap opcache pdo pdo_mysql mysqli mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www-data:www-data . /var/www

# Change current user to www
USER www-data

RUN chmod +x entrypoint.sh

# Expose port 9000 and start php-fpm server
EXPOSE 9000

# Run the script
CMD ["sh", "/var/www/entrypoint.sh"]
