#!/bin/sh


# disable_vhost.sh
# Disable a VHost
# Created by Maxime LAURET (2014-12-01)

function disable_vhost
{ 
	rm /etc/apache2/sites-enabled/$name			# Deleting the symbolic link	
}
