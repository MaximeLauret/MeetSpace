#!/bin/bash
#Script d'ajout d'un utilisateur Unix sur le serveur Meetspace

function del_userUnix
{ 
	cd /var/sftp/home

	#Suppression de l'utilisateur
	userdel --force $name 

	#Suppression de son répertoire
	rm -rf $name
}
