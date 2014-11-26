#!/bin/bash
#Projet Meetspace
#Script de création


#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction affichage du menu 
#------------------------------------------------------------------------------------------------------------------------------------------------------------
function afficher_Menu
{ 
	echo "Outils d'administration du serveur meetspace, version 0.1
	Utilisation: meetspace [add/del] [SERVICE] [NAME]

	[SERVICE]:
	mail		ajoute/supprime un compte mail
	share		ajoute/supprime un compte de partage OwnCloud
	vhost		ajoute/supprime un virtualHost
	pad		ajoute/supprime un pad"
}
#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction add 
#------------------------------------------------------------------------------------------------------------------------------------------------------------

function add_Mail
{ 
echo " Function add_Mail"
}

function add_Share
{
echo " Fuction add_Share"
}

function add_Vhost
{
echo " Function add_Vhost"
}

function add_Pad
{
echo " Function add_Pad"
}

function add_Mail
{ 
echo " Function add_Mail"
}

#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction del 
#------------------------------------------------------------------------------------------------------------------------------------------------------------
function del_Share
{
echo " Fuction del_Share"
}

function del_Vhost
{
echo " Function del_Vhost"
}

function del_Pad
{
echo " Function del_Pad"
}

#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction main 
#------------------------------------------------------------------------------------------------------------------------------------------------------------

case $1 in
	add)
		case $2 in
		mail) add_Mail;;
		share) add_Share;;
		vhost) add_Vhost;;
		pad) add_Pad;;
		*) afficher_Menu
		esac
		
	;;

	del) 
		case $2 in
		mail) del_Mail;;
		share) del_Share;;
		vhost) del_Vhost;;
		pad) del_Pad;;
		*) afficher_Menu
		esac
	 ;;
	*) echo " Invalide "
esac



