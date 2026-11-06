FROM php:8.4.26-fpm-alpine

# Set the PHP memory limit and display errors in HTTP responses.
RUN printf "memory_limit=128M\ndisplay_errors=On\n" > /usr/local/etc/php/conf.d/docker-php-settings.ini

# Install nginx and supervisor to run a complete local stack in one container
RUN apk add --no-cache nginx supervisor

# Configure Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# Configure Supervisor
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copy application source
COPY html_index.php /var/www/html/index.php

EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
