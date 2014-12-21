#!/bin/bash
#Script d'ajout d'un utilisateur Unix sur le serveur Meetspace

function add_unixUser
{ 
	#Ajout de l'utilisateur Unix:
	#Création du répertoire personnel de l'utilisateur
	cd /var/sftp/home/
	mkdir $name

	#Chiffrage du mdp
	mkpassword=`mkpasswd $password`

	#Ajout de l'utilisateur
	useradd --home /var/sftp/home/$name --gid meetspace_user --password $mkpassword $name --shell "/bin/MySecureShell"


	#Mise en place de ses droits sur son /home
	chown -R $name $name
	chgrp -R meetspace_user $name $name

	#Mise en place des quotas:
	setquota -u toto 300 300 0 0 -a /var/sftp/home/$name
	setquota -u toto 200 200 0 0 -a /var/mail/$name
}
