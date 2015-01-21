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

	$project_name = get_project_name ($database, $_GET["id"]);		// Récupération du nom du projet

	$project_description = get_project_description ($database, $_GET["id"]);		// Récupération de la description du projet

	$project_users_ids = get_subscribed_users ($database, $_GET["id"]);		// Récupération de la liste des membres abonnés au projet
	foreach ($project_users_ids as $element) {
		$element["USER"];
		$projects_users_names = get_subscribed_users_names ($database, $element["USER"]);
	}
	
	
	if (isset ($_POST["join_project"])) {
		join_project ($database, $_GET["id"]);
		echo ("Vous contribuez désormais au projet !<br/>");
		} else {
			// Nothing
		}

	if (isset ($_POST["leave_project"])) {
		leave_project ($database, $_GET["id"]);
		echo ("Vous ne contribuez désormais plus au projet.");
	} else {
		// Nothing
	}
	
	//is_manager ($database);

	if (isset ($_POST["delete_project"])) {
		delete_project ($database, $current_project);
		echo ("Le projet a bien été supprimé.");
	} else {
		// Nothing
	}


?>
	
<?php		// Including the view
	include ("V/V_project.php");
?>
