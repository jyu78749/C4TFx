CREATE DATABASE mellivora CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE USER 'mellivora'@'localhost' IDENTIFIED BY 'mellivora_pass';
GRANT ALL PRIVILEGES ON mellivora.* TO 'mellivora'@'localhost'