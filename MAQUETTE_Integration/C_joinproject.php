<!--
C_project.php
Controller for a project page
Created by Maxime (2015-01-14)
-->


<?php

if (isset($_GET['ID'])) // ET SI ON A DES PARMS DANS L'URL
		{
			$project= new Project($_GET['ID']); // Projet non initialiser.

			$project->join_project ($_SESSION["ID"], $user->get('NICKNAME)');
			
			$id=$project->get('ID');

			header("Location: ./index.php?section=project&part=project&ID=$id");
		}
		else
		{			
			header("Location: ./index.php"); // SI MAUVAIS PARAM OU PAS DE PARAM
		}
?>
