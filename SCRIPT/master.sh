#!/bin/bash
#Script d'automatisation d'utilisateur du serveur Meetspace
#Le script prend en paramètre l'utilisateur et son mot de passe

#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction affichage du menu 
#------------------------------------------------------------------------------------------------------------------------------------------------------------

function afficher_Menu
{ 
	echo "Outils d'administration du serveur meetspace, version 0.1
	Utilisation: master [add/del] [name] [password]"


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
	echo " Function add_Share"
}

function add_Vhost
{
	echo " Function add_Vhost"
}

function add_Pad
{
	echo " Function add_Pad"
}

function add_Dns
{ 
	echo " Function add_Dns"
}

#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction del 
#------------------------------------------------------------------------------------------------------------------------------------------------------------

function del_Mail
{ 
	echo " Function del_Mail"
}

function del_Share
{
	echo " Function del_Share"
}

function del_Vhost
{
	echo " Function del_Vhost"
}

function del_Pad
{
	echo " Function del_Pad"
}

function del_Dns
{ 
	echo " Function del_Dns"
}



#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction main 
#------------------------------------------------------------------------------------------------------------------------------------------------------------


requete=$1
user=$2
password=$3

if [ $# = 3 ]
then

	case $1 in
		add)
			add_Mail
			add_Share
			add_Vhost
			add_Pad
			add_Mail
			add_Dns	
		;;
		del) 
			del_Mail
			del_Share
			del_Vhost
			del_Pad
			del_Mail
			del_Dns
	 	;;
		*) afficher_Menu
	esac


else
	afficher_Menu
fi 
