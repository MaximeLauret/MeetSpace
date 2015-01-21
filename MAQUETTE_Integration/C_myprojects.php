<!--
C_myprojects.php
Controller for the projects page
Created by Max (2014-12-22)
-->


<?php
if (!isset($_SESSION)) { session_start(); }
?>

	
<?php
	include ("M/M_myprojects.php");
?>

<?php

	$database = log_database();							// Log into the database
	
	//$owncloud_database = log_owncloud_database;		// Log into the ownCloud database

	$projects_list = get_projects ($database);
	
	// NEW PROJECT
		if (isset ($_POST["create_project"])) {
			if (isset ($_POST["project_name_input"]) AND isset ($_POST["project_description_input"])) {
				create_new_project ($database, /*$owncloud_database, */$_POST["project_name_input"], $_POST["project_description_input"], $_SESSION["USER"]);		// On crée le nouveau projet.
				$project_id_exe = get_project_id ($database, $_POST["project_name_input"]);		// On récupère l'ID du projet.
				add_author ($database, $project_id_exe);		// On ajoute l'auteur.
				echo ("Le projet a bien été créé<br/>");
				echo("<meta http-equiv='Refresh' content='0; url=C_myprojects.php'/>");
			} else {
				echo ("Erreur : le projet n'a pas pu être créé");
				echo("<meta http-equiv='Refresh' content='0; url=C_project.php?".$element['NAME']."'/>");
			}
		}

	// AFFICHER PAGE PROJET

		if (isset ($_GET["project_query"])) {
			echo("<meta http-equiv='Refresh' content='0; url=C_myprojects.php'/>");
		}

	// QUITTER UN PROJET
		if (isset ($_POST["leave_project"]) AND isset ($_POST["project_selection"])) {
			$project_id_to_leave_exe = get_project_id_to_leave ($database, $_POST["project_selection"]);		// On récupère l'id du projet.
			leave_project ($database, $project_id_to_leave_exe);		// On quitte le projet.
			echo("<meta http-equiv='Refresh' content='0; url=C_myprojects.php'/>");
		} else {
			// NOthing
		}

?>
	
<?php
	include ("V/V_myprojects.php");
?>
