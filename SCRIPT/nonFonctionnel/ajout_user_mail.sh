#!/bin/bash

while :
do
	echo "Saisir le nom de la personne à ajouter"
	read $nom

	echo "Le nom est bien : $nom ? (oui/non)"
	read $reponse

	if [$reponse = "oui" -o $reponse = "OUI"]
		then
			#Ajout utilisateur postfix
			echo "$nom"+"@meetspace.itinet.fr $nom/Maildir" > /etc/postfix/mailboxmap
			postmap mailboxmap
			service postfix restart
			
			#Création Maildir utilisateur
			mkdir /var/mail/$nom
			chown vmail:vmail /var/mail/$nom
			maildirmake /var/mail/$nom/Maildir
			
			#Création authentication IMAP
			userdb "$nom@meetspace.itinet.fr"	set home=/var/mail/$nom	uid=1006	gid=1006
			echo "Rentrer un mot de passe pour l'utilisateur"
			userdbpw -md5 | userdb "$nom@meetspace.itinet.fr" set imappw
			makeuserdb
			
		
			echo "Utilisateur ajouté"
			
			
			echo "Voulez-vous ajouter une autre personne ? (oui/non)"
			read $reponse
			if [$reponse = "non" -o $reponse = "NON"]
				then
					break
			fi
	fi
done