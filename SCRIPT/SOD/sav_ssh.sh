#!/bin/bash

function connection_ssh
{
	/usr/bin/expect<<EOD > output.log
	spawn /usr/bin/sftp -o Port=$PORT $USER@$HOST
	expect "password:"
	send "$PASSWORD\r"
	expect "sftp>"
	send "put $SOURCE_FILE $TARGET_DIR\r"
	expect "sftp>"
	send "bye\r"
	EOD
	RC=$?
	
	œif [[ ${RC} -ne 0 ]]; then
  		cat output.log | mail -s "Errors Received" "root@meetspace.itinet.fr"
	else
		echo "Sauvegarde terminée avec succès" | mail -s "MeetSpace - Sauvegarde" "pierrick@meetspace.itinet.fr"
	fi
}
