#!/bin/bash
#Script d'ajout d'un utilisateur Unix sur le serveur Meetspace


#Suppression de l'utilisateur
/usr/sbin/userdel --force $name 

#Suppression de son répertoire
/bin/rm -rf /var/sftp/home/$name
