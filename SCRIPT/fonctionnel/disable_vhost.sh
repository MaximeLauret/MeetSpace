#!/bin/sh


# disable_vhost.sh
# Disable a VHost
# Created by Maxime LAURET (2014-12-01)

/bin/rm /etc/apache2/sites-enabled/$name.conf		# Deleting the symbolic link
/usr/bin/service apache2 reload							# Reloading the Apache service
