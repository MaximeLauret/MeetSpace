#!/bin/sh

# enable_vhost.sh
# Enable a VHost
# Created by Maxime LAURET (2014-12-01)


# Creating the symbolic link
#Variable
name=$1

#Script
/bin/ln -s /etc/apache2/sites-available/$name.conf /etc/apache2/sites-enabled/$name.conf
/usr/bin/service apache2 reload							# Reloading the Apache service
