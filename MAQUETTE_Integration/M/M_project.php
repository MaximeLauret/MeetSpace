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

function get_project_infos ($database, $project_input) {		// Get the user's projects and display them
	$project_input = "project_02";		// TEMP
	$request = $database -> prepare ("SELECT NAME, PROJECT_DESCRIPTION FROM PROJECTS WHERE NAME LIKE :project_name_input");
	$request -> execute (array ("project_name_input" => $project_input));
	while ($line = $request -> fetch ()) {
		$project_name = $line["NAME"];
		$project_description = $line["PROJECT_DESCRIPTION"];
	}
	$request -> closeCursor();
	return $project_name;
	return $project_description;
}


function join_project ($database) {		// Add the user as a contributor to the project
	$request = $database -> prepare ("INSERT INTO SUBSCRIBE (USER, PROJECT, STATUS) VALUES (:user, :project, CONTRIBUTOR)");
	$request -> execute (array (
	"user" => $session_nickname,
	"project" => $project_name));
	$request -> closeCursor();
}

?>
