#!/bin/bash
#Pierrick VERAN
#Script permettant d'administrer le DNS tinydns du serveur Meetspace

#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction del 
#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Variable
name=$1


#Code
if (($#=="1"));then
	#Fonctionelle. Le seul problème c'est que si j'add projet1 et projet10 et que je décide de del projet1. Projet 10 disparait aussi..
	/bin/echo " Suppression de la ligne: $name"
	/bin/echo "+"$name".meetspace.itinet.fr:88.177.168.133:86400"
	/bin/sed -i "/${name}/d" /etc/tinydns/root/data
	/usr/bin/make -C /etc/tinydns/root/
else
echo " Nombre de paramêtre invalide "

fi



