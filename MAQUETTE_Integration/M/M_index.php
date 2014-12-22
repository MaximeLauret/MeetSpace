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

function connect_user($database, $entered_login, $entered_password) {		// Connecting the user & returning any error
	$req = $database->prepare('SELECT id FROM users WHERE nickname LIKE :login');
	$req->execute(array("login" => $entered_login));
	$line = $req->fetch();
	$id = $line['id'];
	$req->closeCursor();
	$_SESSION['user'] = $line['id'];
	return "OK";
}

function valid_password($database, $nickname_login_input, $password_login_input_encrypted) {		// Checking if the password matches with the database
	$req = $database->prepare("SELECT PASSWORD FROM users WHERE nickname LIKE :login");
	$req->execute( array("login" => $entered_login) );
	$line = $req->fetch();

	$req->closeCursor();
	
	if (password_verify ($entered_password, PASSWORD_DEFAULT)) {
		return true;
	} else {
		return false;
	}
}

?>
