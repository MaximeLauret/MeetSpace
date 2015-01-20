<?php

// CLASS PROJECT - Permet de gérer un projet

class Project {

	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PUBLIC FUNCTION - CONSTRUCTEUR
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------	

    public function __construct()  {
    	//CONSTRUCTEUR SANS INITIALISATION
    }

    public function __construct($idMembre)
    {
    	// Récupérer en base de données les infos du membre
    	// SELECT pseudo, email, signature, actif FROM membres WHERE id = ...
    	
    	// Définir les variables avec les résultats de la base
    	$this->pseudo = $donnees['pseudo'];
    	$this->email = $donnees['email'];
    	
    	// etc.
    }

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
	#PROTECTED  FUNCTION
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PUBLIC FUNCTION
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------	

	// CREATE - Créer un projet

	public function create ($var)
	{

		return ($result);
	}

	// DEL - Supprimer un projet

	public function del ($var)
	{

		return ($result);
	}

	// ADDUSER - ajouter un utilisateur au projet

	public function adduser ($var)
	{

		return ($result);
	}

	// DELUSER - supprimer un utilisateur du projet

	public function deluser ($var)
	{

		return ($result);
	}

	// GET - Fonction get pour récupérer les variables

	public function get ($var)
	{

		return ($result);
	}


	// GET - Fonction set pour récupérer les variables

	public function set ($var)
	{

		return ($result);
	}






	// MODEL:

	/*	public function gettestvar ($var)
		{
			$result = exec("varconfig $var", $out);
			$coucou = 'Chalut';
			var_dump ($coucou);
			var_dump ($out);
			return ($result);
		}
	*/

}



