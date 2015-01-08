<!--
M_myprojects.php
Model for the projects page
Created by Maxime (2014-12-23)
-->


<?php

function log_database () {				// Logging into the database
	try {	
		$database = new PDO('mysql:host=localhost;dbname=meetspace', 'meetspace', 'meetspace');
	} catch (Exception $e) {
		die("Error : ".$e->getMessage());
	}
	return $database;
}

function log_owncloud_database () {		// Logging into the OwnCloud database
	try {	
		$owncloud_database = new PDO('mysql:host=localhost;dbname=SHARE', 'meetspace', 'meetspace');
	} catch (Exception $e) {
		die("Error : ".$e->getMessage());
	}
	return $owncloud_database;
}

function create_new_project ($database, /*$owncloud_database, */$project_name_input, $project_description_input) {		// Create a new project, add the users, create the shared repository, the chatroom, the shared mailbox
	// First, we create the new project in the MeetSpace database
		$request = $database -> prepare ("INSERT INTO PROJECTS (NAME, DESCRIPTION) VALUES (:project_name_input, :project_description_input)");
		$request -> execute (array (
		"project_name_input" => $project_name_input,
		"project_description_input" => $project_description_input));
	// Écrire dans la db SHARE pour créer le répertoire partagé
	// Créer chatroom entre les users
}

?>
