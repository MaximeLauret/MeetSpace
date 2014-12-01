#!/bin/sh

# add_vhost.sh
# Create a new VHost
# Created by Maxime LAURET (2014-11-26)



# Creating the directory host
mkdir -p /var/sftp/$name/www
# According writes to the user interface
chown -R www-data:www-data /var/sftp/$project_name/www
# Editing the configuration file
echo "
<VirtualHost *:80>
	ServerName $project_name.meetspace.itinet.fr
	DocumentRoot /var/sftp/$project_name
</VirtualHost>
" > /etc/apache2/sites-available/$name.conf
