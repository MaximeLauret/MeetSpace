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
	echo " Function add_Mail"

	#Ajout utilisateur postfix
	echo "$name@meetspace.itinet.fr $name/" >> /etc/postfix/mailboxmap
	postmap /etc/postfix/mailboxmap
	service postfix restart
	
	#Création Maildir utilisateur
	if [ ! -r /var/mail/$name ]
		then
			mkdir /var/mail/$name
			chown vmail:vmail /var/mail/$name
			maildirmake /var/mail/$name/Maildir
			chown vmail:vmail /var/mail/$name/Maildir
	fi

	#Création authentication IMAP
	userdb "$name@meetspace.itinet.fr" set imappw=$password home=/var/mail/$name/ mail=/var/mail/$name uid=1006 gid=1006
	makeuserdb

}

function add_Unix
{ 
	echo " Function add_Unix"
}

function add_MySecureShell
{ 
	echo " Function add_MySecureShell"
}

function add_Quota
{ 
	echo " Function add_Quota"
}

function add_Sudoers
{ 
	echo " Function add_Sudoers"
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
}

function add_Dns
{ 
	echo " Function add_Dns"
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
}

function del_MySecureShell
{ 
	echo " Function del_MySecureShell"
}

function del_Quota
{ 
	echo " Function del_Quota"
}

function del_Sudoers
{ 
	echo " Function del_Sudoers"
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
}

function del_Vhost
{ 
	echo " Function del_Vhost"
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
name=$3
password=$4

#Si il y a bien 4 paramètre en entré
if [ $# = 4 ]
then

	case $requete in
		add)
		case $projectORuser in

			user) 
				add_Unix
				add_MySecureShell
				add_Quota
				add_Sudoers
				add_Share
				#add_Mail
			;;

			project) 
				add_Web
				add_Share #Cette fonction doit créé un rep partager entre tous les membres du projet
				add_Pad
				add_Mail #Cette fonction devra créé un mail avec un alias à tous les membres du projet
				add_Vhost #La fonction Vhost devra pouvoir faire apparaitre ou disparaitre le blog en fonction du choix du chef de projet
				add_Dns
				add_PhpMyAdmin

			;;

			*) afficher_Menu
		esac	
		;;

		del)
		case $projectORuser in
			user)
				add_Unix
				add_MySecureShell
				add_Quota
				add_Sudoers
				add_Share
				add_Mail
			;;

			project)
				add_Web
				add_Share
				add_Pad
				add_Mail
				add_Vhost
				add_Dns
				add_PhpMyAdmin
			;;

			*) afficher_Menu
		esac
	 	;;

		*) afficher_Menu
	esac

else
	afficher_Menu
fi 
