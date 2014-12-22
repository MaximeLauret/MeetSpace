<!--
M_search.php
Model for the search tool
Created by Maxime (2014-10-27)
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
	
	/* Pour chaque fonction programmée ici, on retournera un tableau contenant des ID (ID d'utilisateur, post, tableau). 
	Ils seront traités ensuite ulterieurement puis affichés dans la vue. */
	
	/* function search_by_member($database, $string) {		// Search by member
		$tab = array();
		$i=0;
		$request = $database->prepare("SELECT ID, nickname
										FROM USERS 
										WHERE NICKNAME LIKE :member_id");
		
		$request->execute(array("member_id" => "%".$string."%"));
		
		while($data = $request->fetch()) {
			$tab[$i]['id'] = $data['ID'];
			$tab[$i]['result'] = $data['nickname'];
			$tab[$i]["ligne"] = "<a href='PAS ENCORE DE LIEN'>Ajouter aux contacts</a>";		// La ligne de code associé à cette recherche
			$i++;
		}
		
		$request->closeCursor();
		return $tab;
		
	}
	
	// recherche par post
	function search_by_post($database, $string) {
		$tab = array();
		$i=0;
		$request = $database->prepare('SELECT ID, post_name 
								FROM posts 
								WHERE post_name LIKE :id_message');
								
		$request->execute(array("id_message" => '%'.$string.'%'));
		
		while($data = $request->fetch()) {
			$tab[$i]['id'] = $data['ID'];
			$tab[$i]['result'] = $data['post_name'];
			$tab[$i]["ligne"] = "<a href='C_lecture-post.php?id=".$data["ID"].''."'>Lire</a>";		// Lien pour lire le post
			$i++;
		}
		SELECT * FR
		$request->closeCursor();
		return $tab;
	} */

	function search_by_project($database, $string) {		// Search by project
		$tab = array();
		$i=0;
		
		$request = $database->prepare('SELECT ID, project_name 
								FROM projects 
								WHERE project_name LIKE :id_project');
		
		$request->execute(array("id_project" => "%".$string."%"));
		
		while($data = $request->fetch()) {
			$tab[$i]['id'] = $data['ID'];
			$tab[$i]['result'] = $data['project_name'];
			$tab[$i]["ligne"] = "<a href='C_tab.php?tab=".$data["ID"]."'>Voir le tableau</a>";
			$i++;
		}
		
		$request->closeCursor();
		return $tab;
	}

	
?>
