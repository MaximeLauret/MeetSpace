#!/bin/bash
#Script d'ajout d'un utilisateur Unix sur le serveur Meetspace

#Ajout de l'utilisateur Unix:
#Création du répertoire personnel de l'utilisateur

/bin/mkdir /var/sftp/home/$name

#Chiffrage du mdp
mkpassword=`/usr/bin/mkpasswd $password`

#Ajout de l'utilisateur
/usr/sbin/useradd --home /var/sftp/home/$name --gid meetspace_user --password $mkpassword $name --shell "/bin/MySecureShell"


#Mise en place de ses droits sur son /home
/bin/chown -R $name /var/sftp/home/$name
/bin/chgrp -R meetspace_user $name /var/sftp/home/$name

#Mise en place des quotas:
/usr/sbin/setquota -u $name 300 300 0 0 -a /var/sftp/home/$name
/usr/sbin/setquota -u $name 200 200 0 0 -a /var/mail/$name
