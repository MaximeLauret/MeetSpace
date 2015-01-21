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

function get_project_name ($database, $current_project) {		// Récupère le nom du projet pour l'affichage
	$request = $database -> prepare ("SELECT NAME FROM PROJECTS WHERE ID LIKE :project_query");
	$request -> execute (array ("project_query" => $current_project));
	$line = $request -> fetch ();
	$project_name = $line["NAME"];
	$request -> closeCursor();
	return $project_name;
}

function get_project_description ($database, $current_project) {		// Récupère la description du projet pour l'affichage
	$request = $database -> prepare ("SELECT PROJECT_DESCRIPTION FROM PROJECTS WHERE ID LIKE :project_query");
	$request -> execute (array ("project_query" => $current_project));
	$line = $request -> fetch ();
	$project_description = $line["PROJECT_DESCRIPTION"];
	$request -> closeCursor();
	return $project_description;
}

function get_subscribed_users ($database, $current_project) {		// Récupère la liste des utilisateurs abonnés au projet.
	$tab = array ();
	$request = $database -> prepare ("SELECT USER FROM SUBSCRIBE WHERE PROJECT LIKE :project_id");
	$request -> execute (array ("project_id" => $current_project));
	while ($line = $request -> fetch ()) {
		$subscribed_users = $line["USER"];
		array_push ($tab, array ("USER" => $subscribed_users));
	}
	$request -> closeCursor();
	return $tab;
}

function get_subscribed_users_names ($database, $users_ids) {		// Récupère le nom des utilisateurs abonnés à partir de leur id
	$tab = array ();
	$request = $database -> prepare ("SELECT NICKNAME FROM USERS WHERE ID LIKE :users_ids");
	$request -> execute (array ("users_ids" => $users_ids));
	while ($line = $request -> fetch ()) {
		$users_names = $line["NICKNAME"];
		array_push ($tab, array ("NICKNAME" => $users_names));
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

function join_project ($database, $current_project) {		// Add the user as a contributor to the project
	$request = $database -> prepare ("INSERT INTO SUBSCRIBE (USER, PROJECT, STATUS) VALUES (:user, :project, 'CONTRIBUTOR')");
	$request -> execute (array (
	"user" => $_SESSION["ID"],
	"project" => $current_project));
	$request -> closeCursor();
}

function leave_project ($database, $current_project) {		// Delete the user as a contributor to the project		/!\ Fonction également présente dans M_myprojects.php
	$request = $database -> prepare ("DELETE FROM SUBSCRIBE WHERE USER LIKE :user AND PROJECT LIKE :project");
	$request -> execute (array (
	"user" => $_SESSION["ID"],
	"project" => $current_project));
	$request -> closeCursor();
}

function delete_project ($database, $current_project) {		// Delete the project and the contributors
	$request = $database -> prepare ("DELETE * FROM PROJECTS WHERE NAME LIKE :project_name");		// AJOUTER ICI LE DEL DE SUBSCRIBE
	$request -> execute (array ("project_name" => $current_project));
	$request -> closeCursor();
}

?>
