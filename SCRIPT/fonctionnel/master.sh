#!/bin/bash
#Script d'automatisation de la gestion du serveur Meetspace

#------------------------------------------------------------------------------------------------------------------------------------------------------------
#								Inclusion des diffèrentes fonction du script
#------------------------------------------------------------------------------------------------------------------------------------------------------------
echo " Include: Start .."
#Unix / MySecureShell / Quota - Gestion des utilisateurs
source add_userUnix.sh
source del_userUnix.sh

#Mail - Gestion des utilisateurs
source add_userMail.sh
source del_userMail.sh

#Mail - Gestion des alias

source add_projectAlias.sh
source add_userAlias.sh
source del_projectAlias.sh
source del_userAlias.sh

#Virtualhost - Apache - Gestion des sites Web
source add_vhost.sh
source del_vhost.sh
source disable_vhost.sh
source enable_vhost.sh

#DNS - TinyDNS - Gestion des sites Web
source add_dns.sh
source del_dns.sh

#Blog - Dotclear 
source add_blog.sh
source del_blog.sh

#Le menu du script master - Explique comment utiliser le script
source master_menu.sh

declare -F

echo " Include: .. end "

#------------------------------------------------------------------------------------------------------------------------------------------------------------
#										Déclaration des variables
#------------------------------------------------------------------------------------------------------------------------------------------------------------

# Déclaration des variables:

#
VAR1=$1
echo " VAR1: $VAR1"
#
VAR2=$2
echo " VAR2: $VAR2"

# 
VAR3=$3
echo " VAR3: $VAR3"

# 
VAR4=$4
echo " VAR4: $VAR4"

#
VAR5=$5
echo " VAR5: $VAR5"

#
VAR6=$6
echo " VAR6: $VAR6"
#------------------------------------------------------------------------------------------------------------------------------------------------------------
#											Main
#------------------------------------------------------------------------------------------------------------------------------------------------------------



case $VAR1 in
	user)
	#Initialisation des variables utilisateur
	name=$VAR3
	password=$VAR4
	case $VAR2 in	 # GESTION DES UTILISATEURS

		add)  # CREATION D'UN UTILISATEUR
			echo " main: Ajout d'un nouvel utilisateur name:$name password:$password"
			add_userUnix
			add_userMail
		;;

		del)   # SUPPRESSION D'UN UTILISATEUR
			echo " main: Suppression de l'utilisateur name:$VAR3"
			del_userUnix
			del_userMail
		;;

		*) afficher_Menu
		esac	
		;;

	project)	 # GESTION DES PROJETS
	case $VAR2 in

		add) # CREATION D'UN PROJETS
			name=$VAR3
			echo " main: Ajout du projet name:$name"
			add_projectAlias
			add_vhost
			add_dns
			add_blog
		;;

		del) # SUPPRESSION D'UN PROJETS
			name=$VAR3
			echo " main: Suppression du projet name:$name"
			del_projectAlias
			del_vhost
			del_dns
			del_blog
		;;

		vhost) # GESTION DES VHOSTS
		name=$VAR4
			case $VAR3 in

			enable) # ACTIVATION D'UN VHOST
			echo " main: Activation du vhost name:$name"
			enable_vhost
			;;

			disable) # DÉSACTIVATION D'UN VHOST
			echo " main: Désactivation du vhost name:$name"
			disable_vhost
			;;
			*) afficher_Menu
			esac
			;;

		alias) # GESTION DES ALIAS
		projectName=$VAR4
		userName=$VAR5
			case $VAR3 in

			add) # CREATION D'UN ALIAS
			echo " main: Création de l'alias projectName:$projectName userName:$userName"
			add_userAlias
			;;

			del) # SUPPRESSION D'UN ALIAS
			echo " main: Suppression de l'alias projectName:$projectName userName:$userName"
			del_userAlias
			;;
			*) afficher_Menu
			esac
			;;

		*) afficher_Menu
		esac
		;;
	*) afficher_Menu
esac
exit
