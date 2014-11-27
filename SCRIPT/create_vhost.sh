#!/bin/sh


# create_vhost.sh
# Create a new VirtualHost to host the project's devblog and activate it.
# Created by MaximeLauret (2014-11-26)


# CREATING THE VIRTUALHOST FOR THE NEW PROJECT

read project_name

mkdir -p /var/sftp/$project_name/www		# Creating the direcroty host
chown -R www-data:www-data /var/sftp/$project_name/www		# According writing writes to the interface user

# Editing the .conf file
echo "
<VirtualHost *:80>
	ServerName $project_name.meetspace.itinet.fr
	DocumentRoot /var/www/$project_name
</VirtualHost>
" > /etc/apache2/sites-available/$project_name.conf


# ACTIVATING THE DEVBLOG

if (activation)
then
	ln -s /etc/apache2/sites-enabled $project_name.conf;		# Creating the symbolic link
else
then
	# Nothing
fi

# RAJOUTER LOGS
