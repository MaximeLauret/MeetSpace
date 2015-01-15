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
	
	// NEW PROJECT
		if (isset ($_POST["create_project"])) {
			if (isset ($_POST["project_name_input"]) AND isset ($_POST["project_description_input"])) {
				create_new_project ($database, /*$owncloud_database, */$_POST["project_name_input"], $_POST["project_description_input"], $_SESSION["USER"]);
				echo ("Le projet a bien été créé<br/>");
			} else {
				echo ("Erreur : le projet n'a pas pu être créé");
			}
		}

?>
	
<?php
	include ("V/V_myprojects.php");
?>
