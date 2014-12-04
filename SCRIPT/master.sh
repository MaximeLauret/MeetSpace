#!/bin/bash
#Script d'automatisation d'utilisateur du serveur Meetspace
#Le script prend en paramètre l'utilisateur et son mot de passe

#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction affichage du menu 
#------------------------------------------------------------------------------------------------------------------------------------------------------------

function afficher_Menu
{ 
	echo "Outils d'administration du serveur meetspace
	Utilisation: master [add/del] [project/user] [name] [password]"
}

#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction add 
#------------------------------------------------------------------------------------------------------------------------------------------------------------

function add_Mail
{ 
	#Ajout utilisateur postfix
	echo "$name@meetspace.itinet.fr $name/" >> /etc/postfix/mailboxmap
	postmap /etc/postfix/mailboxmap
	service postfix restart
	
	#Création Maildir utilisateur
	if [ ! -r /var/mail/$name ]
		then
			mkdir /var/mail/$name
			maildirmake /var/mail/$name/Maildir
			chown -R vmail:vmail /var/mail/$name
	fi

	#Création authentication IMAP
	md5password=$(userdbpw -md5 <<-EOF
		$password
		$password
	EOF
	)
	userdb "$name@meetspace.itinet.fr" set imappw=$md5password home=/var/mail/$name/ mail=/var/mail/$name uid=1006 gid=1006 
	makeuserdb
	
	#Initialisation du dossier principal de la boite mail
	telnet mail.meetspace.itinet.fr 25 <<-AUTO
	mail from:<contact@meetspace.itinet.fr>
	rcpt to:<$name@meetspace.itinet.fr>
	data
	Subject: Bienvenue sur Meetspace
	L'équipe de Meetspace vous souhaite la bienvenue sur son site.
	.
	quit
	AUTO
}

function add_Unix
{ 
	echo " Function add_Unix"
	#Script d'ajout d'un utilisateur Unix sur le serveur Meetspace

	#Ajout de l'utilisateur Unix:

	cd /var/sftp/home/
	#Chiffrage du mdp
	mkpassword=`mkpasswd $password`

	#Ajout de l'utilisateur
	useradd --home /var/sftp/home/$name --gid meetspace_user --password $mkpassword $name --shell "/bin/MySecureShell"

	#Création du répertoire personnel de l'utilisateur
	mkdir $name
	chown -R $name $name
	chgrp -R meetspace_user $name

	#Mise en place des quotas:
	setquota -u toto 300 300 0 0 -a /var/sftp/home/$name
	setquota -u toto 200 200 0 0 -a /var/mail/$name

}


function add_Web
{ 
	echo " Function add_Web"
}

function add_Share
{ 
	echo " Function add_Share"
}

function add_Pad
{ 
	echo " Function add_Pad"
}

function add_Mail
{ 
	echo " Function add_Mail"
}

function add_Vhost
{ 
	echo " Function add_Vhost"
	# add_vhost.sh
	# Create a new VHost
	# Created by Maxime LAURET (2014-11-26)

	# Creating the directory host
	mkdir -p /var/sftp/$name/www
	# According writes to the user interface
	chown -R www-data:www-data /var/sftp/$project_name/www
	# Editing the configuration file
	echo "
	<VirtualHost *:80>
	ServerName $project_name.meetspace.itinet.fr
	DocumentRoot /var/sftp/$project_name
	</VirtualHost>
	" > /etc/apache2/sites-available/$name.conf

}

function add_Dns
{ 
	cd /etc/tinydns/root/
	echo " Ajout de la ligne:"
	echo "+$NAME.meetspace.itinet.fr:88.177.168.133:86400"
	echo "+$NAME.meetspace.itinet.fr:88.177.168.133:86400" >> data
	make
}

function add_PhpMyAdmin
{ 
	echo " Function add_PhpMyAdmin"
}

#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction del 
#------------------------------------------------------------------------------------------------------------------------------------------------------------

function del_Mail
{ 
	echo " Function del_Mail"
}

function del_Unix
{ 
	echo " Function del_Unix"
	cd /var/sftp/home

	#Suppression de l'utilisateur
	userdel --force $name 

	#Suppression de son répertoire
	rm -rf $name

}

function del_Web
{ 
	echo " Function del_Web"
}

function del_Share
{ 
	echo " Function del_Share"
}

function del_Pad
{ 
	echo " Function del_Pad"
}

function del_Mail
{ 
	echo " Function del_Mail"
	#Suppression utilisateur
	#Retrait sur postfix
	sed -i "/${name}/d" /etc/postfix/mailboxmap
	postmap /etc/postfix/mailboxmap
	service postfix reload

	#Retrait sur courier-IMAP
	sed -i "/${name}/d" /etc/courier/userdb
	makeuserdb

	#Retrait du dossier mail utilisateur
	rm -r /var/mail/$name
}

function del_Vhost
{ 
	echo " Function del_Vhost"
	# del_vhost.sh
	# Delete a VHost
	# Created by Maxime LAURET (2014-12-01)


	rm /etc/apache2/sites-available/$name.conf		# Deleting the .conf file
	rm -R /var/sftp/$name;							# Deleting the directory

	service apache2 reload							# Reloading the Apache service
}

function del_Dns
{ 
	echo " Function del_Dns"
	#Fonctionelle. Le seul problème c'est que si j'add projet1 et projet10 et que je décide de del projet1. Projet 10 disparait aussi..
	cd /etc/tinydns/root/
	echo " Suppression de la ligne: $NAME"
	echo "+"$NAME".meetspace.itinet.fr:88.177.168.133:86400"
	sed -i "/${NAME}/d" data
	make
}

function del_PhpMyAdmin
{ 
	echo " Function del_PhpMyAdmin"
}


#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction main 
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


# Déclaration des variables:
#Requette= " add " ou " del "
requete=$1

#projectORuser = project ou user 
projectORuser=$2

#name= Nom d'utilisateur ou de projet
name=$3

#password= mot de passe utilisateur
password=$4

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
