#!/bin/bash

function alias_ajout_projet
{
	#Recherche de la précense du projet dans le fichier d'alias
	grep -on "contact@$name" /etc/postfix/virtual
	retval=$?

	#Test du résultat et ajout du projet dans le fichier d'alias s'il n'est pas présent
	if [ "$retval" != 0 ]
	then
		   echo "contact@$name" >> /etc/postfix/virtual
	fi

	#Compilation du fichier d'alias et redémarrage de postfix
	postmap /etc/postfix/virtual
	service postfix restart
}