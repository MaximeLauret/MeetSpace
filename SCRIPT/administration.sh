#!/bin/bash
#Projet Meetspace
#Script de création


#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction affichage du menu 
#------------------------------------------------------------------------------------------------------------------------------------------------------------
function afficher_Menu
{ 
	echo "
	Outils d'administration du serveur meetspace, version 0.1
	Utilisation: meetspace
	add 



John the Ripper password cracker, version 1.8.0
Copyright (c) 1996-2013 by Solar Designer
Homepage: http://www.openwall.com/john/

Usage: john [OPTIONS] [PASSWORD-FILES]
--single                   "single crack" mode
--wordlist=FILE --stdin    wordlist mode, read words from FILE or stdin
--rules                    enable word mangling rules for wordlist mode
--incremental[=MODE]       "incremental" mode [using section MODE]
--external=MODE            external mode or word filter
--stdout[=LENGTH]          just output candidate passwords [cut at LENGTH]
--restore[=NAME]           restore an interrupted session [called NAME]
--session=NAME             give a new session the NAME
--status[=NAME]            print status of a session [called NAME]
--make-charset=FILE        make a charset, FILE will be overwritten
--show                     show cracked passwords
--test[=TIME]              run tests and benchmarks for TIME seconds each
--users=[-]LOGIN|UID[,..]  [do not] load this (these) user(s) only
--groups=[-]GID[,..]       load users [not] of this (these) group(s) only
--shells=[-]SHELL[,..]     load users with[out] this (these) shell(s) only
--salts=[-]N               load salts with[out] at least N passwords only
--save-memory=LEVEL        enable memory saving, at LEVEL 1..3
--node=MIN[-MAX]/TOTAL     this node's number range out of TOTAL count
--fork=N                   fork N processes
--format=NAME              force hash type NAME: descrypt/bsdicrypt/md5crypt/
                           bcrypt/LM/AFS/tripcode/dummy/crypt

	"
}
#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction add 
#------------------------------------------------------------------------------------------------------------------------------------------------------------

function add_Mail
{ 
echo " Function add_Mail"
}

function add_Share
{
echo " Fuction add_Share"
}

function add_Vhost
{
echo " Function add_Vhost"
}

function add_Pad
{
echo " Function add_Pad"
}

function add_Mail
{ 
echo " Function add_Mail"
}

#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction del 
#------------------------------------------------------------------------------------------------------------------------------------------------------------
function del_Share
{
echo " Fuction del_Share"
}

function del_Vhost
{
echo " Function del_Vhost"
}

function del_Pad
{
echo " Function del_Pad"
}

#------------------------------------------------------------------------------------------------------------------------------------------------------------
#Fonction main 
#------------------------------------------------------------------------------------------------------------------------------------------------------------

case $1 in
	add)
		case $2 in
		mail) add_Mail;;
		share) add_Share;;
		vhost) add_Vhost;;
		pad) add_Pad;;
		*) echo " Invalide "
		esac
		
	;;

	del) 
		case $2 in
		mail) del_Mail;;
		share) del_Share;;
		vhost) del_Vhost;;
		pad) del_Pad;;
		*) echo " Invalide "
		esac
	 ;;
	*) echo " Invalide "
esac


