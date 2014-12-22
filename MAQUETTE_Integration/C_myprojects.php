<!--
C_myprojects.php
Controller for the projects page
Created by Max (2014-12-22)
-->

<?php
	session_start();
?>
	
<?php
	include ("M/M_myprojects.php");
?>

<?php

	$database = log_database();		// Connexion à la base de données

?>
	
<?php
	include ("V/V_myprojects.php");
?>
