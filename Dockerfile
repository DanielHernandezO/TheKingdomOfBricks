FROM php:8.1.4-apache
RUN apt-get update -y && apt-get install -y openssl zip unzip git 
RUN docker-php-ext-install pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY . /var/www/html
COPY ./public/.htaccess /var/www/html/.htaccess
COPY .env.example /var/www/html/.env

WORKDIR /var/www/html
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist


ENV GOOGLE_API_KEY ${GOOGLE_API_KEY}
ENV GOOGLE_CUSTOM_SEARCH_ENGINE_ID c0cfe3778c8a64d38
ENV DB_HOST 34.31.63.184
ENV DB_DATABASE kingdomdb
ENV DB_USERNAME root
ENV DB_PASSWORD password

RUN php artisan key:generate && \
    php artisan migrate && \
    chmod -R 777 storage && \
    a2enmod rewrite && \
    php artisan storage:link

EXPOSE 80

CMD ["apache2-foreground"]
