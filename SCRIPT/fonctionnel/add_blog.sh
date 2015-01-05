#!/bin/bash
#Pierrick VERAN
#Script permettant d'ajouter le blog d'un projet

#Variable
name=$1

if (($#=="1"));then
	#Script
	/bin/cp -R /var/sftp/dotclear_install/dotclear/* /var/sftp/$name/www/
	/bin/chown -R www-data:www-data /var/sftp/$name
else
	echo " add_blogNombre: de paramètres invalide "
fi


