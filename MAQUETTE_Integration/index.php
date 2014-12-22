<!--
index.php
Controller for the index
Created by Max (2014-12-22)
-->

<?php
	session_start();
?>
	
<?php
	include ("M/M_index.php");
?>
	
<?php

	$database = log_database();		// Connexion à la base de données
	
	if(isset($_POST['signin']) AND isset($_POST['nickname_signin_input']) AND isset($_POST['password_signin_input'])) {		// Sign in
		$message = register_user($database, $_POST['nickname_signin_input'], $_POST['mail_input'], $_POST['password_signin_input'], $_POST['password_confirmation_input']);
		echo ("Votre compte a bien été créé.");
	} else {
		// Nothing
	}

?>
	
<?php
	include ("V/V_index.php");
?>
