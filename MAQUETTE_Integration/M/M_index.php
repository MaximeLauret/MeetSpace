<!--
M_home_page.php
Model for the home page
Created by Maxime (2014-10-24)
-->


<?php

function log_database () {		// CONNEXION À LA BASE DE DONNÉES	
	try {	
		$database = new PDO('mysql:host=localhost;dbname=meetspace', 'meetspace', 'meetspace');
	} catch (Exception $e) {
		die("Error : ".$e->getMessage());
	}
	return $database;
}

function register_user ($database, $nickname_signin_input, $mail_input, $password_signin_input, $password_confirmation_input) {		// Signing in
	if ($password_signin_input === $password_confirmation_input) {		// Checking if the password input and the confirmation input matches
		$request = $database -> prepare ("INSERT INTO USERS (NICKNAME, PASSWORD, MAIL) VALUES(:nickname_signin_input, :password_signin_input, :mail_input)");
		$request -> execute (array (
		'nickname_signin_input' => $nickname_signin_input,
		'password_signin_input' => $password_signin_input,
		'mail_input' => $mail_input));
		$request -> closeCursor();
		echo ("Votre compte a bien été créé");
	} else {
		// Erreur : Les mots de passe ne correspondent pas
	}
}

function connect_user($database, $nickname_login_input, $password_login_input) {		// CONNEXION

	// Checking if the user exists in the database
		$user_exists = false;
		$request = $database -> prepare ('SELECT NICKNAME FROM USERS WHERE NICKNAME LIKE :nickname_login_input');
		$request -> execute (array ('nickname_login_input' => $nickname_login_input));
		$line_01 = $request -> fetch();
		$nickname_database = $line_01["NICKNAME"];
		$request -> closeCursor();
		if ($nickname_login_input === $nickname_database) {
			$user_exists = true;
		} else {
			// Nothing
		}

	// Checking if the password input matches the database password
		$password_matches = false;
		$request = $database -> prepare ("SELECT PASSWORD FROM USERS WHERE NICKNAME LIKE :nickname_login_input");
		$request -> execute (array ("nickname_login_input" => $nickname_login_input));
		$line_02 = $request -> fetch();
		$password_database = $line_02["PASSWORD"];
		$request -> closeCursor();
		if ($password_login_input === $password_database) {
			$password_matches = true;
		} else {
			// Nothing
		}
		
	// Creating the session for the user
		if ($user_exists = true && $password_matches = true) {
			$request = $database -> prepare ("SELECT ID FROM USERS WHERE NICKNAME LIKE :nickname_login_input");
			$request -> execute (array ("nickname_login_input" => $nickname_login_input));
			$line_03 = $request -> fetch();
			$id = $line_03["ID"];
			$request -> closeCursor();
			$_SESSION["USER"] = $id;
			$connected = true;
			echo ("YEAH");
		} else {
			echo ("Erreur : La connexion a échoué");
		}

}

?>
