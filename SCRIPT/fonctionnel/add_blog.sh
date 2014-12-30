#!/bin/bash
#Pierrick VERAN
#Script permettant d'ajouter le blog d'un projet


cp -R /var/sftp/dotclear_install/dotclear/* /var/sftp/$name/www/
chown -R www-data:www-data /var/sftp/$name