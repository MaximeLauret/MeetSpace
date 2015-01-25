
<?php include_once ("./M/OBJECT/DB.class.php"); /* Inclusion de la class de la database */?>

<?php

// CLASS PROJECT - Permet de gérer un projet

class Project  extends DB{
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

    public function __construct($projectID)
    {
    	
    	// Définir les variables avec les résultats de la base

		//LOG DATABASE
		$this->log_meetspace_database ();
		$this->log_prosody_database ();
		$this->log_owncloud_database ();
    	$projectID = (int)$projectID;

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
			$this->request->execute (array ('id' => $memberID));
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
	public function add_project ($project_name_input, $project_description_input, $project_creator) {		// Create a new project
		$this->request = $this->meetspace_database->prepare("INSERT INTO PROJECTS (NAME, PROJECT_DESCRIPTION) VALUES (:project_name_input, :project_description_input)");
		$this->request -> execute (array (
		"project_name_input" => $project_name_input,
		"project_description_input" => $project_description_input));
		$this->request -> closeCursor();
	}

}



