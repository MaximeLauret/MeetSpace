<!--
C_myprojects.php
Controller for the projects page
Created by Max (2014-12-22)
-->


<?php
if (!isset($_SESSION)) { session_start(); }
?>


<?php
	$project= new Project(false); // Projet non initialiser. 
	$project_picture='./V/INCLUDE/IMG/default_project_picture.png';

	$user_name=$user->get('NICKNAME');
	$user_projects=$project->find_USER_PROJECTS($user->get('ID'));
	// NEW PROJECT
		if (isset ($_POST["create_project"])) {
			if (isset ($_POST["project_name_input"]) AND isset ($_POST["project_description_input"])) {
				//create_new_project ($database, /*$owncloud_database, */$_POST["project_name_input"], $_POST["project_description_input"], $user_name=$user->get('NICKNAME'));		// On crée le nouveau projet.
				//$project_id_exe = get_project_id ($database, $_POST["project_name_input"]);		// On récupère l'ID du projet.
				//add_author ($database, $project_id_exe);		// On ajoute l'auteur.
				$project->add_project($_POST["project_name_input"], $_POST["project_description_input"], $user->get('ID'), $user->get('NAME'));
				include_once ('./index.php');
				header("Location: ./index.php");
				echo ("Le projet a bien été créé<br/>");

			} else {
				echo ("Erreur : le projet n'a pas pu être créé");
				include_once ('./index.php');
			}
		}

?>
	
<?php
	include_once ("V/V_myprojects.php");
?>
