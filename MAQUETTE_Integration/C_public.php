	<?php include_once ("./M/M_public.php"); /* Inclusion du modéle */?>

	
	<?php

		var_dump($_POST);
		// SIGNIN
		if (isset ($_POST['signin'])
	 	AND isset($_POST['nickname_signin_input'])
	 	AND isset($_POST['mail_signin_input'])
  		AND isset($_POST['password_signin_input'])
		AND isset($_POST['password_confirmation_input'])) {


		$result=$user->add_user ($_POST['nickname_signin_input'],
								$_POST['mail_signin_input'],
								$_POST['password_signin_input'],
								$_POST['password_confirmation_input']);	
		var_dump($_POST);
		header("Location: ./index.php");
		} else {
			// Nothing
		}
	
	// LOGIN
		if (isset ($_POST['login'])
			AND isset($_POST['nickname_login_input'])
		 	AND isset($_POST['password_login_input'])){
			
			$user->connect ($_POST['nickname_login_input'], $_POST['password_login_input']);
			header("Location: ./index.php");
			
		} else {
			// Nothing
		}

	?>
	
		
	<?php 	include_once ("./V/V_public.php"); /* Inclusion de la vue*/?>
