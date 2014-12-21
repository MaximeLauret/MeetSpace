#!/bin/bash
#Script d'automatisation de la gestion du serveur Meetspace

echo " Include: Start .."
#Unix / MySecureShell / Quota - Gestion des utilisateurs
source add_unixUser.sh
#source del_unixUser.sh

#Mail - Gestion des utilisateurs
#source add_mailUser.sh
#source del_mailUser.sh

#Mail - Gestion des alias

#source add_projectAlias.sh
#source add_userAlias.sh
#source del_projectAlias.sh
#source del_userAlias.sh

#Virtualhost - Apache - Gestion des sites Web
#source add_vhost.sh
#source del_vhost.sh
#source disable_vhost.sh
#source enable_vhost.sh

#DNS - TinyDNS - Gestion des sites Web
#source add_dns.sh
#source del_dns.sh

#Le menu du script master - Explique comment utiliser le script
#source master_menu.sh

echo " Include: .. end "
exit
