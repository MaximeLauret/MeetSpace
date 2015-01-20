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

function get_projects ($database) {		// Get the user's projects and display them
	$request = $database -> prepare ("SELECT NAME, PROJECT_DESCRIPTION FROM PROJECTS LEFT JOIN SUBSCRIBE WHERE SUBSCRIBE.USER LIKE :session_id");
	$request -> execute (array ("session_id" => $_SESSION["USER"]));
	$line = $request -> fetch ();
	$project_name = $line["PROJECT"];
	$request -> closeCursor();
	return $project_name;
}

function create_new_project ($database, /*$owncloud_database, */$project_name_input, $project_description_input, $project_creator) {		// Create a new project
	// Creating the new project in the MeetSpace database
		$request = $database -> prepare ("INSERT INTO PROJECTS (NAME, PROJECT_DESCRIPTION) VALUES (:project_name_input, :project_description_input)");
		$request -> execute (array (
		"project_name_input" => $project_name_input,
		"project_description_input" => $project_description_input));
		$request -> closeCursor();
		
	// Adding the author of the project to the collaborators

		$request = $database -> prepare ("INSERT INTO SUBSCRIBE (USER, PROJECT, STATUS, AUTHOR) VALUES (:user, :project, MANAGER, 1)");
		$request -> execute (array (
		"user" => $_SESSION["USER"],
		"project" => $project_name_input));
		$request -> closeCursor();
		
	// Creating a shared repository between the collaborators
	
	
	// Creating the chatroom for the collaborators
}

function leave_project ($database) {		// Delete the user as a contributor to the project		/!\ Fonction également présente dans M_project.php
	$request = $database -> prepare ("DELETE FROM SUBSCRIBE WHERE USER LIKE :user AND PROJECT LIKE :project");
	$request -> execute (array (
	"user" => $_SESSION["USER"],
	"project" => $project_name));
	$request -> closeCursor();
}

/*function delete_project ($database) {
	$request = $database -> prepare ("DELETE FROM PROJECTS WHERE USER LIKE :session_id");
	$request -> execute (array ("session_id" =>
}*/

?>
