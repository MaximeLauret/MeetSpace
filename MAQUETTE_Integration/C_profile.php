<!--
C_profile.php
Controller for the profile page
Created by Maxime (2015-07-01)
-->


<?php
	session_start();
?>

<?php
	include ("M/M_profile.php");		// Including the Model
?>

<?php

	$database = log_database();		// Logging into the database
	
	//$get_profile_picture = get_profile_picture ($database);
	
	if (isset ($user_profile_picture)) {		// Checking if the user set a profile picture.
		$profile_picture = $user_profile_picture;		// If so, showing it.
	} else {
		$profile_picture = "<img src = 'INCLUDE/IMG/default_profile_picture.png' class = 'img-thumbnail'>";		// Otherwise, displaying the default profile picture
	}
	
	$profile_name = get_user_name ($database);
	
	$profile_description = get_profile_description ($database);

?>

<?php
	include ("V/V_profile.php");
?>
