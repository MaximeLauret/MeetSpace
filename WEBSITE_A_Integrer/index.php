<!--
C_home_page.php
Controler for the home page
Created by Maxime (2014-10-24)
-->

<?php
	session_start();
?>

<?php		// Including the model
	include("M/M_index.php");
?>

<?php

	$database = log_database();

	if(isset($_POST['register']) AND isset($_POST['nickname_r']) AND isset($_POST['pwd_r'])) {		// If the user tries to sign in

		if(tests_special_chars($_POST['nickname_r']) != true) {		// Checking if everything is alright
			$message = "Error : unallowed characters.";
		} else {		// If everything is alright : signing the user in
			$message = register_user($database, $_POST['nickname_r'], $_POST['pwd_r']);
		}
	}	

	if(isset($_POST['signin']) AND isset($_POST['nickname_c']) AND isset($_POST['pwd_c'])) {		// If the user tries to log in
		$message = connect_user($database, $_POST['nickname_c'], $_POST['pwd_c']);
	} else {
		// Nothing
	}

?>

<?php		// Including the view
	include("V/V_index.php");
?>
