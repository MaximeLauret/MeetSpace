<!--
M_project.php
Model for a project page
Created by Maxime (2015-01-14)
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

function get_project_infos ($database, $current_project) {		// Get the user's projects and display them
	$request = $database -> prepare ("SELECT NAME, PROJECT_DESCRIPTION FROM PROJECTS WHERE NAME LIKE :project_name_input");
	$request -> execute (array ("project_name_input" => $current_project));
	while ($line = $request -> fetch ()) {
		$project_name = $line["NAME"];
		$project_description = $line["PROJECT_DESCRIPTION"];
	}
	return $project_name;
	return $project_description;
	$request -> closeCursor();
}

function is_manager ($database) {
	$request -> prepare ("SELECT USER FROM SUBSCRIBE LEFT JOIN PROJECTS WHERE SUBSCRIBE.STATUS = 'MANAGER'");		// PROBLÈME DE SUBSCRIBE
	$request -> execute;
	$line = $request -> fetch ();
	$status = $line["STATUS"];
	return $status;
	$request -> closeCursor();
}

function join_project ($database) {		// Add the user as a contributor to the project		// AJOUTER ICI LE INSERT DE SUBSCRIBE
	$request = $database -> prepare ("INSERT INTO SUBSCRIBE (USER, PROJECT, STATUS) VALUES (:user, :project, CONTRIBUTOR)");
	$request -> execute (array (
	"user" => $session_nickname,
	"project" => $project_name));
	$request -> closeCursor();
}

function leave_project ($database) {		// Delete the user as a contributor to the project		/!\ Fonction également présente dans M_myprojects.php
	$request = $database -> prepare ("DELETE FROM SUBSCRIBE WHERE USER LIKE :user AND PROJECT LIKE :project");
	$request -> execute (array (
	"user" => $_SESSION["USER"],
	"project" => $project_name));
	$request -> closeCursor();
}

function delete_project ($database, $current_project) {		// Delete the project and the contributors
	$request = $database -> prepare ("DELETE * FROM PROJECTS WHERE NAME LIKE :project_name");		// AJOUTER ICI LE DEL DE SUBSCRIBE
	$request -> execute (array ("project_name" => $current_project));
	$request -> closeCursor();
}

?>
