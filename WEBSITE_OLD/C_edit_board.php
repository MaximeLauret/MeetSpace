<!--
C_modele.php
fichier contrôleur modèle
Auteur : Kev (le 7.04.14)
MaJ : 
XXX (le XX.XX.XX)
-->
<?php session_start(); ?>
<!-- Modèle -->
<?php include("M/M_edit_board.php"); ?>

<!--Contrôleur -->
<?php
$bdd = connexion();

// Si on a reçu un POST, on la regarde et on fait l'action demandé :D
if(isset($_POST["Modif_Board"])) {
	switch($_POST["action"]) {
		case "visitor":
			set_new_permission($bdd, $_POST["sub_id"], $_POST["action"]);
			break;
		case "writer" :
			set_new_permission($bdd, $_POST["sub_id"], $_POST["action"]);
			break;
		case "moderator" :
			set_new_permission($bdd, $_POST["sub_id"], $_POST["action"]);
			break;
		case "admin" :
			set_new_permission($bdd, $_POST["sub_id"], $_POST["action"]);
			break;
		case "delete" :
			delete_abo($bdd, $_POST["sub_id"]);
			break;
		default :
			break;
	}
} else if (isset($_POST["add"])) {
	// Si on nous a demandé d'ajouter des gens, on utilise la fct écrite pour ça, et on lui envoie le tableau
	// Sécu, si le gus est un filou et qu'il ne fait QUE cliquer sur le submit
	if(isset($_POST["people"])) {
		add_sub($bdd, $_POST["people"], $_GET["tab"]);
	} else {
		// RIEN
		echo("<script>alert('Nan nan jcrois pas filou !');</script>");
	}
	
} else {
	// RIEN
}



// On récupère le titre du tableau ainsi que la liste des gens qui sont abonnés au tableau
$titre_tab = get_tab_titre($bdd, $_GET["tab"]);
$liste_abonne = get_tab_abonne($bdd, $_GET["tab"]);
// On récupère également la liste de contact du gus, pour qu'il puisse ajouter des gens
$liste_contact = get_list_contact($bdd, $_SESSION["user"]);
// On rajoute le bool pour dire si le mec est déjà abonné ( avec une opération ternaire pck c'est la classe )
for($i=0; isset($liste_contact[$i]); $i++) {
	test_abo($bdd, $liste_contact[$i]["contact_id"], $_GET["tab"]) ? 	$liste_contact[$i]["abo"] = 1 : 	$liste_contact[$i]["abo"] = 0;
}


?>


<!-- Vue -->
<?php include("V/V_edit_board.php"); ?>