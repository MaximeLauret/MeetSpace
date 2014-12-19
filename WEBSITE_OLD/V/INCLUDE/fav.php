<?php

// Dans un monde parfait on a :
// ?color=blue&tab=2; par exemple

// On a reçu une requête, connexion à la BDD
try {
$bdd = new PDO('mysql:host=localhost;dbname=notepost', 'root', '');
} catch (Exception $e) {
	die("Erreur : ".$e->getMessage());
}

// On charge notre img de favori 
if(isset($_GET["color"])) {
	switch($_GET["color"]) {
		case "blue" :	
			$img = imagecreatefrompng("../IMG/FAV/Favori_Bleu.png");
			break;
		case "yellow" :
			$img = imagecreatefrompng("../IMG/FAV/Favori_Jaune.png");
			break;
		case "orange" :
			$img = imagecreatefrompng("../IMG/FAV/Favori_Orange.png");
			break;
		case "pink" :
			$img = imagecreatefrompng("../IMG/FAV/Favori_Rose.png");
			break;
		case "pink-2" :
			$img = imagecreatefrompng("../IMG/FAV/Favori_Rose-2.png");
			break;
		case "green" :
			$img = imagecreatefrompng("../IMG/FAV/Favori_Vert.png");
			break;
		case "purple" :
			$img = imagecreatefrompng("../IMG/FAV/Favori_Violet.png");
			break;
		case "purple-2" :
			$img = imagecreatefrompng("../IMG/FAV/Favori_Violet-2.png");
			break;
		default :
			$img = imagecreatefrompng("../IMG/FAV/Favori_Bleu.png");
			break;
	}
	
} else {
	$img = imagecreatefrompng("../IMG/FAV/Favori_Bleu.png");
}

// On applique la transparence sur cette image
$noir_fond =imagecolorallocate($img, 0, 0, 0);
imagecolortransparent($img, $noir_fond);

// On vérifie si l'on a reçu un GET id_tab
if(isset($_GET["id_tab"])) {
	
	// On demande quel est le titre du tableau (vu que l'on a reçu que l'ID)
	$req = $bdd->prepare("SELECT board_name FROM boards WHERE id=:id_tab");
	$req->execute( array( "id_tab" => $_GET["id_tab"] ) );
	// On fetch la réponse, et on affiche le résultat
	$response=$req->fetch();
	// On test si le fichier n'est pas vide, si il l'est on ajoute donc le titre
	if( !empty($response["board_name"] ) ) {
		// On coupe le titre et on ecrit sur l'image
		$titre = substr($response["board_name"], 0, 15);
		if(strlen($titre) > 15) {
			$titre = $titre."...";
		} else {
			// RIEN
		}
		$noir_ecriture = imagecolorallocate($img, 1, 1, 1);
		imagestringup($img, 5, 50 ,170, $titre, $noir_ecriture);
	} else {
		// RIEN
	}
	$req->closeCursor();
	
} else {
	// RIEN
}

// Finis on envoi :D
header("Content-type: image/png");
imagepng($img);
?>