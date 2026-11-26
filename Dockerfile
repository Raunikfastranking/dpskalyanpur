FROM php:8.2-apache

# Enable Apache modules required by .htaccess
RUN a2enmod rewrite headers deflate expires

# Allow .htaccess overrides in the document root
RUN sed -ri 's/AllowOverride\s+None/AllowOverride All/g' /etc/apache2/apache2.conf

# Copy site files
COPY . /var/www/html/

# Ensure Apache can read everything and write to the cache dir
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
