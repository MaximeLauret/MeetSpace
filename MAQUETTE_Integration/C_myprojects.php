<!--
C_myprojects.php
Controller for the projects page
Created by Max (2014-12-22)
-->


<?php
if (!isset($_SESSION)) { session_start(); }
?>


<?php
	$project= new Project(false);

	$user_name=$user->get('NICKNAME');
	$user_projects=$project->find_USER_PROJECTS($user->get('ID'));
	//echo "User project";
	//var_dump($user_projects);
	if ($user_projects==NULL) { // L'utilisateur n'a pas de projet

	}
	else{// L'utilisateur a des projets
			foreach ($user_projects as $key => $value) {
				//$project= new Project(false);
				echo 'key' .$key. 'value' .$value;
				var_dump($key);
				$project[$key]= new Project($value);

				# code...
			}
		}
	
	//$owncloud_database = log_owncloud_database;		// Log into the ownCloud database
	
	// NEW PROJECT
		if (isset ($_POST["create_project"])) {
			if (isset ($_POST["project_name_input"]) AND isset ($_POST["project_description_input"])) {
				//create_new_project ($database, /*$owncloud_database, */$_POST["project_name_input"], $_POST["project_description_input"], $user_name=$user->get('NICKNAME'));		// On crée le nouveau projet.
				//$project_id_exe = get_project_id ($database, $_POST["project_name_input"]);		// On récupère l'ID du projet.
				//add_author ($database, $project_id_exe);		// On ajoute l'auteur.
				$project->add_project($_POST["project_name_input"], $_POST["project_description_input"], $user->get('ID'));
				include_once ('./index.php');
				echo ("Le projet a bien été créé<br/>");

			} else {
				echo ("Erreur : le projet n'a pas pu être créé");
				include_once ('./index.php');
			}
		}

	/*// AFFICHER PAGE PROJET

		if (isset ($_GET["project_query"])) {
			echo("<meta http-equiv='Refresh' content='0; url=./index.php'/>");
		}

	// QUITTER UN PROJET
		if (isset ($_POST["leave_project"]) AND isset ($_POST["project_selection"])) {
			$project_id_to_leave_exe = get_project_id_to_leave ($database, $_POST["project_selection"]);		// On récupère l'id du projet.
			leave_project ($database, $project_id_to_leave_exe);		// On quitte le projet.
			echo("<meta http-equiv='Refresh' content='0; url=./index.php'/>");
		} else {
			// NOthing
		}*/

?>
	
<?php
	include_once ("V/V_myprojects.php");
?>
