#!/bin/sh

# del_vhost.sh
# Delete a VHost
# Created by Maxime LAURET (2014-12-01)

#Variable
name=$1

#Script

if (($#=="1"));then
	/bin/rm /etc/apache2/sites-available/$name.conf		# Deleting the .conf file
	/bin/rm -R /var/sftp/$name				# Deleting the directory
	/usr/sbin/service apache2 reload				# Reloading the Apache service
else
	echo " del_vhost: Nombre de paramètres invalide "
fi
