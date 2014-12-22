<!--
C_create_post.php
Create a post (Thank you, Captain Obvious)
Auteur : Max (2014-04-16)
-->


<?php				// Starting the session

	if (!isset ($_session_start_check)) {
		session_start();
		$session_start_check = true;
	}
	
?>

<?php				// Including the model

	include ("./M/M_create_post.php");
	
?>

<?php				// CONTROLER

	$bdd = connexion();
	
	$board_list = get_boards($bdd, $_SESSION["user"]);
		
	if (isset ($_POST["POST"])) {
		$board_id = get_board_id($bdd);
		$create_post = create_post($bdd, $board_id);
		$returning = 1;
	}

?>

		
<?php				// Including the View
		
	include("./V/V_create_post.php");
			
?>