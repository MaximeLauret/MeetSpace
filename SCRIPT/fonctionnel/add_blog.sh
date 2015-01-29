#!/bin/bash
#Pierrick VERAN
#Script permettant d'ajouter le blog d'un projet

#Variable
name=$1

#Script
/usr/bin/mysql -u local_root -p local_root -Bse "CREATE DATABASE $name;CREATE USER
$name@localhost;SET PASSWORD FOR $name@localhost = PASSWORD('$name');GRANT ALL
PRIVILEGES ON $name.* TO $name@localhost IDENTIFIED BY '$name';"
/bin/cp -R /var/sftp/dotclear_install/dotclear/* /var/sftp/$name/www/
/bin/chown -R www-data:www-data /var/sftp/$name


exit 0