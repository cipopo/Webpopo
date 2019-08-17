#!/bin/bash
service mysql start
export MYSQL_PASSWORD=$(date +%s | sha256sum | base64 | head -c 10)
echo "UPDATE user SET password=PASSWORD('$MYSQL_PASSWORD') WHERE user='root';FLUSH PRIVILEGES;create database security" | mysql --host localhost --user root mysql
mysql --host localhost --user root -p$MYSQL_PASSWORD security < /var/security.sql
apache2-foreground