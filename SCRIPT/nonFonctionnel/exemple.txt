#!/bin/bash
#DNS.sh v1.0 24/11/2014
#Script permettant d'administrer le DNS tinydns du serveur Meetspace


#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction affichage du menu 
#------------------------------------------------------------------------------------------------------------------------------------------------------------
function afficher_MenuDNS
{ 
	echo "Outils d'administration du serveur meetspace, version 0.1
	Utilisation: meetspace [add/del] [SERVICE] [NAME]

	[SERVICE]:
	dns		ajoute un champ A dans le DNS"
}

#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction add 
#------------------------------------------------------------------------------------------------------------------------------------------------------------

function add_dns
{ 
	echo " Ajout de la ligne:"
	echo "+$NAME.meetspace.itinet.fr:88.177.168.133:86400"
	echo "+$NAME.meetspace.itinet.fr:88.177.168.133:86400" >> data
}

#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction del 
#------------------------------------------------------------------------------------------------------------------------------------------------------------

function del_dns
{ 
	#Fonctionelle. Le seul problème c'est que si j'add projet1 et projet10 et que je décide de del projet1. Projet 10 disparait aussi..
	echo " Suppression de la ligne: $NAME"
	echo "+"$NAME".meetspace.itinet.fr:88.177.168.133:86400"
	sed -i "/${NAME}/d" data
	#grep -v $NAME data > old_data
	#grep -v "+$NAME.meetspace.itinet.fr:88.177.168.133:86400" data > old_data
	#sed -i '/\${NAME}/d' data
		
	# data
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

