
<?php include_once ("./M/OBJECT/DB.class.php"); /* Inclusion de la class de la database */?>
<?php

// CLASS Search - Permet de faire une recherche

class Search extends DB{



	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PUBLIC FUNCTION - CONSTRUCTEUR
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------	

    public function __construct()  {
    	//CONSTRUCTEUR SANS INITIALISATION
		$this->log_meetspace_database ();
		$users_results=NULL;
		$projects_results=NULL;
    }

	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PROTECTED  ATTRIBUT
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	protected  $users_results;
	protected  $projects_results;

	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PROTECTED  FUNCTION
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PUBLIC FUNCTION
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
	public function search_user ($string) {		// Searching for an user
			$users_results = array();
			$i=0;
			$this->request = $this->meetspace_database -> prepare("SELECT ID, NICKNAME FROM USERS WHERE NICKNAME LIKE :member_searched");
			
			$this->request->execute(array("member_searched" => "%$string%"));
			
			while($data = $this->request->fetch()) {
				$users_results[$i]['id'] = $data['ID'];
				$users_results[$i]['result'] = $data['NICKNAME'];
				$users_results[$i]["ligne"] = "<a href='./../C_profile.php'> Voir le profil </a>";
				$i++;
			}
			
			$this->request->closeCursor();
			return $users_results;
			
		}

	public function search_project ($string) {		// Searching for a project
		$array = array();
		$i=0;
		
		$this->request = $this->meetspace_database->prepare('SELECT ID, NAME FROM PROJECTS WHERE NAME LIKE :name_searched');
		
		$this->request->execute(array("name_searched" => "%$string%"));
		
		while($data = $this->request->fetch()) {
			$projects_results[$i]['id'] = $data['ID'];
			$projects_results[$i]['result'] = $data['NAME'];
			$projects_results[$i]["ligne"] = "<a href='C_project.php?project=".$data["ID"]."'>Voir le tableau</a>";
			$i++;
		}
		
		$this->request->closeCursor();
		return $projects_results;
	}

	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PUBLIC FUNCTION - DESTRUCTEUR
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
	
	public function __destruct(){}
}