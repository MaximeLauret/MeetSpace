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
echo `			/bin/mkdir /var/sftp/home/$name ` >> logFile.txt

			#Chiffrage du mdp
echo `			mkpassword=`/usr/bin/mkpasswd $password` ` >> logFile.txt

			#Ajout de l'utilisateur
echo `			/usr/sbin/useradd --home /var/sftp/home/$name --gid meetspace_user --password $mkpassword $name --shell "/bin/MySecureShell" ` >> logFile.txt


			#Mise en place de ses droits sur son /home
echo `				/bin/chown -R $name /var/sftp/home/$name ` >> logFile.txt
echo `			/bin/chgrp -R meetspace_user /var/sftp/home/$name ` >> logFile.txt

			#Mise en place des quotas:
echo `				/usr/sbin/setquota -u $name 300 300 0 0 -a /var/sftp/home/$name ` >> logFile.txt
echo `				/usr/sbin/setquota -u $name 200 200 0 0 -a /var/mail/$name ` >> logFile.txt

		else
echo `				echo " add_userUnix: Nombre de paramètres invalide " ` >> logFile.txt
		fi

exit 0
