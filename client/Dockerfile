FROM php:7.4-cli

RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/bin/ --filename=composer

COPY composer.json ./

RUN composer install --no-scripts --no-autoloader

COPY . ./

RUN composer dump-autoload --optimize && \
    composer run-scripts post-install-cmd

CMD [ "php", "-S", "localhost:4000", "-t","./public/index.php" ]