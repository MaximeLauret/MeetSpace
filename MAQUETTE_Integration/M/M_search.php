<!--
M_search.php
Model for the search tool
Created by Maxime (2015-01-07)
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
	
	/*
		Pour chaque fonction de recherche, on retourne un tableau contenant les ID (ID de l'user ou ID du projet).
		Ils seront traités dans le Controller puis les résultats seront affichés dans la View.
	*/
	
	function search_user ($database, $string) {		// Searching for an user
		$users_results = array();
		$i=0;
		$request = $database -> prepare("SELECT ID, NICKNAME FROM USERS WHERE NICKNAME LIKE :member_searched");
		
		$request->execute(array("member_searched" => "%$string%"));
		
		while($data = $request->fetch()) {
			$users_results[$i]['id'] = $data['ID'];
			$users_results[$i]['result'] = $data['NICKNAME'];
			$users_results[$i]["ligne"] = "<a href='./../C_profile.php'> Voir le profil </a>";
			$i++;
		}
		
		$request->closeCursor();
		return $users_results;
		
	}

	function search_project ($database, $string) {		// Searching for a project
		$array = array();
		$i=0;
		
		$request = $database->prepare('SELECT ID, NAME FROM PROJECTS WHERE NAME LIKE :name_searched');
		
		$request->execute(array("name_searched" => "%$string%"));
		
		while($data = $request->fetch()) {
			$projects_results[$i]['id'] = $data['ID'];
			$projects_results[$i]['result'] = $data['NAME'];
			$projects_results[$i]["ligne"] = "<a href='C_project.php?project=".$data["ID"]."'>Voir le tableau</a>";
			$i++;
		}
		
		$request->closeCursor();
		return $projects_results;
	}
	
?>
