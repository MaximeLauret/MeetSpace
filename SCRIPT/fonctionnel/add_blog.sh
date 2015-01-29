#!/bin/bash
#Pierrick VERAN
#Script permettant d'ajouter le blog d'un projet

#Variable
name=$1

#Script

/usr/bin/mysql -u local_root -plocal_root -Bse "CREATE DATABASE $1;CREATE USER $1@localhost;SET PASSWORD FOR $1@localhost = PASSWORD('$2');GRANT ALL PRIVILEGES ON $1.* TO $1@localhost IDENTIFIED BY '$2'" 
/bin/cp -R /var/sftp/dotclear_install/dotclear/* /var/sftp/$name/www/
/bin/chown -R www-data:www-data /var/sftp/$name


exit 0