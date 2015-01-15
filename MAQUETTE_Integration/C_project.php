<!--
C_project.php
Controller for a project page
Created by Maxime (2015-01-14)
-->


<?php

	if ($session_started = false) {
		session_start();
		$session_started = true;
	}

?>
	
<?php
	include ("M/M_project.php");
?>

<?php

	$database = log_database();						// Log into the database
	
	if (isset ($_POST["join_project"])) {
		get_project_infos ($database);
		echo ("Vous contribuez désormais au projet !<br/>");
		} else {
			echo ("Erreur : le projet n'a pas pu être créé");
		}

?>
	
<?php
	include ("V/V_project.php");
?>
