#!/bin/sh


# create_vhost.sh
# Create a new VirtualHost to host the project's devblog and activate it.
# Created by MaximeLauret (2014-11-26)



# CREATING THE VIRTUALHOST FOR THE NEW PROJECT

echo "Enter project name"
read project_name

mkdir -p /var/sftp/$project_name/www		# Creating the directory host
chown -R www-data:www-data /var/sftp/$project_name/www		# According writing writes to the interface user
echo "The host has been created"


# Editing the .conf file

echo "
<VirtualHost *:80>
	ServerName $project_name.meetspace.itinet.fr
	DocumentRoot /var/sftp/$project_name
</VirtualHost>
" > /etc/apache2/sites-available/$project_name.conf
echo "The configuration file has been created"



# ACTIVATING THE DEVBLOG

echo "Activation ? (Y/N)"
read activation
if [ activation = "Y" ]
then
	ln -s /etc/apache2/sites-available/$project_name.conf /etc/apache2/sites-enabled/$project_name.conf;		# Creating the symbolic link
	echo "The virtualhost is now active";
else
	echo "The virtualhost is inactive";
fi

# RAJOUTER LOGS
