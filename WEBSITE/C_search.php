<!--
C_search.php
Controller for the search tool
Created by Maxime (2014-10-28)
-->

<?php
	session_start();
?>

<!DOCTYPE html>

<html>
	<body>
		<?php		// Including the Model
			include("M/M_search.php");
		?>

		<?php 		// Variables simulation
		?>

		<?php		// Main controller code
			$database = log_database();
			if(isset($_POST['go_search']) AND $_POST['look_for'] !== "") {
				if($_POST['search'] === 'users') {
					$tab = search_by_member($database, $_POST['look_for']);
				} else if($_POST['search'] === 'posts') {
					$tab = search_by_post($database, $_POST['look_for']);
				} else if($_POST['search'] === 'boards') {
					$tab = search_by_project($database, $_POST['look_for']);
				} else {
					// Nothing
				}
			} else {
				// Nothing
			}
		?>

		<?php		// Including the View
			include("V/V_search.php");
		?>

		/body>
</html>
