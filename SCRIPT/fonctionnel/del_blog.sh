#!/bin/bash
#Pierrick VERAN
#Script permettant de supprimer le blog d'un projet
#Variables
name=$1

#Script

if (($#=="1"));then
	/bin/rm -R /var/sftp/$name/www/*
else
	echo " del_blog: Nombre de paramètres invalide "
fi