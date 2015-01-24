
<?php include_once ("./M/OBJECT/DB.class.php"); /* Inclusion de la class de la database */?>

<?php

// CLASS PROJECT - Permet de gérer un projet

class Project  extends DB{
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PROTECTED  ATTRIBUT
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	protected  $id;
	protected  $name;
	protected  $description;
	protected  $visibility;
	protected  $rmq;
	protected  $member; //array qui stock la liste des membres

	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PUBLIC FUNCTION - CONSTRUCTEUR
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------	

    public function __construct($idMembre)
    {
    	
    	// Définir les variables avec les résultats de la base

		//LOG DATABASE
		$this->log_meetspace_database ();
		$this->log_prosody_database ();
    	 $memberID = (int)$memberID;

    	 //var_dump($memberID);

    	if (!isset($memberID) || $memberID == false) {

    		$ID = NULL;
    		$NICKNAME = NULL;
    		$PASSWORD = NULL;
    		$MAIL = NULL;
    		$DESCRIPTION = NULL;
    		echo "Member ID = O";
    	}
    	else{

    		$this->request = $this->meetspace_database->prepare ("SELECT `ID`, `NICKNAME`, `PASSWORD`, `MAIL`, `USER_DESCRIPTION` FROM `USERS` WHERE `ID` = :id");
    		//var_dump($this->request);
			$this->request->execute (array ('id' => $memberID));
			//var_dump($this->request);
			
			/*
			$stmt = $db->prepare("SELECT * FROM table WHERE id=? AND name=?");
			$stmt->execute(array($id, $name));
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			*/

			$this->resultat = $this->request->fetch();
			//print_r($this->resultat);
    		$this->ID = $this->resultat['ID'];
    		$this->NICKNAME = $this->resultat['NICKNAME'];
    		$this->PASSWORD = $this->resultat['PASSWORD'];
    		$this->MAIL = $this->resultat['MAIL'];
    		$this->DESCRIPTION = $this->resultat['USER_DESCRIPTION'];
			
			$this->request -> closeCursor();
    		//print_r($this);
    		/*
	    	 var_dump($ID);
	    	 var_dump($NICKNAME);
	    	 var_dump($PASSWORD);
	    	 var_dump($MAIL);
	    	 var_dump($DESCRIPTION);
	    	 */
    	}
    }



	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PROTECTED  FUNCTION
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PUBLIC FUNCTION
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
	public function create_new_project ($database, $project_name_input, $project_description_input, $project_creator) {		// Create a new project
		$this->request = $this->meetspace_database->prepare("INSERT INTO PROJECTS (NAME, PROJECT_DESCRIPTION) VALUES (:project_name_input, :project_description_input)");
		$this->request -> execute (array (
		"project_name_input" => $project_name_input,
		"project_description_input" => $project_description_input));
		$this->request -> closeCursor();
	}

}



