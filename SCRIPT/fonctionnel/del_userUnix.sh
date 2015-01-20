#!/bin/bash
#Pierrick VERAN
#Script d'ajout d'un utilisateur Unix sur le serveur Meetspace

#Variable
name=$1

#Script

if (($#=="1"));then
	#Suppression de l'utilisateur
	sudo /usr/sbin/userdel --force $name 

	#Suppression de son répertoire
	/bin/rm -rf /var/sftp/home/$name
else
	echo " del_userUnix: Nombre de paramètre invalide "
fi