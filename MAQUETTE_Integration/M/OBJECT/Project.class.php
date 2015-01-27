
<?php include_once ("./M/OBJECT/DB.class.php"); /* Inclusion de la class de la database */?>

<?php

// CLASS PROJECT - Permet de gérer un projet

class Project  extends DB {
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PROTECTED  ATTRIBUT
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	protected  $ID;
	protected  $NAME;
	protected  $PROJECT_DESCRIPTION;
	protected  $VISIBILITY;
	protected  $RMQ;
	protected  $member; //array qui stock la liste des membres

	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PUBLIC FUNCTION - CONSTRUCTEUR
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------	

    public function __construct($projectID){
    	
    	// Définir les variables avec les résultats de la base

		//LOG DATABASE
		$this->log_meetspace_database ();
		$this->log_prosody_database ();
		$this->log_owncloud_database ();
    	$projectID = (int)$projectID;
    	var_dump($projectID);

    	 //var_dump($memberID);

    	if (!isset($projectID) || $projectID == false) {

    		$ID = NULL;
			$NAME= NULL;
			$PROJECT_DESCRIPTION= NULL;
			$VISIBILITY= NULL;
			$RMQ= NULL;
			$member= NULL; //array qui stock la liste des membres

    	}
    	else{

    		$this->request = $this->meetspace_database->prepare ("SELECT `ID`, `NAME`, `PROJECT_DESCRIPTION`, `VISIBILITY`, `RMQ` FROM `PROJECTS` WHERE ID=:id");
			$this->request->execute (array ('id' => $projectID));
			$this->resultat = $this->request->fetch();

    		$this->ID = $this->resultat['ID'];
    		$this->NAME = $this->resultat['NAME'];
    		$this->PROJECT_DESCRIPTION = $this->resultat['PROJECT_DESCRIPTION'];
    		$this->VISIBILITY = $this->resultat['VISIBILITY'];
    		$this->RMQ = $this->resultat['RMQ'];
			
			$this->request -> closeCursor();
    		print_r($this);
    	}
    }



	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PROTECTED  FUNCTION
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PUBLIC FUNCTION
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
	public function add_project ($project_name_input, $project_description_input, $user_id) {		// Create a new project
		//On créé le projet à partir des variables passer en paramètre
		$this->request = $this->meetspace_database->prepare("INSERT INTO PROJECTS (NAME, PROJECT_DESCRIPTION) VALUES (:project_name_input, :project_description_input)");
		$this->request -> execute (array (
		"project_name_input" => $project_name_input,
		"project_description_input" => $project_description_input));
		$this->request -> closeCursor();

		//On initialise les variables du projet et on récupére au passage son ID
		//RQT
		$this->request = $this->meetspace_database->prepare("SELECT `ID`, `NAME`, `PROJECT_DESCRIPTION`, `VISIBILITY`, `RMQ` FROM `PROJECTS` WHERE NAME=:project_name_input");
		$this->request -> execute (array (
		"project_description_input" => $project_description_input));
		$this->request -> closeCursor();

		//INIT
		$this->resultat = $this->request->fetch();

		$this->ID = $this->resultat['ID'];
		$this->NAME = $this->resultat['NAME'];
		$this->PROJECT_DESCRIPTION = $this->resultat['PROJECT_DESCRIPTION'];
		$this->VISIBILITY = $this->resultat['VISIBILITY'];
		$this->RMQ = $this->resultat['RMQ'];

		//Ajout de l'auteur du pjet

		$this->set_author($user_id);
	}

	protected function set_author ($user_id) {		// Ajoute l'auteur du projet.
		$this->request = $this->meetspace_database -> prepare ("INSERT INTO SUBSCRIBE (USER, PROJECT, STATUS, AUTHOR) VALUES (:user_id, :project_id, 'MANAGER', 1)");
		$this->request -> execute (array (
		"user_id" => $user_id,
		"project_id" => $this->ID));
		$this->request -> closeCursor();
	}

	// Cette fonction, permet de trouver les ID des projet au quel colabore un utilisateur
	public function find_USER_PROJECTS ($userID) {		// Get the user's projects
		$tab = array ();

		$this->request = $this->meetspace_database ->prepare ("SELECT PROJECTS.ID, PROJECTS.NAME, PROJECTS.PROJECT_DESCRIPTION FROM USERS LEFT JOIN SUBSCRIBE ON SUBSCRIBE.USER = USERS.ID LEFT JOIN PROJECTS ON PROJECTS.ID = SUBSCRIBE.PROJECT WHERE USERS.ID = :id");
		$this->request-> execute (array ('id' => $userID));
		//Le if est là pour que l'on essaie pas de remplir de tableau si les variables sont vide.
		// Cela évite que php renvoie des erreurs.
		 
		while ($line = $this->request -> fetch ()) {
			//if ($line['NAME'] == NULL || $line['PROJECT_DESCRIPTION'] == NULL) { 	}
			//else{
					$project_id = $line['ID'];
					/*$project_name = $line['NAME'];
					$project_description = $line['PROJECT_DESCRIPTION'];
					array_push ($tab, array ('ID'=> $project_id, 'NAME' => $project_name, 'PROJECT_DESCRIPTION' => $project_description));*/
			}
			
		$this->request -> closeCursor();
		var_dump($project_id);
		return $project_id;
	}

	///!\A supprimer
	/*protected function get_project_id ($project_name_input) {		// Récupère l'ID du projet afin d'ajouter l'auteur par la suite.
		$this->request = $this->meetspace_database -> prepare ("SELECT ID FROM PROJECTS WHERE NAME LIKE :project_name_input");
		$this->request -> execute (array ("project_name_input" => $project_name_input));
		$line = $this->request -> fetch ();
		$project_id = $line["ID"];
		$this->request -> closeCursor();
		return $project_id;
	}

	protected function add_author ($project_id, $user_id) {		// Ajoute l'auteur du projet.
		$this->request = $this->meetspace_database -> prepare ("INSERT INTO SUBSCRIBE (USER, PROJECT, STATUS, AUTHOR) VALUES (:user_id, :project_id, 'MANAGER', 1)");
		$this->request -> execute (array (
		"user_id" => $user_id,
		"project_id" => $project_id));
		$this->request -> closeCursor();
	}*/
	///!\ Fin à supprimer

	/*
	public function leave_project ($project_id_to_leave_exe) {		// Désabonne du projet précédemment sélectionné.
		$this->request = $this->meetspace_database -> prepare ("DELETE FROM SUBSCRIBE WHERE USER LIKE :user_id AND PROJECT LIKE :project_id");
		$this->request -> execute (array (
		"user_id" => $_SESSION["ID"],
		"project_id" => $project_id_to_leave_exe));
		$this->request -> closeCursor();
	}*/ 

/*
	public function get_project_name ($database, $current_project) {		// Récupère le nom du projet pour l'affichage
		$request = $database -> prepare ("SELECT NAME FROM PROJECTS WHERE ID LIKE :project_query");
		$request -> execute (array ("project_query" => $current_project));
		$line = $request -> fetch ();
		$project_name = $line["NAME"];
		$request -> closeCursor();
		return $project_name;
	}

	public function get_project_description ($database, $current_project) {		// Récupère la description du projet pour l'affichage
		$request = $database -> prepare ("SELECT PROJECT_DESCRIPTION FROM PROJECTS WHERE ID LIKE :project_query");
		$request -> execute (array ("project_query" => $current_project));
		$line = $request -> fetch ();
		$project_description = $line["PROJECT_DESCRIPTION"];
		$request -> closeCursor();
		return $project_description;
	}

	public function get_subscribed_users ($database, $current_project) {		// Récupère la liste des utilisateurs abonnés au projet.
		$tab = array ();
		$request = $database -> prepare ("SELECT USER FROM SUBSCRIBE WHERE PROJECT LIKE :project_id");
		$request -> execute (array ("project_id" => $current_project));
		while ($line = $request -> fetch ()) {
			$subscribed_users = $line["USER"];
			array_push ($tab, array ("USER" => $subscribed_users));
		}
		$request -> closeCursor();
		return $tab;
	}

	public function get_subscribed_users_names ($database, $users_ids) {		// Récupère le nom des utilisateurs abonnés à partir de leur id
		$tab = array ();
		$request = $database -> prepare ("SELECT NICKNAME FROM USERS WHERE ID LIKE :users_ids");
		$request -> execute (array ("users_ids" => $users_ids));
		while ($line = $request -> fetch ()) {
			$users_names = $line["NICKNAME"];
			array_push ($tab, array ("NICKNAME" => $users_names));
		}
		$request -> closeCursor();
		return $tab;
	}

	public function get_manager_list ($database, $project_name) {
		$tab = array ();
		$request = $database -> prepare ("SELECT SUBSCRIBE.USER FROM SUBSCRIBE LEFT JOIN SUBSCRIBE.PROJECTS ON PROJECTS.ID WHERE WHERE PROJECTS.NAME LIKE :project_name AND SUBSCRIBE.STATUS = 'MANAGER'");
		$request -> execute (array ("project_name" => $project_name));
		while ($line = $request -> fetch ()) {
			$project_manager_list = $line["USER"];
			array_push ($tab, array ("USER" => $project_manager_list));
		}
		$request -> closeCursor();
		return $tab;
	}

	public function join_project ($database, $current_project) {		// Add the user as a contributor to the project
		$request = $database -> prepare ("INSERT INTO SUBSCRIBE (USER, PROJECT, STATUS) VALUES (:user, :project, 'CONTRIBUTOR')");
		$request -> execute (array (
		"user" => $_SESSION["ID"],
		"project" => $current_project));
		$request -> closeCursor();
	}

	public function leave_project ($database, $current_project) {		// Delete the user as a contributor to the project		/!\ Fonction également présente dans M_myprojects.php
		$request = $database -> prepare ("DELETE FROM SUBSCRIBE WHERE USER LIKE :user AND PROJECT LIKE :project");
		$request -> execute (array (
		"user" => $_SESSION["ID"],
		"project" => $current_project));
		$request -> closeCursor();
	}

	public function delete_project ($database, $current_project) {		// Delete the project and the contributors
		$request = $database -> prepare ("DELETE * FROM PROJECTS WHERE NAME LIKE :project_name");		// AJOUTER ICI LE DEL DE SUBSCRIBE
		$request -> execute (array ("project_name" => $current_project));
		$request -> closeCursor();
	}

*/
}

