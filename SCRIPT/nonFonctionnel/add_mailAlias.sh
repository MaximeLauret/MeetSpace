#!/bin/bash

if [ test de la présence de l alias du projet dans le fichier virtual ]
	do
		echo "contact@$project " >> /etc/postfix/virtual
		postmap /etc/postfix/virtual
		service postfix restart
fi

if [ test de la présence du mail du user dans les alias du projet ]
	do
		echo "\"$nom@meetspace.itinet.fr\";" >> /etc/postfix/virtual
		postmap /etc/postfix/virtual
		service postfix restart
fi
