#!/bin/bash
#Pierrick VERAN
#Script permettant d'ajouter le blog d'un projet


/bin/cp -R /var/sftp/dotclear_install/dotclear/* /var/sftp/$name/www/
/bin/chown -R www-data:www-data /var/sftp/$name
