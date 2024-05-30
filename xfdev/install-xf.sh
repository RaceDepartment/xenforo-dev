
sudo mysql <<"EOF"
USE mysql;

CREATE DATABASE IF NOT EXISTS xf;
CREATE USER 'xf'@'localhost' IDENTIFIED BY 'overtake';
GRANT ALL PRIVILEGES ON xf.* TO 'xf'@'localhost';

FLUSH PRIVILEGES ;
EOF

# give enough options so that xf:install doesn't prompt
cd /var/www/html
php cmd.php xf:install \
    --user=admin \
    --password=overtake \
    --email=admin@localhost.com \
    --title=XenForo \
    --url=http://127.0.0.1:7080

