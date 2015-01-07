<!--
C_logout.php
Controller for the log out function
Created by Max (2015-01-07)
-->


<?php
	session_start();
?>

<?php
	include("M/M_deconnexion.php");			// Including the Model
?>

<?php
	if(isset($_POST["deco"])) {				// Checking if we have a POST
		$auto_refresh = deconnexion();
	} else {	
		// Nothing
	}
?>

<?php
	include("V/V_deconnexion.php");			// Including the View
?>
