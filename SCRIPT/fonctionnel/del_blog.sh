#!/bin/bash
#Pierrick VERAN
#Script permettant d'administrer le DNS tinydns du serveur Meetspace

function del_blog
{ 
	rm -R /var/sftp/$name/www/dotclear
}
