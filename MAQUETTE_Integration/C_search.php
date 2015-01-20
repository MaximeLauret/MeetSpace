<!--
C_search.php
Controller for the search tool
Created by Maxime (2015-01-07)
-->


<?php
	include_once("./M/M_search.php");	// Including the Model
?>

<?php
			
	$database = log_database();		// Logging into the database
			
	if(isset($_POST['search']) AND $_POST['keyWord'] !== "") {
		$users_results = search_user($database, $_POST['keyWord']);
		$projects_results = search_project($database, $_POST['keyWord']);
		var_dump ($users_results);
		var_dump ($projects_results);	
	} else {
		// Nothing
		}
			
?>

<?php								// Including the View
	include_once("./V/V_search.php");
?>
