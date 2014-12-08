#!/bin/bash
#Pierrick VERAN
#Script permettant d'administrer le DNS tinydns du serveur Meetspace

#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction del 
#------------------------------------------------------------------------------------------------------------------------------------------------------------

function del_dns
{ 
	#Fonctionelle. Le seul problème c'est que si j'add projet1 et projet10 et que je décide de del projet1. Projet 10 disparait aussi..
	cd /etc/tinydns/root/
	echo " Suppression de la ligne: $NAME"
	echo "+"$NAME".meetspace.itinet.fr:88.177.168.133:86400"
	sed -i "/${NAME}/d" data
	make
}

