<!--
index.php
Controller for the index
Created by Max (2014-12-22)
-->


<?php include_once ("./sessionStatus.php"); /* On test si l'utilisateur est connecté*/ ?>


	
<?php
	/* Si il est connecté on rentre ici */
	
	if (!isset($_GET))
	{
		switch ($$_GET['choix']):
			case "user":
				echo "i equals 0";
				break;
			case "project":
				echo "i equals 1";
				break;
			default:
				include_once ("./C_myprojects.php");
		endswitch;
	}
	include_once ("./C_myprojects.php");

?>
