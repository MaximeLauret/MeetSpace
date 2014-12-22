<!--
M_home_page.php
Model for the home page
Created by Maxime (2014-10-24)
-->

<?php

function log_database () {		// Logging into the database	
	try {	
		$database = new PDO('mysql:host=localhost;dbname=MEETSPACE', 'root', '');
	} catch (Exception $e) {
		die("Error : ".$e->getMessage());
	}
	return $database;
}

function register_user($database, $nickname_signin_input, $mail_input, $password_signin_input, $password_confirmation_input) {		// Signing the user in
	if ($password_signin_input === $password_confirmation_input) {
		$password_signin_input_encrypted = password_hash ($password_signin_input, PASSWORD_DEFAULT). "\n";		// Password encryption
		$req = $database->prepare('INSERT INTO USERS (NICKNAME, PASSWORD, MAIL) VALUES(:nickname_signin_input, :password_signin_input, :mail_input)');
		$req->execute(array(
		'nickname_signin_input' => $nickname_signin_input,
		'password_signin_input' => $password_signin_input_encrypted,
		'mail_input' => $mail_input));
	} else {
		echo ("Votre inscription a échoué.  Veuillez réessayer ou contactez votre administrateur système.");
	}
}

function connect_user($database, $nickname_login_input, $password_login_input) {		// Connecting the user & returning any error
	
	// On vérifie que l'utilisateur existe dans la base de données
		$user_exists = false;
		$req = $database -> prepare ('SELECT NICKNAME FROM USERS WHERE NICKNAME LIKE :nickname_login_input');
		$req -> execute (array ('nickname_login_input' => $nickname_login_input));
		$ligne = $req -> fetch();
		$req -> closeCursor();
		
		if ($user_exists === false) {
			echo ("Cet utilisateur n'existe pas.");
		} else if ($password_matches === false) {
			echo ("Erreur de mot de passe.");
		} else {
			$req = $database -> prepare ("SELECT ID FROM USERS WHERE NICKNAME LIKE :nickname_login_input");
			$req -> execute (array ("nickname_login_input" => $nickname_login_input));
			$line = $req -> fetch();
			$id = $line["ID"];
			$req -> closeCursor();
			$_SESSION["USER"] = $line["ID"];
		}

	// On vérifie que le mot de passe entré correspond au mot de passe de la base de données.
		$password_matches = false;
		$req = $database -> prepare ("SELECT PASSWORD FROM USERS WHERE NICKNAME LIKE :nickname_login_input");
		$req -> execute (array ("nickname_login_input" => $nickname_login_input));
		$ligne = $req -> fetch();
		$req -> closeCursor();
		
		$password_login_input_encrypted = password_hash ($password_login_input, PASSWORD_DEFAULT). "\n";		// Password encryption
		if ($password_login_input_encrypted === $ligne["PASSWORD"]) {
			$password_matches = true;
		} else {
			// Rien
		}

}

?>