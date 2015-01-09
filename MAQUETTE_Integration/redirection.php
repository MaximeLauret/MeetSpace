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
		include ("C_myprojects.php");
	} else {
		include ("index.php");
		echo ("Erreur : la connexion n'a pas pu être établie");
	}

?>
