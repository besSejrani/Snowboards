FROM php:7.4-fpm-alpine

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apk update \
    # install Git
    && apk add git --no-cache \
    #
    && apk add libxml2-dev \
    # instal redis
    && git clone https://github.com/phpredis/phpredis.git /usr/src/php/ext/redis \
    # Clear cache
    && rm -rf /var/lib/apk/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql xml redis



# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY ./composer.json ./

RUN composer install

# Create system user to run Composer and Artisan Commands
RUN adduser -S $user -G www-data -u $uid -h /home/$user $user \
    && mkdir -p /home/$user/.composer && \
    chown -R root /home/$user

RUN composer install

USER $user
