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

// Fct qui rend la liste des favoris de la personne connectée
// Demande l'id de la personne
/* ##### Code à faire ##### */
function list_fav($bdd, $user) {
	$liste_fav = array();		// La variable que l'on va renvoyer
	
	// Une requete SQL par rapport à sub, order by valeur du sub, avec une limite de 0 à 10
	// Pour tous les enregistrement, faire un push nom_tab sur le tab liste_fav
	
	
	return $liste_fav;
}

// Fct qui rend la liste des post sur un tableau donné
// Demande le nom du tableau
/* #### Code à faire ##### */
function list_post($bdd, $tab) {
	$liste_post = array();
	$i = 0;
	
	
	// Un requête SQL qui demande la liste de tout les post du TAB X order by ID DESC
	$request = $bdd->prepare('SELECT post_name, message, nickname, creation_date FROM POSTS 
							JOIN boards ON boards.id = posts.boards WHERE boards.id = :tableau
							ORDER BY boards.id DESC');
	$request->execute(array("tableau" => $tab));
	
	/* /!\ WARNING /!\
	Le tableau doit être sous cette forme :
	[0][titre]
	   [contenu]
	   [auteur]
	   [tableau]
	   [date]
	   [couleur]
	[1][titre]
		etc ...
	
	Il est donc à 2 dimensions, 1ère dimension par indice, 2e par association */
	
	while($donnees = $request->fetch() AND !empty($donnees["post_name"])) {		
		$liste_post[$i]["titre"] = $donnees["post_name"];
		$liste_post[$i]["message"] = $donnees["message"];
		$liste_post[$i]["auteur"] = $donnees["nickname"];
		$liste_post[$i]["date"] = $donnees["creation_date"];
		$i++;
	}
	return $liste_post; // On retourne le tableau
}

// Fct qui fait la liste de tout les dernier post mis en ligne
// Demande l'id de l'utilisateur
/* ##### Code à faire ##### */
function actualite($bdd, $user) {
	$liste_post = array();
	
	// Petite requête SQL qui selectionne tout les post auquel le mec est abonné, order by ID DESC

	/* 
	
	/!\ WARNING /!\
	Le tableau doit être sous cette forme :
	[0][titre]
	   [contenu]
	   [auteur]
	   [tableau]
	   [date]
	   [couleur]
	[1][titre]
		etc ...
	
	Il est donc à 2 dimensions, 1ère dimension par indice, 2e par association
	
	*/
	
	return $liste_post;
}

function verif($bdd, $user, $tab) {
	
	/*
	On vérifie si le mec a belle est bien le droit de voir le tableau
	*/

	return true;
}
?>