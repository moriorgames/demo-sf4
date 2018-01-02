# Build command:
# docker build -t moriorgames/demo_sf .
# Run command:
# docker run -td --name demo_sf -p 4001:4001 moriorgames/demo_sf
FROM        ubuntu:17.10
MAINTAINER  MoriorGames "moriorgames@gmail.com"

# Install packages
RUN         apt-get update
RUN         apt-get update -y
RUN         apt-get install -y software-properties-common
RUN         apt-get install -y language-pack-en-base
RUN         LC_ALL=en_US.UTF-8 add-apt-repository ppa:ondrej/php

# Once the PPA is installed, update the local package cache to include its contents:
RUN         apt-get update
RUN         apt-get install -y php7.1 php7.1-mysql zip php7.1-xml
RUN         apt-get install -y vim

# Install some other packages to the image
RUN         apt-get -y install git apache2
RUN         echo "ServerName localhost" >> /etc/apache2/apache2.conf

# config to enable .htaccess
ADD         docker/vhost_default.conf /etc/apache2/sites-available/000-default.conf
RUN         a2enmod rewrite

# Create Application directory
RUN         mkdir -p /app && rm -fr /var/www/html && ln -s /app /var/www/html
COPY        . /app
WORKDIR     /app

# Add run scripts
ADD         docker/run.sh /run.sh
RUN         chmod 755 /*.sh

# Composer variables
ENV         COMPOSER_HOME /app

# Build project
RUN     php /app/phars/composer.phar install --optimize-autoloader
RUN     chown www-data:www-data /app -R
RUN     chmod 0777 -R var
RUN     chmod 0777 -R public

# Expose ports
EXPOSE  4001

ENTRYPOINT  ["/run.sh"]
