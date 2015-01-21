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

function log_owncloud_database () {				// Connexion à la database d'ownCloud
	try {	
		$owncloud_database = new PDO('mysql:host=localhost;dbname=SHARE', 'meetspace', 'meetspace');
	} catch (Exception $e) {
		die("Error : ".$e->getMessage());
	}
	return $owncloud_database;
}

function get_current_project () {
	$query = parse_url ($_SERVER);
	return $query;
}

function get_project_infos ($database, $current_project) {		// Get the user's projects and display them
	$tab = array ();
	$request = $database -> prepare ("SELECT NAME, PROJECT_DESCRIPTION FROM PROJECTS WHERE NAME LIKE :project_query");
	$request -> execute (array ("project_query" => $current_project));
	while ($line = $request -> fetch ()) {
		$project_name = $line["NAME"];
		$project_description = $line["PROJECT_DESCRIPTION"];
		array_push ($tab, array ("NAME" => $project_name, "PROJECT_DESCRIPTION" => $project_description));
	}
	$request -> closeCursor();
	return $tab;
}

function get_manager_list ($database, $project_name) {
	$tab = array ();
	$request = $database -> prepare ("SELECT SUBSCRIBE.USER FROM SUBSCRIBE LEFT JOIN SUBSCRIBE.PROJECTS ON PROJECTS.ID WHERE WHERE PROJECTS.NAME LIKE :project_name AND SUBSCRIBE.STATUS = 'MANAGER'");
	$request -> execute (array ("project_name" => $project_name));
	while ($line = $request -> fetch ()) {
		$project_manager_list = $line["USER"];
		array_push ($tab, array ("USER" => $project_manager_list));
	}
	$request -> closeCursor();
	return $tab;
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
