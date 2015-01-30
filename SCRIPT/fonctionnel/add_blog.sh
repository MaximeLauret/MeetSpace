#!/bin/bash
#Pierrick VERAN
#Script permettant d'ajouter le blog d'un projet

#Variable
name=$1

#Script
<<<<<<< HEAD
/usr/bin/mysql -u local_root -Bse "CREATE DATABASE $name;CREATE USER
$name@localhost;SET PASSWORD FOR $name@localhost = PASSWORD('$name');GRANT ALL
PRIVILEGES ON $name.* TO $name@localhost IDENTIFIED BY '$name';"
=======

/usr/bin/mysql -u local_root -plocal_root -Bse "CREATE DATABASE $1;CREATE USER $1@localhost;SET PASSWORD FOR $1@localhost = PASSWORD('$2');GRANT ALL PRIVILEGES ON $1.* TO $1@localhost IDENTIFIED BY '$2'" 
>>>>>>> 5dac347ed3c95455aaf9e204309924d7c3c907f8
/bin/cp -R /var/sftp/dotclear_install/dotclear/* /var/sftp/$name/www/
/bin/chown -R www-data:www-data /var/sftp/$name


exit 0
