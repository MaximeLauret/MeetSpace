#!/bin/sh

# add_vhost.sh
# Create a new VHost
# Created by Maxime LAURET (2014-11-26)

# Creating the directory host
/bin/mkdir -p /var/sftp/$name/www
# According rights to the user interface
/bin/chown -R www-data:www-data /var/sftp/$name/www
# Editing the configuration file
/bin/echo "	<VirtualHost 10.8.96.3:80>
	ServerName $name.meetspace.itinet.fr
	DocumentRoot /var/sftp/$name/www
</VirtualHost>
" > /etc/apache2/sites-available/$name.conf
/usr/bin/service apache2 reload							# Reloading the Apache service
