<!--
C_project.php
Controller for a project page
Created by Maxime (2015-01-14)
-->


<?php		// Session start

	if (!isset ($_SESSION)) {
		session_start();
	}

?>
	
<?php		// Including the model
	include ("M/M_project.php");
?>

<?php

	$database = log_database();						// Logging into the database

	$current_project = "My Project";		// TEMP

	get_project_infos ($database, $current_project);
	
	if (isset ($_POST["join_project"])) {
		join_project ($database);
		echo ("Vous contribuez désormais au projet !<br/>");
		} else {
			echo ("Erreur : le projet n'a pas pu être créé");
		}

	if (isset ($_POST["leave_project"])) {
		leave_project ($database);
		echo ("Vous ne contribuez désormais plus au projet.");
	} else {
		echo ("Erreur : Vous êtes toujours contributeur");
	}
	
	is_manager ($database);

	if (isset ($_POST["delete_project"])) {
		delete_project ($database, $current_project);
		echo ("Le projet a bien été supprimé.");
	} else {
		echo ("Erreur : Le projet n'a pas pu être supprimé.");
	}

?>
	
<?php		// Including the view
	include ("V/V_project.php");
?>
