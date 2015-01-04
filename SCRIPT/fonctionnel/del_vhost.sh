#!/bin/sh

# del_vhost.sh
# Delete a VHost
# Created by Maxime LAURET (2014-12-01)

disable_vhost									# Disabling the Vhost
/bin/rm /etc/apache2/sites-available/$name.conf		# Deleting the .conf file
/bin/rm -R /var/sftp/$name							# Deleting the directory

/usr/bin/service apache2 reload							# Reloading the Apache service
