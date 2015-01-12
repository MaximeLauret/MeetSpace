<!--
redirection.php
Redirects the user to the home page if everything's OK or back to the index if a problem occurs
Created by Maxime (2015-01-09)
-->


<?php

	if ($session_started = false) {
		session_start();
		$session_started = true;
	}

	if ($connected = true) {
		echo ("<meta http-equiv='Refresh' content='0; url = C_myprojects.php'/>");
	} else {
		echo ("<meta http-equiv='Refresh' content='0; url = index.php'/>");
		echo ("Erreur : la connexion n'a pas pu être établie");
	}

?>
