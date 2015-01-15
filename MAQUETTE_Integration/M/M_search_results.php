<!--
M_search_results.php
Model for the search results page
Created by Maxime (2015-07-01)
-->


<?php

	function log_database () {		// Logging into the database	
		try {	
		$database = new PDO('mysql:host=localhost;dbname=meetspace', 'meetspace', 'meetspace');
		} catch (Exception $e) {
			die("Error : ".$e->getMessage());
		}
		return $database;
	}
	
	function get_keyword () {		// Get the keyword searched
	
	}



?>
