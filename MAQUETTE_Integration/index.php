<!--
index.php
Controller for the index
Created by Max (2014-12-22)
-->


<?php

	if ($session_started = false) {
		session_start();
		$session_started = true;
	}

?>

<?php
	include ("./M/M_index.php");
?>
	
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
		} else {
			// Nothing
		}

?>
	
<?php
	include ("./V/V_index.php");
?>
