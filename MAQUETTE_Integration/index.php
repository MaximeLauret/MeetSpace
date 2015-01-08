<!--
index.php
Controller for the index
Created by Max (2014-12-22)
-->

<?php
	session_start();
	
?>
	<?php
/**
* @return bool
*/
function is_session_started() //Source: http://php.net/manual/fr/function.session-status.php
{
		if ( php_sapi_name() !== 'cli' ) {
			if ( version_compare(phpversion(), '5.4.0', '>=') ) {
				return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
			} else {
				return session_id() === '' ? FALSE : TRUE;
			}
		}
		return FALSE;
	}
	// Example
	if ( is_session_started() === FALSE ) session_start();
	echo session_id();
?>

<?php
	include ("./M/M_index.php");
?>
	
<?php

	$database = log_database();		// Connexion à la base de données
	
	// INSCRIPTION
		if(isset($_POST['signin']) AND isset($_POST['nickname_signin_input']) AND isset($_POST['password_signin_input'])) {
			$message = register_user($database, $_POST['nickname_signin_input'], $_POST['mail_input'], $_POST['password_signin_input'], $_POST['password_confirmation_input']);
		} else {
			// Nothing
		}
	
	// CONNEXION
		if(isset($_POST['login']) AND isset($_POST['nickname_login_input']) AND isset($_POST['password_login_input'])) {
			$message = connect_user($database, $_POST['nickname_login_input'], $_POST['password_login_input']);
		} else {
			// Non
			echo "TEST";
		}

?>
	
<?php
	include ("./V/V_index.php");
?>
