<!--
M_create_post.php
Create a post
Auteur : Max (2014-05-16)
-->


<?php

	function connexion() {		// Logging into the database

		try {
			$bdd = new PDO('mysql:host=localhost;dbname=notepost', 'root', '');
		}
		catch (Exception $e) {
			die("Erreur : ".$e->getMessage());
		}
		
		return $bdd;
		
	}
	
	function get_boards ($bdd, $id) {	// Getting the subscribed boards list
	
			$tab = array();
				
			// Then getting the subscribed board list

			$response = $bdd -> prepare("SELECT board_name FROM subscribe LEFT OUTER JOIN boards ON subscribe.boards = boards.id WHERE users = :id_user");
			$zone_dyn = array("id_user" => $id);
			$response -> execute ($zone_dyn);
			
			while ($data = $response->fetch()) {
				array_push ($tab, $data["board_name"]);
			}
									
			$response -> closeCursor();
			
			return $tab;
	}
	
	function get_board_id ($bdd) {		// getting the id matching the board name

		$response = $bdd -> prepare ("SELECT id FROM boards where board_name = :board_name");
		$zone_dyn = array ("board_name" => $_POST["BOARD"]);
		$response -> execute ($zone_dyn);
		$board_id = $response -> fetch(PDO::FETCH_ASSOC);
		return $board_id["id"];

	}
	
	function create_post ($bdd, $board_id) {		// Writing the post into the database
		$response = $bdd -> prepare ("INSERT INTO POSTS VALUES ('', :nickname, :post_name, :message, :boards, '', now())");
		$response -> execute (array (
			"nickname" => $_SESSION["user"],
			"post_name" => $_POST["POST_NAME"],
			"message" => $_POST["MESSAGE"],
			"boards" => $board_id));
		$response -> closeCursor();
	}


	
?>