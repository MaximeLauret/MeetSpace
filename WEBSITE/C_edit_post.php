<!-- C modifier/supprimer un post-it
Par: THIBAUD Valentin
Le: 11/04/2014-->
<?php session_start(); ?>

<?php

require 'M/M_edit_post.php';
$bdd = connexion();



//lien pour modifier un post entre la vue et le modele 

if(isset($_POST["action"])){
	
	switch ($_POST["action"]) {
		
		//modif contenu du post
		case "Modifier message" :
			if($_POST["new_message"] != "") {	
				modif_post($bdd, $_GET["id"], $_POST["new_message"]);
			}else {
			}
			break;
		
		//modif du titre du post
		case "Modifier titre":
			if($_POST["new_title"] != "") {
				modif_title_post($bdd, $_GET["id"], $_POST["new_title"]);
			}	else {
				// RIEN
			}
			break;
		
		//suppr du post
		case "Supprimer post" :
			suppr_post($bdd, $_GET["id"]);
			break;
		
		default :
			break;
	}
}
require 'V/V_edit_post.php';

?>
