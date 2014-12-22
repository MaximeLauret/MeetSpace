#!/bin/bash
#Pierrick VERAN
#Script permettant d'administrer le DNS tinydns du serveur Meetspace

function add_blog
{ 
	cd /var/sftp/$name/www
	wget http://download.dotclear.org/latest.tar.gz
	tar -xzvf *.tar.gz
}
