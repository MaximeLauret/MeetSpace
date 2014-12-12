#!/bin/sh

#source sav_config.sh
#source sav_ssh.sh

echo "------------------------------------------------------";
echo "- Sauvegarde du serveur Meetspace";
echo "------------------------------------------------------";

dpkg --get-selections > /home/pierrick/liste-des-paquets

echo "Création de l'archive";

# Précisez vos répertoire à sauvegarder entre guillemets:
tar -cvzf /home/pierrick/SOD/date-`date +%Y-%m-%d-%H-%M`.tar.gz "/home/" "/var/sftp/" "/var/mail" "/var/www" "/etc/apache2" "/etc/prosody" "/etc/tinydns/root" "/etc/courier" "/etc/mysql" "/etc/phpmyadmin" " /etc/ssh/sftp_config" "/etc/postfix/"


echo "------------------------------------------------------";


echo "Vérification de l'existence de l'archive";
# On teste si l'archive a bien été créée
if [ -e /votre_support/backup.tar.gz ]
then
	echo "Votre archive a bien été créée.";
	#echo " Envoie au serveur "
	#connection_ssh
else
	echo "Il y a eu un problème lors de la création de l'archive.";
fi

echo "### Fin de la sauvegarde.  ###";
