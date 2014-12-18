#!/bin/bash
#Pierrick VERAN
#Script permettant d'administrer le DNS tinydns du serveur Meetspace

function add_dns
{ 
	cd /etc/tinydns/root/
	echo " Ajout de la ligne:"
	echo "+$name.meetspace.itinet.fr:88.177.168.133:86400"
	echo "+$name.meetspace.itinet.fr:88.177.168.133:86400" >> data
	make

}
