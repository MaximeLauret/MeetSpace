<!--
M_projects.php
Model for the main page, where the project list is.
Created by Maxime (2014-12-09)
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

function project_list ($bdd, $array) {
	$project_name = array();
	$i = 0;
	
	$request = $database->prepare ("SELECT NAME FROM PROJECTS;");		// Get the project list from the database
	$request->execute(array("array" => $array));
	
	$i=0;
	
	while($datas = $request->fetch() ) {		// If there is any information, we show them, otherwise, we show nothing.
		if(empty($datas["id"])) {
			// RIEN
		} else {		
			$liste_post[$i]["project_name"] = $datas["project_name"];
			$liste_post[$i]["auteur"] = $datas["nickname"];
			$liste_post[$i]["date"] = $datas["creation_date"];
			$liste_post[$i]["id"] = $datas["id"];
			$liste_post[$i]["couleur"] = $datas["color"];
			$liste_post[$i]["titre_tableau"] = $datas["board_name"];
		}
		$i++;
		
	}
	$request->closeCursor();
		
	return $liste_post;
}

?>
