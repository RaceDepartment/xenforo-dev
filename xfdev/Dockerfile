FROM ubuntu:20.04
ENV DEBIAN_FRONTEND="noninteractive"

RUN apt-get update && apt-get install -y apt-utils software-properties-common

# add php repo
RUN add-apt-repository ppa:ondrej/php

RUN apt-get install -y \
   openssh-server sudo curl vim nginx mysql-server unzip git \
   php8.3-fpm php8.3-mysql php8.3-gd php8.3-curl php8.3-xml php8.3-zip \
   php-pear php8.3-memcache php8.3-xdebug 

RUN mkdir /var/run/sshd && \
    mkdir /var/www/.ssh && \
    chown www-data:www-data /var/www/.ssh /var/www /var/www/html

RUN echo "www-data ALL=(ALL:ALL) NOPASSWD: ALL" > /etc/sudoers.d/www-data
# allow ssh login to www-data
RUN usermod -s /bin/bash www-data
# allow sudo /etc/init.d/mysql restart
RUN usermod -d /var/lib/mysql mysql

# change this for any newer versions of XF
ADD --chown=www-data:www-data xenforo.2.2.bz2 /var/www/html 
COPY --chown=www-data:www-data config.php /var/www/html/src/config.php

COPY --chown=www-data:www-data install-xf.sh start-services.sh /var/www
# init DB and XF
RUN chmod 755 /var/www/install-xf.sh /var/www/start-services.sh && \
    /var/www/start-services.sh && \
    su - www-data /var/www/install-xf.sh \
    /etc/init.d/mysql stop

# make sure you have at least authorized_keys in ssh if you want to
# be able to ssh onto the box
COPY --chown=www-data:www-data ssh/* /var/www/.ssh

# copy over some config files
COPY default.nginx /etc/nginx/sites-available/default
COPY xdebug.ini /etc/php/8.3/mods-available/xdebug.ini
COPY x.conf /etc/php/8.3/fpm/pool.d/x.conf

# create some example users
COPY --chown=www-data:www-data example-users.php /var/www
RUN /var/www/start-services.sh && \
    php /var/www/example-users.php && \
    /etc/init.d/mysql stop

# we are not running init.d so we launch each service in the background
# then we launch sshd in the foreground to stop the container from simply finishing
CMD /var/www/start-services.sh; /usr/sbin/sshd -D
