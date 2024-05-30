# since we don't run init.d under docker
# we need to start each service explicitly
/etc/init.d/php8.3-fpm start
/etc/init.d/nginx start
/etc/init.d/mysql start