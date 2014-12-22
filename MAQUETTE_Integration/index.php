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
	
	// INSCRIPTION
		if(isset($_POST['signin']) AND isset($_POST['nickname_signin_input']) AND isset($_POST['password_signin_input'])) {
			$message = register_user($database, $_POST['nickname_signin_input'], $_POST['mail_input'], $_POST['password_signin_input'], $_POST['password_confirmation_input']);
			echo ("Votre compte a bien été créé.");
			exec("/home/GIT_REPOSITORY/SCRIPT/fonctionnel/master.sh user add ".$_POST['nickname_signin_input']." ".$_POST['password_signin_input']);
		} else {
			// Nothing
		}
	
	// CONNEXION
		if(isset($_POST['login']) AND isset($_POST['nickname_login_input']) AND isset($_POST['password_login_input_encrypted'])) {
			$message = connect_user($bdd, $_POST['nickname_c'], $_POST['pwd_c']);
		} else {
			// RIEN
		}

?>
	
<?php
	include ("V/V_index.php");
?>
