#!/bin/bash

sudo apt update
sudo apt install nginx php-fpm php-xml php-curl php-mysql php-mbstring php-pear composer mysql-server
echo "[*] Running secure sql installation: answer 'No' to the first question and 'Yes' to remaining"
sudo mysql_secure_installation
sudo cp -r ../CCCTFx/ /var/www/ctfx/
cd /var/www/ctfx
composer install --no-dev --optimize-autoloader
sudo chmod -R 777 writable/
sudo cp install/recommended_nginx_config /etc/nginx/nginx.conf
sudo mysql < install/sql/000-db.sql
sudo mysql < install/sql/001-mellivora.sql
sudo mysql < install/sql/002-countries.sql
sudo service nginx restart
echo "[SUCCESS] CCCTFx has finished rapid install."
echo "Definitely please change the mysql username/password and update accordingly in ctfx/include/config/db.inc.php."
echo "You can also rename the ctfx directory, which requires updating in config.inc.php and nginx.conf"
echo "What's left is to create an account on the server, then set it to admin via:"
echo "sudo mysql < install/sql/003-admin.sql"