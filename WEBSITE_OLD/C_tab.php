<!--
C_tab.php
Page principale, vu du tableau que l'on choisit
Auteur : Kev (le 7.04.14)
MaJ : 
XXX (le XX.XX.XX)
-->
<?php session_start(); ?>
<!-- Modèle -->
<?php include("M/M_tab.php"); ?>

<!--Contrôleur -->
<?php
$bdd = connexion();

// Si on a reçu un GET, on affiche la page demandé (si le mec à le droit)
// Sinon on affiche son "fil d'actualité"
if( isset( $_GET["tab"] ) AND verif($bdd, $_SESSION["user"], $_GET["tab"] )) {


	// On demande si le mec est déjà abo.
	// On regarde si on a déjà reçu un POST
	
	if(isset( $_POST["action"] ) ) {
		switch($_POST["action"]) {
			case "Se désabonner" :
				desabonnement($bdd, $_SESSION["user"], $_GET["tab"]);
				break;
			
			case "S'abonner" :
				abonnement($bdd, $_SESSION["user"], $_GET["tab"]);
				break;
		}
	} else {
		// RIEN
	}
	
	$abo = test_abo( $bdd, $_SESSION["user"], $_GET["tab"] );
	$post = list_post($bdd, $_GET["tab"]);
	$titre_tab = recup_titre_tab($bdd, $_GET["tab"]);
	
} else {
	
	$post = actualite($bdd, $_SESSION["user"]);
}

// Dans tout les cas, on fait la liste des favoris du gus
$liste_fav = liste_favoris($bdd, $_SESSION["user"]);
	
?>

<!-- Scripts JS -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="main.js"></script>

<!-- Vue -->
<?php include("V/V_tab.php"); ?>