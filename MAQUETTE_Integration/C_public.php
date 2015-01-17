	<?php include ("./M/M_public.php"); /* Inclusion du modéle */?>
	
	<?php

	$database = log_database();		// Connexion à la base de données

	// SIGNIN
		if (isset ($_POST['signin']) AND isset($_POST['nickname_signin_input']) AND isset($_POST['password_signin_input'])) {
			register_user ($database, $_POST['nickname_signin_input'], $_POST['mail_input'], $_POST['password_signin_input'], $_POST['password_confirmation_input']);
		} else {
			// Nothing
		}
	
	// LOGIN
		if (isset ($_POST['login']) AND isset($_POST['nickname_login_input']) AND isset($_POST['password_login_input'])) {
			connect_user($database, $_POST['nickname_login_input'], $_POST['password_login_input']);
			header("Location: ./index.php");
			
		} else {
			// Nothing
		}

	?>
	
		
	<?php 	include_once ("./V/V_public.php"); /* Inclusion de la vue*/?>
