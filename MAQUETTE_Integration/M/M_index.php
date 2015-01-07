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

function register_user($database, $nickname_signin_input, $mail_input, $password_signin_input, $password_confirmation_input) {		// INSCRIPTION
	if ($password_signin_input === $password_confirmation_input) {		// ON VÉRIFIE SI LE MOT DE PASSE ET LA CONFIRMATION CORRESPONDENT
		$password_signin_input_encrypted = password_hash ($password_signin_input, PASSWORD_DEFAULT). "\n";		// CHIFFREMENT DU MOT DE PASSE
		$req = $database->prepare('INSERT INTO USERS (NICKNAME, PASSWORD, MAIL) VALUES(:nickname_signin_input, :password_signin_input, :mail_input)');
		$req->execute(array(
		'nickname_signin_input' => $nickname_signin_input,
		'password_signin_input' => $password_signin_input_encrypted,
		'mail_input' => $mail_input));
		
		exec('/home/GIT_REPOSITORY/SCRIPT/fonctionnel/add_userUnix.sh $nickname_signin_input $password_signin_input');
		exec('/home/GIT_REPOSITORY/SCRIPT/fonctionnel/add_userMail.sh $nickname_signin_input $password_signin_input ');
		exec('/home/GIT_REPOSITORY/SCRIPT/fonctionnel/add_userChat.sh $nickname_signin_input $password_signin_input');
		
		echo ("Votre compte a bien été créé.");
	} else {
		echo ("Votre inscription a échoué.  Veuillez réessayer ou contacter votre administrateur système.");
	}
}

function connect_user($database, $nickname_login_input, $password_login_input) {		// CONNEXION
	
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
		$line = $req -> fetch();
		$password_database = $line["PASSWORD"];
		$req -> closeCursor();
		
		if (password_verify ($password_login_input_encrypted, $line["PASSWORD"])) {
			echo "Le mot de passe est valide";
			$password_matches = true;
		} else {
			echo "Le mot de passe est invalide";
		}

}

?>
