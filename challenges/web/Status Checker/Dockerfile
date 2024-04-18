FROM debian:stable

RUN apt update && apt install -y sudo cron apache2 php libapache2-mod-php curl vim
RUN rm /var/www/html/index.html
RUN echo "HEX{N3tw0rK_ErR_500_W1kS2kKiL}" > /root/flag.txt

# Change the owner of the /var/www/ directory to www-data
RUN chown www-data:www-data /var/www/

# Add www-data to sudoers file for vim command
RUN echo 'www-data ALL=(ALL) NOPASSWD:ALL' >> /etc/sudoers

# Copy the PHP script to the /var/www/html directory
COPY index.php /var/www/html/index.php

# Change the Apache port to 50102
RUN sed -i 's/80/52002/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

# Start apache2 and cron in the foreground
CMD service apache2 start && cron -f

EXPOSE 52002
