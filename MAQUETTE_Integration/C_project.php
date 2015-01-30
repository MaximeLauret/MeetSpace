<!--
C_project.php
Controller for a project page
Created by Maxime (2015-01-14)
-->


<?php

	if (isset($_GET['ID'])) // ET SI ON A DES PARMS DANS L'URL
		{
			$project= new Project($_GET['ID']); // Projet non initialiser.
			$projects_users=$project->get_subscribed_users();
			$projects_manager=$project->get_manager_list ();	
			//var_dump($projects_manager);
			//var_dump($projects_users);	
		}
		else
		{			
			header("Location: ./index.php"); // SI MAUVAIS PARAM OU PAS DE PARAM
		}
?>
	
<?php		// Including the view
	include_once ("./V/V_project.php");
?>
