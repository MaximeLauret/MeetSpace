#!/bin/bash

function alias_ajout_user
{
	#Recherche de la ligne du projet où l'on veut ajouter la personne
	var=`grep "contact@$projectName" /etc/postfix/virtual`

	#Retrait de la ligne du projet le temps de faire l'ajout de la personne
	sed -i "/${var}/d" /etc/postfix/virtual


	#Vérification de la présence ou non de la personne sur la ligne du projet
	if [[ $var != *$userName* ]]
	then
			#Détermine si il y a déjà un alias ou non sur la ligne et fait l'ajout en conséquence
			if [[ $var = *\; ]]
			then
					echo "$var\"$userName@meetspace.itinet.fr\";" >> /etc/postfix/virtual
			else
					echo "$var \"$userName@meetspace.itinet.fr\";" >> /etc/postfix/virtual
			fi
	else
			echo "$var" >> /etc/postfix/virtual
	fi

	#Compilation du fichier d'alias et redémarrage de postfix
	postmap /etc/postfix/virtual
	service postfix restart
}