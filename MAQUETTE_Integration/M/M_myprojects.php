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

function get_projects ($database) {		// Get the user's projects and display them
	$tab = array ();
	$request = $database -> prepare ("SELECT PROJECTS.ID, PROJECTS.NAME, PROJECTS.DESCRIPTION FROM USERS LEFT JOIN SUBSCRIBE ON SUBSCRIBE.USER = USERS.ID LEFT JOIN PROJECTS ON PROJECTS.ID = SUBSCRIBE.PROJECT WHERE USERS.ID = :session_id");
	$request -> execute (array ("session_id" => $_SESSION["ID"]));
	while ($line = $request -> fetch ()) {
		$project_id = $line["ID"];
		$project_name = $line["NAME"];
		$project_description = $line["DESCRIPTION"];
		array_push ($tab, array ("ID" => $project_id, "NAME" => $project_name, "DESCRIPTION" => $project_description));
	}
	$request -> closeCursor();
	return $tab;
}

function create_new_project ($database, $project_name_input, $project_description_input, $project_creator) {		// Create a new project
	$request = $database -> prepare ("INSERT INTO PROJECTS (NAME, DESCRIPTION) VALUES (:project_name_input, :project_description_input)");
	$request -> execute (array (
	"project_name_input" => $project_name_input,
	"project_description_input" => $project_description_input));
	$request -> closeCursor();
}

function get_project_id ($database, $project_name_input) {		// Récupère l'ID du projet afin d'ajouter l'auteur par la suite.
	$request = $database -> prepare ("SELECT ID FROM PROJECTS WHERE NAME LIKE :project_name_input");
	$request -> execute (array ("project_name_input" => $project_name_input));
	$line = $request -> fetch ();
	$project_id = $line["ID"];
	$request -> closeCursor();
	return $project_id;
}

function add_author ($database, $project_id_exe) {		// Ajoute l'auteur du projet.
	$request = $database -> prepare ("INSERT INTO SUBSCRIBE (USER, PROJECT, STATUS, AUTHOR) VALUES (:user_id, :project_id, 'MANAGER', 1)");
	$request -> execute (array (
	"user_id" => $_SESSION["ID"],
	"project_id" => $project_id_exe));
	$request -> closeCursor();
}

function get_project_id_to_leave ($database, $project_selection) {		// Récupère l'ID du projet sélectionné afin de se désabonner.
	$request = $database -> prepare ("SELECT ID FROM PROJECTS WHERE NAME LIKE :project_selection");
	$request -> execute (array ("project_selection" => $project_selection));
	$line = $request -> fetch ();
	$project_id_to_leave = $line["ID"];
	$request -> closeCursor();
	return $project_id_to_leave;
}

function leave_project ($database, $project_id_to_leave_exe) {		// Désabonne du projet précédemment sélectionné.
	$request = $database -> prepare ("DELETE FROM SUBSCRIBE WHERE USER LIKE :user_id AND PROJECT LIKE :project_id");
	$request -> execute (array (
	"user_id" => $_SESSION["ID"],
	"project_id" => $project_id_to_leave_exe));
	$request -> closeCursor();
}

?>
