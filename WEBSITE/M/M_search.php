<!--
M_modele.php
fichier modèle modèle
Auteur : Kev (le 7.04.14)
MaJ : --
-->
<?php

	function connexion() {
		/* Connexion à la BDD */
		try {
		$bdd = new PDO('mysql:host=localhost;dbname=notepost', 'root', '');
		} catch (Exception $e) {
			die("Erreur : ".$e->getMessage());
		}
		
		return $bdd;
	}
	
	/* Pour chaque fonction programmée ici, on retournera un tableau contenant des ID (ID d'utilisateur, post, tableau). 
	Ils seront traités ensuite ulterieurement puis affichés dans la vue. */
	
	// recherche par membre
	function search_by_member($bdd, $chaine) {
		$tab = array();
		$i=0;
		$request = $bdd->prepare("SELECT ID, nickname
								FROM USERS 
								WHERE NICKNAME LIKE :id_membre");
		
		$request->execute(array("id_membre" => "%".$chaine."%"));
		
		while($donnees = $request->fetch()) {
			$tab[$i]['id'] = $donnees['ID'];
			$tab[$i]['resultat'] = $donnees['nickname'];
			$tab[$i]["ligne"] = "<a href='PAS ENCORE DE LIEN'>Ajouter aux contacts</a>";		// La ligne de code associé à cette recherche
			$i++;
		}
		
		$request->closeCursor();
		return $tab;
		
	}
	
	// recherche par post
	function search_by_post($bdd, $chaine) {
		$tab = array();
		$i=0;
		$request = $bdd->prepare('SELECT ID, post_name 
								FROM posts 
								WHERE post_name LIKE :id_message');
								
		$request->execute(array("id_message" => '%'.$chaine.'%'));
		
		while($donnees = $request->fetch()) {
			$tab[$i]['id'] = $donnees['ID'];
			$tab[$i]['resultat'] = $donnees['post_name'];
			$tab[$i]["ligne"] = "<a href='C_lecture-post.php?id=".$donnees["ID"].''."'>Lire</a>";		// Lien pour lire le post
			$i++;
		}
		
		$request->closeCursor();
		return $tab;
	}
	
	// recherche par tableau 
	function search_by_board($bdd, $chaine) {
		$tab = array();
		$i=0;
		
		$request = $bdd->prepare('SELECT ID, board_name 
								FROM boards 
								WHERE board_name LIKE :id_board');
		
		$request->execute(array("id_board" => "%".$chaine."%"));
		
		while($donnees = $request->fetch()) {
			$tab[$i]['id'] = $donnees['ID'];
			$tab[$i]['resultat'] = $donnees['board_name'];
			$tab[$i]["ligne"] = "<a href='C_tab.php?tab=".$donnees["ID"]."'>Voir le tableau</a>";
			$i++;
		}
		
		$request->closeCursor();
		return $tab;
	}

	
?>