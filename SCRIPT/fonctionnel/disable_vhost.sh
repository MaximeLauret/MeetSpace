#!/bin/sh

# disable_vhost.sh
# Disable a VHost
# Created by Maxime LAURET (2014-12-01)


#Variable
name=$1

#Script

if (($#=="1"));then
	/bin/rm /etc/apache2/sites-enabled/$name.conf		# Deleting the symbolic link
	/usr/sbin/service apache2 reload				# Reloading the Apache service
else
	echo " disable_vhost: Nombre de paramètres invalide "
fi
