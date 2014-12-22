<!-- C creer un commentaire
Par: THIBAUD Valentin
Le: 16/04/2014-->
<?php session_start(); ?>
<!DOCTYPE html >
<html>
<body>
<?php
	include("V/include/header.php"); 
	require 'M/M_create_comment.php';
	$bdd = connexion();

//lien pour commenter entre la vue et le modele 

	// echo 'POST ID CCC: '.$_SESSION['post']."<br/>";
	// $_SESSION['post'] = $_GET['id'];	
	
	$autorisation = "denied";

	if(isset($_POST["action"])){
		switch ($_POST["action"]) {
			case "Creer" :
				creer_commentaire($bdd, $_SESSION["user"], $_POST["comment"], $_SESSION["post"]);
				$autorisation = "ok";
				break;
			
			default :
				break;
		}
		
	} else {
		// NOTHING
	}
	
	$id = $_GET['id'];
	
	if($autorisation === "ok") {
		header("refresh: 1; URL=C_lecture-post.php?id=".$id);
	} else {
		// NOTHING
	}
	
	include ("V/include/entete.php");
	require 'V/V_create_comment.php';
	include("V/include/footer.php");
?>
</body>
</html>