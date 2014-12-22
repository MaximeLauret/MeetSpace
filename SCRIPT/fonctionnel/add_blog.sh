#!/bin/bash
#Pierrick VERAN
#Script permettant d'administrer le DNS tinydns du serveur Meetspace

function add_blog
{ 
	cd /var/sftp/$name/
	wget http://download.dotclear.org/latest.tar.gz
	tar -xzvf latest.tar.gz
	rm latest.tar.gz
}
