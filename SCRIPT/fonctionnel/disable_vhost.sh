#!/bin/sh


# disable_vhost.sh
# Disable a VHost
# Created by Maxime LAURET (2014-12-01)
 
	rm /etc/apache2/sites-enabled/$name.conf		# Deleting the symbolic link
	service apache2 reload							# Reloading the Apache service