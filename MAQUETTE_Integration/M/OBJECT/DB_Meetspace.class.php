<?php

// CLASS DB_Meetspace: Gére la connection à la base de données de Meetspace

class DB_Meetspace extends PDO {


	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PROTECTED  ATTRIBUT
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	protected $name;
	protected $pass;
	protected $dbname;

	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PUBLIC FUNCTION - CONSTRUCTEUR
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
	
	//CONSTRUCTEUR SANS INITIALISATION L'UTILISATEUR N'EST PAS CONNECTE
    public function __construct(){


    }

	function log_database () {		// CONNEXION À LA BASE DE DONNÉES	
	try {	
		$database = new PDO('mysql:host=localhost;dbname=meetspace', 'meetspace', 'meetspace');
		} catch (Exception $e) {
			die("Error : ".$e->getMessage());
		}
		return $database;
	}

	public function __meetspace_DBdestruct()
	{

	}

}

