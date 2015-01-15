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
		
		$testApache = shell_exec('whoami');
		echo "WHOAMI :<pre>$testApache</pre>";
		
		if($testApache==="www-data")
		{
			echo "<pre>$output</pre>";
			// AJOUT DE L'UTILISATEUR SUR LE SERVEUR
				// EN TANT QU'UTILISATEUR UNIX
			$output = shell_exec('sudo /home/GIT_REPOSITORY/SCRIPT/fonctionnel/add_userUnix.sh $nickname_signin_input, $password_signin_input');
			echo "<pre>$output</pre>";
				// EN TANT QU'UTILISATEUR MAIL
			$output = shell_exec('sudo /home/GIT_REPOSITORY/SCRIPT/fonctionnel/add_userMail.sh $nickname_signin_input, $password_signin_input ');
			echo "<pre>$output</pre>";
				// EN TANT QU'UTILISATEUR CHAT
			$output = shell_exec('sudo /home/GIT_REPOSITORY/SCRIPT/fonctionnel/add_userChat.sh $nickname_signin_input, $password_signin_input');
			echo "<pre>$output</pre>";
		}

				
		echo ("Votre compte a bien été créé");
	} else {
		echo ("Erreur : votre compte n'a pas pu être créé");
	}
}

function connect_user($database, $nickname_login_input, $password_login_input) {		// CONNEXION


	// Vérification des identifiants
	$req = $database->prepare('SELECT id FROM USERS WHERE NICKNAME = :pseudo AND PASSWORD = :pass');
	$req->execute(array(
		'pseudo' => $nickname_login_input,
		'pass' => $password_login_input));

	$resultat = $req->fetch();

	if (!$resultat)
	{
		echo 'Mauvais identifiant ou mot de passe !';
	}
	else
	{
		session_start();
		$_SESSION['ID'] = $resultat['id'];
		$_SESSION['USER'] = $nickname_login_input;
		$_SESSION['PASSWORD'] = $password_login_input;
		echo 'Vous êtes connecté !';
	}
}

?>
