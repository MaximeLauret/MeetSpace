#!/bin/sh

# del_vhost.sh
# Delete a VHost
# Created by Maxime LAURET (2014-12-01)

/bin/rm /etc/apache2/sites-available/$name.conf		# Deleting the .conf file
/bin/rm -R /var/sftp/$name							# Deleting the directory

/usr/bin/service apache2 reload							# Reloading the Apache service
