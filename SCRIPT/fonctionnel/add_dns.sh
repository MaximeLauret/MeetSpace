#!/bin/bash
#Pierrick VERAN
#Script permettant d'administrer le DNS tinydns du serveur Meetspace

#Variable
name=$1

#Script
/bin/echo " Ajout de la ligne:"
/bin/echo "+$name.meetspace.itinet.fr:88.177.168.133:86400"
/bin/echo "+$name.meetspace.itinet.fr:88.177.168.133:86400" >> /etc/tinydns/root/data
/usr/bin/make -C /etc/tinydns/root/

exit 0