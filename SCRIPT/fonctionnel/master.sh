#!/bin/bash
#Script d'automatisation de la gestion du serveur Meetspace

#------------------------------------------------------------------------------------------------------------------------------------------------------------
#								Inclusion des diffèrentes fonction du script
#------------------------------------------------------------------------------------------------------------------------------------------------------------
echo " Include: Start .."
#Unix / MySecureShell / Quota - Gestion des utilisateurs
function add_userUnix { echo eval "source add_userUnix.sh"; }
echo "1"
function del_userUnix { echo eval "source del_userUnix.sh"; }

#Mail - Gestion des utilisateurs
function add_userMail { eval "source add_userMail.sh"; }
function del_userMail { eval "source del_userMail.sh"; }

#Mail - Gestion des alias

function add_projectAlias() { eval "source add_projectAlias.sh"; }
function add_userAlias() { eval "source add_userAlias.sh"; }
function del_projectAlias() { eval "source del_projectAlias.sh"; }
function del_userAlias() { eval "source del_userAlias.sh"; }

#Virtualhost - Apache - Gestion des sites Web
function add_vhost() { eval "source add_vhost.sh"; }
function del_vhost() { eval "source del_vhost.sh"; }
function disable_vhost() { eval "source disable_vhost.sh"; }
function enable_vhost() { eval "source enable_vhost.sh"; }

#DNS - TinyDNS - Gestion des sites Web
function add_dns() { eval "source add_dns.sh"; }
function del_dns() { eval "source del_dns.sh"; }

#Blog - Dotclear 
function add_blog() { eval "source add_blog.sh"; }
function del_blog() { eval "source del_blog.sh"; }

#Le menu du script master - Explique comment utiliser le script
function master_menu() { eval "source master_menu.sh"; }

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

				*) master_menu ;;
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
						
						*) master_menu ;;
					esac
				;;

				alias) # GESTION DES ALIAS SUR LES UTILISATEURS DU PROJET
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
						*) master_menu ;;
					esac
				;;
		
				*) master_menu ;;
			esac
		;;
			
		*) master_menu ;;
	esac
exit
