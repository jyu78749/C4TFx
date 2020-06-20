CCCTFx
=========

CCCTFx is a fork of the CTFx platform by Milkdrop, built specifically for the Callipygian Consortium of Cryptography and its varying needs to run a high school CTF. CCCTFx utilizes CTFx's speed, low footprint, and features, and utilizes the following additions:
  - Security: hashing flags to prevent server leaks

## Installation
Run quickinstall.sh or do the following:

**- Install the following dependencies**
  - `nginx php-fpm php-xml php-curl php-mysql php-mbstring php-pear composer mysql-server`

**- Secure mysql server**
  - Run the command `mysql_secure_installation` and remove anonymous users, disable root login and remove the test database

**- Copy repo contents to /var/www/ctfx/**
  - Run `composer install --no-dev --optimize-autoloader` under /var/www/ctfx
  - Make the folder `writable` writable

**- Setup nginx**
  - Copy the recommended nginx config `install/recommended_nginx_config` to `/etc/nginx/nginx.conf` - For the fastcgi_pass entry, you must change the PHP version to your current one.
  - Make sure to restart nginx after changing the config!

**- Setup MySQL**
  - sudo into `mysql`, then run the following queries:
  - `CREATE DATABASE mellivora CHARACTER SET utf8 COLLATE utf8_general_ci;`
  - `GRANT ALL PRIVILEGES ON mellivora.* TO 'mellivora'@'%' IDENTIFIED BY 'mellivora_pass';` - Make sure you change the default db username and password!

  - exit `mysql`
  - `sudo mysql < install/sql/001-mellivora.sql`
  - `sudo mysql < install/sql/002-countries.sql`

**- Create Admin User**
  - Register your admin account on the website (and enable 2FA Authentication preferably)
  - Logout of your account
  - sudo into `mysql` and run the query `USE mellivora; UPDATE users SET class=100 WHERE id=1;`

## Installation Tips:
- You can change the /var/www/ctfx path, but if you do so, you must update the `MELLIVORA_CONFIG_PATH_BASE` variable in `include/config/config.inc.php`
- It is **recommended** that you change the default database password, and if you do so you must also change it in `include/config/db.inc.php`
- You can change the homepage to your liking by modifying `htdocs/home.php`. Make sure to also change the css rules in `htdocs/css/mellivora.min.css` for #ctfx-main-logo and .main-intro-text, if you want a different overall style.
- You might want to change the `MELLIVORA_CONFIG_CTF_START_TIME` and `MELLIVORA_CONFIG_CTF_END_TIME` variables in `include/config/config.inc.php`, so that each new challenge you create will have these times set as default.

## License
This framework is a fork of CTFx, which is a fork of Mellivora, and inherits the GPLv3 license through copyleft.
This software is licenced under the [GNU General Public License v3 (GPL-3)](http://www.tldrlegal.com/license/gnu-general-public-license-v3-%28gpl-3%29). The "include/thirdparty/" directory contains third party code. Please read their LICENSE files for information on the software availability and distribution.
