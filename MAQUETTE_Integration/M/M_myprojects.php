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

/*function log_owncloud_database () {		// Logging into the OwnCloud database
	try {	
		$owncloud_database = new PDO('mysql:host=localhost;dbname=SHARE', 'meetspace', 'meetspace');
	} catch (Exception $e) {
		die("Error : ".$e->getMessage());
	}
	return $owncloud_database;
}*/

function get_user_name ($database) {		// Get the username from the session ID
	$request = $database -> prepare ("SELECT NICKNAME FROM USERS WHERE ID LIKE :session_id");
	$request -> execute (array ("session_id" => $_SESSION["USER"]));
	$line = $request -> fetch ();
	$session_nickname = $line["NICKNAME"];
	$request -> closeCursor();
	return $session_nickname;
}

function create_new_project ($database, /*$owncloud_database, */$project_name_input, $project_description_input, $project_creator) {		// Create a new project
	
	// Creating the new project in the MeetSpace database
		$request = $database -> prepare ("INSERT INTO PROJECTS (NAME, PROJECT_DESCRIPTION) VALUES (:project_name_input, :project_description_input)");
		$request -> execute (array (
		"project_name_input" => $project_name_input,
		"project_description_input" => $project_description_input));
		$request -> closeCursor();
		
	// Adding the author of the project to the collaborators
	
		get_user_name ($database);
		$request = $database -> prepare ("INSERT INTO SUBSCRIBE (USER, PROJECT, STATUS, AUTHOR) VALUES (:user, :project, MANAGER, 1)");
		$request -> execute (array (
		"user" => $session_nickname,
		"project" => $project_name_input));
		$request -> closeCursor();
		
	// Creating a shared repository between the collaborators
	
	
	// Creating the chatroom for the collaborators


}

?>
