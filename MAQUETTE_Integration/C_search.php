<!--
C_search.php
Controller for the search tool
Created by Maxime (2015-01-07)
-->


<?php
	include_once("./M/M_search.php");	// Including the Model
?>

<?php
			
	if(isset($_POST['search']) AND $_POST['keyWord'] !== "") {

		//$users_results = search_user($_POST['keyWord']);
		//$projects_results = search_project($_POST['keyWord']);
		$users_results=$search->search_user($_POST['keyWord']);
		$users_results=$search->search_user($_POST['keyWord']);
	} else {
		// Nothing
		}
			
?>

<?php								// Including the View
	include_once("./V/V_search.php");
?>
