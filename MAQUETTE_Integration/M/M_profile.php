<!--
M_profile.php
Model for the profile page
Created by Maxime (2015-07-01)
-->


<?php

	function log_database () {		// CONNEXION À LA BASE DE DONNÉES	
		try {	
			$database = new PDO('mysql:host=localhost;dbname=meetspace', 'meetspace', 'meetspace');
		} catch (Exception $e) {
			die("Error : ".$e->getMessage());
		}
		return $database;
	}
	
	function get_user_name ($database) {		// Getting the user name from the database
		$request = $database -> prepare ("SELECT NICKNAME FROM USERS WHERE ID LIKE :user_id");
		$request -> execute (array(
		"user_id" => $_SESSION["USER"]));
		$line = $request -> fetch ();
		$request -> closeCursor();
		return $line["NICKNAME"];
	}
	
	function get_profile_description ($database) {		// Getting the user's profile description
		$request = $database -> prepare ("SELECT PROFILE_DESCRIPTION FROM USERS WHERE ID LIKE :user_id");
		$request -> execute (array(
		"user_id" => $_SESSION["USER"]));
		$request -> closeCursor();
	}
	
	/*function get_profile_picture ($database) {		// GETTING THE PROFILE PICTURE FROM THE DATABASE
		$request = $database -> prepare ("SELECT PROFILE_PICTURE FROM USERS WHERE ID LIKE :user_id");
		$request -> execute (array (
		"user_id" => $_SESSION["ID"]));
		$request -> closeCursor();
		return $user_profile_picture;
	}*/

?>
