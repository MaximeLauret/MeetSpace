#!/bin/bash
#Pierrick VERAN
#Script permettant d'administrer le DNS tinydns du serveur Meetspace

#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction del 
#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Variable
name=$1



/bin/echo " Suppression de la ligne: $name"
/bin/echo "+"$name".meetspace.itinet.fr:88.177.168.133:86400"
/bin/sed -i "/${name}\./d" /etc/tinydns/root/data
/usr/bin/make -C /etc/tinydns/root/


exit 0