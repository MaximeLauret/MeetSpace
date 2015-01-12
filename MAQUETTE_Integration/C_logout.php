<!--
C_logout.php
Controller for the log out function
Created by Max (2015-01-07)
-->


<?php

	if ($session_started = false) {
		session_start();
		$session_started = true;
	}

?>

<?php
	include("M/M_logout.php");				// Including the Model
?>

<?php
	if(isset($_POST["logout"])) {			// Checking if we have a POST
		$auto_refresh = logout();
	} else {	
		// Nothing
	}
?>

<?php
	include("V/INCLUDE/V_logout.php");		// Including the View
?>
