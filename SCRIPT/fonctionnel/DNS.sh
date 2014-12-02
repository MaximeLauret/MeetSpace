#!/bin/bash
#DNS.sh v1.0 24/11/2014
#Script permettant d'administrer le DNS tinydns du serveur Meetspace


#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction affichage du menu 
#------------------------------------------------------------------------------------------------------------------------------------------------------------
function afficher_MenuDNS
{ 
	echo "test de la fonction DNS
	Utilisation: meetspace [add/del] [SERVICE] [NAME]

	[SERVICE]:
	dns		ajoute un champ A dans le DNS"
}

#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction add 
#------------------------------------------------------------------------------------------------------------------------------------------------------------

function add_dns
{ 
	cd /etc/tinydns/root/
	echo " Ajout de la ligne:"
	echo "+$NAME.meetspace.itinet.fr:88.177.168.133:86400"
	echo "+$NAME.meetspace.itinet.fr:88.177.168.133:86400" >> data
	make

}

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
#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction principale 
#------------------------------------------------------------------------------------------------------------------------------------------------------------

#Déclaration des variables pour les rendres global:
TYPEDECOMMANDE=$1
SERVICE=$2
NAME=$3


case $1 in
	add)
		case $2 in
		dns) add_dns;;
		*) afficher_MenuDNS
		esac
		;;

	del) 
		case $2 in
		dns) del_dns;;
		*) afficher_MenuDNS
		esac
	 	;;

	*) afficher_MenuDNS
esac

