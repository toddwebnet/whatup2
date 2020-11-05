CREATE USER 'whatup'@'%' IDENTIFIED BY 'SuperSecretDeveloper';
CREATE DATABASE IF NOT EXISTS `whatup`;
GRANT ALL PRIVILEGES ON `whatup`.* TO 'whatup'@'%';GRANT ALL PRIVILEGES ON `whatup\_%`.* TO 'whatup'@'%';
flush privileges;
