<!--
C_search.php
Controller for the search tool
Created by Maxime (2015-01-07)
-->

<?php
	session_start();
?>

<?php
	include("./M/M_search.php");	// Including the Model
?>

<?php
			
	$database = log_database();		// Logging into the database
			
	if(isset($_POST['search']) AND $_POST['aim'] !== "") {
		$users_results = search_user($database, $_POST['aim']);
		$projects_results = search_project($database, $_POST['aim']);
	} else {
		// Nothing
		}
			
?>

<?php								// Including the View
	include("./V/V_search.php");
?>
