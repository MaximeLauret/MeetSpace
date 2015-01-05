#!/bin/bash
#Script d'automatisation de la gestion du serveur Meetspace

#------------------------------------------------------------------------------------------------------------------------------------------------------------
#								Inclusion des diffèrentes fonction du script
#------------------------------------------------------------------------------------------------------------------------------------------------------------
echo " Include: Start .."
#Unix / MySecureShell / Quota - Gestion des utilisateurs
function add_userUnix { source add_userUnix.sh }
function del_userUnix { source del_userUnix.sh }

#Mail - Gestion des utilisateurs
function add_userMail { source add_userMail.sh }
function del_userMail { source del_userMail.sh }

#Mail - Gestion des alias

function add_projectAlias { source add_projectAlias.sh }
function add_userAlias { source add_userAlias.sh }
function del_projectAlias { source del_projectAlias.sh }
function del_userAlias { source del_userAlias.sh }

#Virtualhost - Apache - Gestion des sites Web
function add_vhost { source add_vhost.sh }
function del_vhost { source del_vhost.sh }
function disable_vhost { source disable_vhost.sh }
function enable_vhost { source enable_vhost.sh }

#DNS - TinyDNS - Gestion des sites Web
function add_dns { source add_dns.sh }
function del_dns { source del_dns.sh }

#Blog - Dotclear 
function add_blog { source add_blog.sh }
function del_blog { source del_blog.sh }

#Le menu du script master - Explique comment utiliser le script
function master_menu { source master_menu.sh}

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
			add_userUnix $name $password
			add_userMail $name $password
		;;

		del)   # SUPPRESSION D'UN UTILISATEUR
			echo " main: Suppression de l'utilisateur name:$VAR3"
			del_userUnix $name
			del_userMail $name
		;;

		*) afficher_Menu
		esac	
		;;

	project)	 # GESTION DES PROJETS
	case $VAR2 in

		add) # CREATION D'UN PROJETS
			name=$VAR3
			echo " main: Ajout du projet name:$name"
			add_projectAlias $name
			add_vhost $name
			add_dns $name
			add_blog $name
		;;

		del) # SUPPRESSION D'UN PROJETS
			name=$VAR3
			echo " main: Suppression du projet name:$name"
			del_projectAlias $name
			del_vhost $name
			del_dns $name
			del_blog $name
		;;

		vhost) # GESTION DES VHOSTS
		name=$VAR4
			case $VAR3 in

			enable) # ACTIVATION D'UN VHOST
			echo " main: Activation du vhost name:$name"
			enable_vhost $name
			;;

			disable) # DÉSACTIVATION D'UN VHOST
			echo " main: Désactivation du vhost name:$name"
			disable_vhost $name
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
			add_userAlias $userName $projectName
			;;

			del) # SUPPRESSION D'UN ALIAS
			echo " main: Suppression de l'alias projectName:$projectName userName:$userName"
			del_userAlias $userName $projectName
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
