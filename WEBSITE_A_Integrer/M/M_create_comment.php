<!-- M creer un commentaire
Par: THIBAUD Valentin
Le: 16/04/2014-->
<?php
/* Connexion à la BDD */
function connexion(){

	try {
		$bdd = new PDO('mysql:host=localhost;dbname=notepost', 'root', '');
			
	} catch (Exception $e) {
		die("Erreur : ".$e->getMessage());
	}
	return $bdd;
}

/* Verification si on a reçu un post it*/
function creer_commentaire($bdd, $pseudo, $comment, $post) {
	// echo($pseudo." ---> pseudo<br/>");
	// echo($comment." --> commentaire<br/>");
	// echo($post." ---> id post<br/>");
	
	$space = no_space($bdd, $comment);
	
	if($space === true){
		$rep = $bdd->prepare('INSERT INTO comments VALUES ("", :pseudo, :comment, now(), :post)');
		$rep->execute ( array("pseudo" => $pseudo,
							"comment" => $comment,
							"post" => $post));
		// echo "end of if in creer_commentaire<br/>";
				
	}
	
	// echo "end of function creer_commentaire<br/>";
}

function no_space($bdd, $comment){ // code à revoir
	//$space = false;
	/* if(trim($create_board)){
		$space = true;
	} else {
		echo'problem';
	} */
	return true;
}
?> 