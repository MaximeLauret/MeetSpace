<!--
C_logout.php
Controller for the log out function
Created by Max (2015-01-07)
-->

<?php
	if (!isset($_SESSION)) { session_start(); }
?>

<?php
	include("M/M_logout.php");				// Including the Model
?>

<?php

	// Suppression des variables de session et de la session
	$_SESSION = array();
	session_destroy();

	//Et on recharge l'index
	header("Location: ./index.php");
?>

<?php
	include("./V/V_logout.php");		// Including the View
?>
