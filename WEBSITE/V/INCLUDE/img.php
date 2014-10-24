<?php
// On a reçu une requête, qui demande une image selon un id
try {
$bdd = new PDO('mysql:host=localhost;dbname=notepost', 'root', '');
} catch (Exception $e) {
	die("Erreur : ".$e->getMessage());
}	
$req = $bdd->prepare("SELECT avatar FROM users WHERE id=:id_img");
$req->execute( array( "id_img" => $_GET["id_img"] ) );
// On fetch la réponse, et on affiche le résultat
$img=$req->fetch();
header("Content-type: image/png");

// On test si le fichier n'est pas vide, si il l'est, on charge le fichier de base
if(!empty($img["avatar"])) {
	// On charge l'avatar du gus
	echo($img["avatar"]);
} else {
	// On charge l'avatar de base vu que le gus n'a pas d'avatar
	// echo($img_base);
	$file=file_get_contents("./../IMG/sans_avatar.png", FILE_USE_INCLUDE_PATH) ;
	echo($file);
}
$req->closeCursor();
?>