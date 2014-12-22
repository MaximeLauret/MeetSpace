#!/bin/sh

# add_vhost.sh
# Create a new VHost
# Created by Maxime LAURET (2014-11-26)

function add_vhost
{ 
	# Creating the directory host
	mkdir -p /var/sftp/$name/www
	# According rights to the user interface
	chown -R www-data:www-data /var/sftp/$name/www
	# Editing the configuration file
	echo "	<VirtualHost 10.8.96.3:80>
		ServerName $name.meetspace.itinet.fr
		DocumentRoot /var/sftp/$name/www
	</VirtualHost>
	" > /etc/apache2/sites-available/$name.conf
	service apache2 reload							# Reloading the Apache service
}
