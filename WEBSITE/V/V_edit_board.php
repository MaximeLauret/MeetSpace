<!--
V_modele.php
fichier vue modèle
Auteur : Kev (le 7.04.14)
MaJ : 
XXX (le XX.XX.XX)
-->
<!DOCTYPE html>
<html>
<?php include("V/INCLUDE/header.php"); ?>
<body>
<?php include ("V/INCLUDE/entete.php"); ?>

<?php
// Titre du tableau 
echo("<h1>".$titre_tab."</h1>");

// On affiche la liste des abonnés, et on propose de mettre un nouveau statu
echo("<h1>Panneau de modération</h1>");
$i=0;
for( $i=0; isset($liste_abonne[$i]); $i++) {
	// On détermine le statut du gars
	$selected=array();
	if($liste_abonne[$i]["user_permission"] == "visitor") {
		array_push($selected, "selected");
	} else {
		array_push($selected, "");
	}
	if($liste_abonne[$i]["user_permission"] == "writer") {
		array_push($selected, "selected");
	} else {
		array_push($selected, "");
	}
	if($liste_abonne[$i]["user_permission"] == "moderator") {
		array_push($selected, "selected");
	} else {
		array_push($selected, "");
	}
	if($liste_abonne[$i]["user_permission"] == "admin") {
		array_push($selected, "selected");
	} else {
		array_push($selected, "");
	}
	

	// On affiche le petit formulaire OTD
	echo("<p>".$liste_abonne[$i]["user_pseudo"]."</p>
		<form action='#' method='POST'>
		<select name='action'>
		<option value='visitor' ".$selected[0].">Visitor OTD</option>
		<option value='writer' ".$selected[1].">Ecrivator</option>
		<option value='moderator' ".$selected[2].">Moderateur</option>
		<option value='admin' ".$selected[3].">Admin</option>
		<option value='delete'>Supprimer</option>
		</select>
		<input type='hidden' name='sub_id' value='".$liste_abonne[$i]["sub_id"]."'/>
		<input type='submit' name='Modif_Board' value='Envoyer'/>
		</form>");
}

echo("<br/><br/>");
// On affiche le select pour proposer d'ajouter des gens au tableau
echo("<h1>Ajouter des gens</h1>");
echo("<form action='#' method='POST'>");
echo("<select name='people[]' multiple size='10'>");
$i=0;
// Gestion des gars non abonné
for( $i=0; isset($liste_contact[$i]) ; $i++) {
	if(!$liste_contact[$i]["abo"]) {
		echo("<option value='".$liste_contact[$i]["contact_id"]."'>".$liste_contact[$i]["contact_nickname"]."</option>");
	} else {
		// RIEN
	}
}
echo("</select>");
echo("<input type='submit' name='add' value='Inviter'/>");
echo("</form>");


?>

<?php include("V/INCLUDE/footer.php"); ?>
</body>
</html>