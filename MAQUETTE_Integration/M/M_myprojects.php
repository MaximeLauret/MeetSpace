<!--
M_myprojects.php
Model for the projects page
Created by Maxime (2014-12-23)
-->

<?php

function log_database () {		// Logging into the database	
	try {	
		$database = new PDO('mysql:host=localhost;dbname=MEETSPACE', 'root', '');
	} catch (Exception $e) {
		die("Error : ".$e->getMessage());
	}
	return $database;
}

?>
