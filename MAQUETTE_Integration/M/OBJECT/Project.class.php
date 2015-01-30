
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

    	if (!isset($projectID) || $projectID == false) { // Si il est vide ou contient false

    		$ID = NULL;
			$NAME= NULL;
			$PROJECT_DESCRIPTION= NULL;
			$VISIBILITY= NULL;
			$RMQ= NULL;
			$member= NULL; //array qui stock la liste des membres

    	}
    	else{ // Si il n'est pas vide et contient un id (valeur numérique)

    		$this->request = $this->meetspace_database->prepare ("SELECT `ID`, `NAME`, `PROJECT_DESCRIPTION`, `VISIBILITY`, `RMQ` FROM `PROJECTS` WHERE ID=:id");
			$this->request->execute (array ('id' => $projectID));
			$this->resultat = $this->request->fetch();

    		$this->ID = $this->resultat['ID'];
    		$this->NAME = $this->resultat['NAME'];
    		$this->PROJECT_DESCRIPTION = $this->resultat['PROJECT_DESCRIPTION'];
    		$this->VISIBILITY = $this->resultat['VISIBILITY'];
    		$this->RMQ = $this->resultat['RMQ'];
			
			$this->request -> closeCursor();

    	}
    	/*else{// sinon il contient une chaine de caractère
    		$this->request = $this->meetspace_database->prepare ("SELECT `ID`, `NAME`, `PROJECT_DESCRIPTION`, `VISIBILITY`, `RMQ` FROM `PROJECTS` WHERE `NAME`=:name");
			$this->request->execute (array ('name' => $projectID));
			$this->resultat = $this->request->fetch();

    		$this->ID = $this->resultat['ID'];
    		$this->NAME = $this->resultat['NAME'];
    		$this->PROJECT_DESCRIPTION = $this->resultat['PROJECT_DESCRIPTION'];
    		$this->VISIBILITY = $this->resultat['VISIBILITY'];
    		$this->RMQ = $this->resultat['RMQ'];
			
			$this->request -> closeCursor();
    		//print_r($this);

    	}*/
    }



	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PROTECTED  FUNCTION
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------


	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PUBLIC FUNCTION
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
	public function get($var)
		{
			switch ($var) { // On renvoi la variable demandé
				case 'ID':
					$this->result=$this->ID;
					break;
				case 'NAME':
					$this->result=$this->NAME;
					break;
				case 'PROJECT_DESCRIPTION':
					$this->result=$this->PROJECT_DESCRIPTION;
					break;
				case 'VISIBILITY':
					$this->result=$this->VISIBILITY;
					break;
				case 'RMQ':
					$this->result=$this->RMQ;
					break;
				case 'member':
					$this->result=$this->member;
					break;
				default:
					$this->result="UserClass:Mauvais nom de variable";
			}
		return ($this->result);
	}


	public function add_project ($project_name_input, $project_description_input, $user_id, $user_name) {		// Create a new project
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
		"project_name_input" => $project_name_input));

		//INIT
		$this->resultat = $this->request->fetch();

		//var_dump($this->resultat);
		$this->ID = $this->resultat['ID'];
		$this->NAME = $this->resultat['NAME'];
		$this->PROJECT_DESCRIPTION = $this->resultat['PROJECT_DESCRIPTION'];
		$this->VISIBILITY = $this->resultat['VISIBILITY'];
		$this->RMQ = $this->resultat['RMQ'];
		//Ajout de l'auteur du projet

		$this->set_author($user_id);

		//PHP - EXEC
		//Partie site internet:
		$output = exec("sudo /home/GIT_REPOSITORY/SCRIPT/fonctionnel/add_vhost.sh $this->NAME", $out);		
		$output = exec("sudo /home/GIT_REPOSITORY/SCRIPT/fonctionnel/enable_vhost.sh $this->NAME", $out);
		$output = exec("sudo /home/GIT_REPOSITORY/SCRIPT/fonctionnel/add_dns.sh $this->NAME", $out);
		$output = exec("sudo /home/GIT_REPOSITORY/SCRIPT/fonctionnel/add_blog.sh $this->NAME $this->NAME", $out);

		//Partie mail:
		$output = exec("sudo /home/GIT_REPOSITORY/SCRIPT/fonctionnel/add_projectAlias.sh $this->NAME", $out);
		$output = exec("sudo /home/GIT_REPOSITORY/SCRIPT/fonctionnel/add_userAlias.sh $this->NAME $user_name", $out);
		
		$this->request -> closeCursor();
	}

	protected function set_author ($user_id) {		// Ajoute l'auteur du projet.
		$this->request = $this->meetspace_database -> prepare ("INSERT INTO SUBSCRIBE (USER, PROJECT, STATUS, AUTHOR) VALUES (:user_id, :project_id, 'MANAGER', 1)");
		$this->request -> execute (array (
		"user_id" => $user_id,
		"project_id" => $this->ID));
		$this->request -> closeCursor();
	}

	public function setDESCRIPTION($description){
		$this->request = $this->meetspace_database->prepare ("UPDATE `meetspace`.`PROJECTS` SET `PROJECT_DESCRIPTION` = :description WHERE `PROJECTS`.`ID`=:id;");
		$this->request -> execute (array (
		'description' => $description,
		'id' => $this->ID));
		//var_dump($description);
		$this->request -> closeCursor();

	}

	// Cette fonction, permet de trouver les ID des projet au quel colabore un utilisateur
	public function find_USER_PROJECTS ($userID) {		// Get the user's projects
		$tab = array ();

		$this->request = $this->meetspace_database ->prepare ("SELECT PROJECTS.ID FROM USERS LEFT JOIN SUBSCRIBE ON SUBSCRIBE.USER = USERS.ID LEFT JOIN PROJECTS ON PROJECTS.ID = SUBSCRIBE.PROJECT WHERE USERS.ID = :id");
		$this->request-> execute (array ('id' => $userID));
		//Le if est là pour que l'on essaie pas de remplir de tableau si les variables sont vide.
		// Cela évite que php renvoie des erreurs.
		 
		while ($line = $this->request -> fetch ()) {
				$project_id = $line['ID'];
				/*$project_name = $line['NAME'];
				$project_description = $line['PROJECT_DESCRIPTION'];*/
				array_push ($tab, array ('ID'=> $project_id));
			}
			
		$this->request -> closeCursor();
		//var_dump($tab);
		return $tab;
	}

	

	public function get_subscribed_users () {		// Récupère la liste des utilisateurs abonnés au projet.
		$tab = array ();
		$this->request = $this->meetspace_database->prepare("SELECT USER FROM SUBSCRIBE WHERE PROJECT LIKE :id");
		$this->request->execute(array ('id' => $this->ID));
		while ($line = $this->request-> fetch ()) {
			$subscribed_users = $line["USER"];
			array_push ($tab, array ('ID' => $subscribed_users));
		}
			//var_dump($tab);

		$this->request-> closeCursor();
		return $tab;
	}


	public function get_manager_list () {
		$tab = array ();
		$this->request = $this->meetspace_database -> prepare ("SELECT USER FROM SUBSCRIBE WHERE STATUS LIKE 'MANAGER' AND PROJECT LIKE :id");
		$this->request->execute(array ('id' => $this->ID));
		while ($line = $this->request -> fetch ()) {
			//var_dump($line);
			$project_manager_list = $line["USER"];
			array_push ($tab, array ("ID" => $project_manager_list));
		}
		$this->request -> closeCursor();
		return $tab;
	}

	public function join_project ($userID, $user_name) {		// Add the user as a contributor to the project
		$this->request = $this->meetspace_database -> prepare ("INSERT INTO SUBSCRIBE (USER, PROJECT, STATUS) VALUES (:user, :project, 'CONTRIBUTOR')");
		$this->request -> execute (array (
		"user" => $userID,
		"project" => $this->ID));

		$output = exec("sudo /home/GIT_REPOSITORY/SCRIPT/fonctionnel/add_userAlias.sh $this->NAME $user_name", $out);
		$this->request -> closeCursor();
	}

	public function leave_project ($userID) {		// Delete the user as a contributor to the project		/!\ Fonction également présente dans M_myprojects.php
		$this->request = $this->meetspace_database -> prepare ("DELETE FROM SUBSCRIBE WHERE USER LIKE :user AND PROJECT LIKE :project");
		$this->request -> execute (array (
		"user" => $userID,
		"project" => $this->ID));
		$this->request -> closeCursor();
	}

	public function delete_project () {		// Delete the project and the contributors
		$this->request = $this->meetspace_database -> prepare ("DELETE * FROM PROJECTS WHERE NAME LIKE :project_name");		// AJOUTER ICI LE DEL DE SUBSCRIBE
		$this->request -> execute (array ("project_name" => $current_project));
		$this->request -> closeCursor();
	}
}

