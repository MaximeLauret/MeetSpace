<!--
C_logout.php
Controller for the log out function
Created by Max (2015-01-07)
-->


<?php
		session_start();
?>

<?php
	include("M/M_logout.php");				// Including the Model
?>

<?php

	// Suppression des variables de session et de la session
	$_SESSION = array();
	session_destroy();
	header("Location: ./index.php");
?>

<?php
	include("./V/V_logout.php");		// Including the View
?>
