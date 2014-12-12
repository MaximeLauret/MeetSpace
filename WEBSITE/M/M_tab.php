<!--
M_tab.php
Page principale, vu du tableau que l'on choisit
Auteur : Kev (le 7.04.14)
MaJ : 
XXX (le XX.XX.XX)
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


// Fct qui rend la liste des post sur un tableau donné
// Demande le nom du tableau
function list_post($bdd, $tab) {
	$liste_post = array();
	$i = 0;
	
	// Un requête SQL qui demande la liste de tout les post du TAB X order by ID DESC
	$request = $bdd->prepare('SELECT p.post_name, u.nickname, p.creation_date, p.id, p.color, b.board_name
										FROM boards b
										LEFT JOIN posts p ON p.boards = b.id
										LEFT JOIN users u ON u.id = p.nickname
								WHERE b.id = :tableau
								ORDER BY p.id DESC
								LIMIT 0,20;');	
	$request->execute(array("tableau" => $tab));
	
	$i=0;
	while($donnees = $request->fetch() ) {		
		// Si il y a belle est bien des infos, on met le post, sinon on ne met rien
		if(empty($donnees["id"])) {
			// RIEN
		} else {		
			$liste_post[$i]["titre_post"] = $donnees["post_name"];
			$liste_post[$i]["auteur"] = $donnees["nickname"];
			$liste_post[$i]["date"] = $donnees["creation_date"];
			$liste_post[$i]["id"] = $donnees["id"];
			$liste_post[$i]["couleur"] = $donnees["color"];
			$liste_post[$i]["titre_tableau"] = $donnees["board_name"];
		}
		$i++;
		
	}
	$request->closeCursor();
		
	return $liste_post;
}

// Fct qui fait la liste de tout les dernier post mis en ligne
// Demande l'id de l'utilisateur
function actualite($bdd, $user) {
	$liste_post = array();
	$i = 0;
	
	$reponse = $bdd->prepare('SELECT b.board_name, p.id as post_id, p.post_name, p.creation_date, u2.nickname, p.color FROM 
	users u
		LEFT OUTER JOIN subscribe s ON u.id = s.users
		LEFT OUTER JOIN boards b ON b.id = s.boards
		LEFT OUTER JOIN posts p ON p.boards = b.id 
		LEFT OUTER JOIN users u2 ON u2.id = p.nickname
	WHERE u.id = :user
	ORDER BY post_id DESC
	LIMIT 0 , 20');
	
	$reponse->execute ( array("user" => $user));
	
	while($ligne = $reponse->fetch() ) {
		// Si il y a belle est bien des infos, on met le post, sinon on ne met rien
		if(empty($ligne["post_id"])) {
			// RIEN
		} else {
			$liste_post[$i]["titre_post"] = $ligne["post_name"];
			$liste_post[$i]["auteur"] = $ligne["nickname"];
			$liste_post[$i]["date"] = $ligne["creation_date"];
			$liste_post[$i]["id"] = $ligne["post_id"];
			$liste_post[$i]["couleur"] = $ligne["color"];
			$liste_post[$i]["titre_tableau"] = $ligne["board_name"];
		}
		$i++;
		
	}
	$reponse->closeCursor();
	return $liste_post;
}


// On vérifie si le mec peut effectivement voir le tableau
function verif($bdd, $user, $tab) {
	
		$req = $bdd->prepare("SELECT *  
						FROM subscribe s JOIN boards b 
						ON s.boards = b.ID
						WHERE s.users = :user 
						AND s.boards = :tab
						OR b.public = 1;");
						
	$req->execute( array( "user"=>$user, "tab"=>$tab ) );
	$donnees = $req->fetch();
	if(empty($donnees)) {
		return false;
	} else {
		return true;
	}
	
}

// Fct qui donne la liste des 9 premiers favoris
function liste_favoris($bdd, $user) {
	// La variable que l'on va renvoyer
	$array = array();
	
	// On prepare la requête et on la lance
	$response = $bdd->prepare("SELECT boards FROM subscribe WHERE users = :id_user ORDER BY id ASC");
	$response->execute( array( "id_user" => $user ) );
	
	// On traite la réponse
	for($i=0; $i<9; $i++) {
		$ligne = $response->fetch();
		if($ligne) {
			array_push($array, $ligne["boards"]);
		} else {
			// Si il n'y a pas de réponse
			array_push($array, "#");
		}
	}
	$response->closeCursor();
	// Et c'est bon on renvoie le tableau
	return $array;
}

// Retourne uniquement le titre du tableau que l'on donne
function recup_titre_tab($bdd, $tab) {
	$req = $bdd->prepare("SELECT board_name FROM boards WHERE id = :tab");
	$req->execute( array( "tab"=>$tab ) );
	$ligne = $req->fetch();
	return $ligne["board_name"];
}

// Test pour savoir si le mec est déjà abonné :
// Paramètres : accès bdd, id du gus, id du tableau en question
// Oui -> True, Non -> False
function test_abo($bdd, $user, $tab) {
	// FCT à écrire
	$req = $bdd->prepare("SELECT * FROM subscribe WHERE users=:user AND boards=:tab");
	$req->execute( array( "user"=>$user, "tab" => $tab ) );
	
	// Test si il n'y a pas de données dans le bidule
	$reponse = $req->fetch();
	if($reponse == false) {
		return false;
	} else {
		return true;
	}
}

// Désabonne le gus au tableau mentionné
function desabonnement($bdd, $user, $tab) {
	// FCT à écrire
	$req = $bdd->prepare("DELETE FROM subscribe WHERE users=:user AND boards=:tab");
	$req->execute( array( "user"=>$user, "tab"=>$tab ) );
}

// Abonne le gus au tableau mentionné (avec uniquement droit de lecture pour le moment
function abonnement($bdd, $user, $tab) {
	// FCT à écrire
	$req = $bdd->prepare("INSERT INTO subscribe values( '', :user, :board, 'visitor' , 0)");
	$req->execute( array( "user"=>$user, "board"=>$tab ) );
}
?>