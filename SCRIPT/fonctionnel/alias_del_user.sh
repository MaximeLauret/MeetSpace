#!/bin/bash

function alias_del_user
{

	#Recherche de la ligne du projet avec placement dans un fichier et suppression dans le fichier alias le temps des modifications
	var=`grep "contact@$projectName" /etc/postfix/virtual`

	sed -i "/${var}/d" /etc/postfix/virtual
	echo "$var" > /etc/postfix/var.txt


	#Test de la précense de la personne dans la ligne du projet et suppression si présent
	if [[ $var = *$userName* ]]
	then
			sed -i "s/\"${userName}@meetspace.itinet.fr\";//" /etc/postfix/var.txt
			var=$(</etc/postfix/var.txt)
			echo "$var" >> /etc/postfix/virtual
	fi

	#Compilation du fichier d'alias et redémarrage de postfix
	postmap /etc/postfix/virtual
	service postfix restart
}