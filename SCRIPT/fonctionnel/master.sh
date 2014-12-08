#!/bin/bash
#Script d'automatisation d'utilisateur du serveur Meetspace
#Le script prend en paramètre l'utilisateur et son mot de passe
#DNS
source add_dns.sh
source del_dns.sh
#Unix / MySecureShell / Quota
source add_unixUser.sh
source del_unixUser.sh
#Mail
source add_mailUser.sh
source del_mailUser.sh
#Virtualhost - Apache
source add_vhost.sh
source del_vhost.sh
source disable_vhost.sh
source enable_vhost.sh


#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction affichage du menu 
#------------------------------------------------------------------------------------------------------------------------------------------------------------

function afficher_Menu
{ 
	echo "Outils d'administration du serveur meetspace
	Utilisation: master [add/del] [project/user] [name] [password]"
}


#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Déclaration des variables
#------------------------------------------------------------------------------------------------------------------------------------------------------------


# Déclaration des variables:
#Requette= " add " ou " del "
requete=$1

#projectORuser = project ou user 
projectORuser=$2

#name= Nom d'utilisateur ou de projet
name=$3

#password= mot de passe utilisateur
password=$4

#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction main 
#------------------------------------------------------------------------------------------------------------------------------------------------------------

#Si il y a bien 4 paramètre en entré
if [ $# = 4 ]
then

	case $requete in
		add)
		case $projectORuser in

			user) 
				#add_Unix
				#add_Share
				#add_UserMail
			;;

			project) 
				#add_Web
				#add_ShareBox #Cette fonction doit créé un rep partager entre tous les membres du projet
				#add_Pad
				#add_Mail #Cette fonction devra créé un mail avec un alias à tous les membres du projet
				#add_Vhost #La fonction Vhost devra pouvoir faire apparaitre ou disparaitre le blog en fonction du choix du chef de projet
				#add_Dns
				#add_PhpMyAdmin

			;;

			*) afficher_Menu
		esac	
		;;

		del)
		case $projectORuser in
			user)
				#add_Unix
				#add_Share
				#add_Mail
			;;

			project)
				#add_Web
				#add_Share
				#add_Pad
				#add_Mail
				#add_Vhost
				#add_Dns
				#add_PhpMyAdmin
			;;

			*) afficher_Menu
		esac
		;;

		enable)
		case $projectORuser in
			user) echo "Impossible de désactiver/activer un utilisateur pour l'instant" ;;

			project) ;;


			*) afficher_Menu
		esac
		;;

		disable)
		case $projectORuser in
			user) echo "Impossible de d'activer/désactiver un utilisateur pour l'instant";;

			project)  ;;

			*) afficher_Menu
		esac
		;;

		*) afficher_Menu
	esac

else
	afficher_Menu
fi  
