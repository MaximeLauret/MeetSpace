<!--
C_projects.php
Controller for the main page, where the project list is.
Created by Maxime (2014-12-09)
-->

<?php						// Starting the session
	session_start();
?>

<?php						// Including the model
	include("M/M_projects.php");
?>

<?php						// Including the view
	include("V/V_projects.php");
?>

<?php

	$database = log_database();	
?>
