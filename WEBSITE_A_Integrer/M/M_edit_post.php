<!-- M modifier/supprimer un post-it
Par: THIBAUD Valentin
Le: 11/04/2014
Mise à jour : 19/04/2014-->
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

//modif du titre du post
function modif_title_post($bdd, $post, $new_title){
	// On recerche le tableau où il y a le post
	$req = $bdd->prepare("SELECT boards FROM posts WHERE id=:post");
	$req->execute( array( "post"=>$post ) );
	$donnee= $req->fetch();
	$board = $donnee["boards"];

	$title = exists_post_title($bdd, $new_title, $board);
	$space = no_space($bdd, $new_title);
	
	//si il y a pas de champs vide, tableau differents et titre different on ecrit
	if($space && !$title){
	$rep = $bdd->prepare("UPDATE posts 
						SET post_name = :new_title 
						WHERE ID = :post");
						
	$rep->execute( array("new_title"=> $new_title,
						"post" => $post));
	} else {
		// rien
	}
}

//modif du contenu du post
function modif_post($bdd, $post, $new_message){
	$space = no_space($bdd, $new_message);
	if($space === true){
	$rep = $bdd->prepare("UPDATE posts 
						SET message = :new_message 
						WHERE ID = :post");
						
	$rep->execute( array("new_message"=> $new_message,
						"post" => $post));
	}
}

//suppr post
function suppr_post($bdd, $post){

// on supprime les commentaires
	$rep = $bdd->prepare("DELETE FROM comments 
						WHERE posts = :post");
						
	$rep->execute( array("post" => $post));
	
	// on Supprime le post 
	$rep = $bdd->prepare("DELETE FROM posts
						WHERE ID = :post");
	
	$rep->execute( array("post" => $post));
}

//si il y a que des espaces que le contenu
function no_space($bdd, $string){
	if(trim($string)){
		return true;
	}else {
		echo'Vous n avez rien ecrit';
		return false;
	}
}

//si le titre existe deja 
function exists_post_title($bdd, $new_title, $board){		
	$reponse = $bdd->prepare('SELECT boards 
						FROM posts 
						WHERE post_name LIKE (:titre)');
						
	$reponse->execute( array("titre"=>$new_title ) );
	
	while ($donnees = $reponse->fetch()){
		
		if(isset($donnees["boards"]) AND $donnees["boards"] == $board) {
			return true;
		} else {
			// RIEN
		}
	}
	return false;
}


?> 