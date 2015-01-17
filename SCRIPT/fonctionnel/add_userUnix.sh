#!/bin/bash
#Script d'ajout d'un utilisateur Unix sur le serveur Meetspace
#Pierrick VERAN
#Ajout de l'utilisateur Unix:

#Variables
name=$1
password=$2

#Script


if (($#=="2"));then
	#Création du répertoire personnel de l'utilisateur
	/bin/mkdir /var/sftp/home/$name

	#Chiffrage du mdp
	mkpassword=`/usr/bin/mkpasswd $password`

	#Ajout de l'utilisateur
	sudo /usr/sbin/useradd --home /var/sftp/home/$name --gid meetspace_user --password $mkpassword $name --shell "/bin/MySecureShell"


	#Mise en place de ses droits sur son /home
	/bin/chown -R $name /var/sftp/home/$name
	/bin/chgrp -R meetspace_user /var/sftp/home/$name

	#Mise en place des quotas:
	sudo /usr/sbin/setquota -u $name 300 300 0 0 -a /var/sftp/home/$name
	sudo /usr/sbin/setquota -u $name 200 200 0 0 -a /var/mail/$name
	echo " add_userUnix: Inscription OK"

else
	echo " add_userUnix: Nombre de paramètres invalide "
fi

exit 0