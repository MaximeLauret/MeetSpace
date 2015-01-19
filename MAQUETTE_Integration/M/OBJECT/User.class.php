<?php

// CLASS USER - Permet de gérer un utilisateur

class User {



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
	protected  $nickname;
	protected  $password;
	protected  $mail;

	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PROTECTED  FUNCTION
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PUBLIC FUNCTION
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------	


	//INSCRIPTION
	public function inscription (
			$database, 
			$nickname, 
			$mail, 
			$password, 
			$password_confirmation)
	{	// Signing in
	if ($password_signin_input === $password_confirmation_input) 
	{	
	// Checking if the password input and the confirmation input matches
		$request = $database -> prepare ("INSERT INTO USERS (NICKNAME, PASSWORD, MAIL) VALUES(:nickname_signin_input, :password_signin_input, :mail_input)");
		$request -> execute (array (
		'nickname_signin_input' => $nickname_signin_input,
		'password_signin_input' => $password_signin_input,
		'mail_input' => $mail_input));
		$request -> closeCursor();


		// AJOUT DE L'UTILISATEUR SUR LE SERVEUR
			// EN TANT QU'UTILISATEUR UNIX
		$output = exec("sudo /home/GIT_REPOSITORY/SCRIPT/fonctionnel/add_userUnix.sh $nickname_signin_input $password_signin_input", $out);
		var_dump ($out);
		echo $output;
		
			// EN TANT QU'UTILISATEUR MAIL
		$output = exec("sudo /home/GIT_REPOSITORY/SCRIPT/fonctionnel/add_userMail.sh $nickname_signin_input $password_signin_input", $out);
		var_dump ($out);
		echo $output;
			// EN TANT QU'UTILISATEUR CHAT
		$output = exec("sudo /home/GIT_REPOSITORY/SCRIPT/fonctionnel/add_userChat.sh $nickname_signin_input $password_signin_input", $out);
		var_dump ($out);
		echo $output;

				
		echo ("Votre compte a bien été créé");
	} else {
		echo ("Erreur : votre compte n'a pas pu être créé");
	}

		return ($result);
	}

	//DESINSCRIPTION
	public function desinscription ($name, $password)
	{

		return ($result);
	}

	//CONNECTION
	public function connection ($name, $password)
	{

		return ($result);
	}

	//DECONNECTION
	public function deconnection ($name, $password)
	{

		return ($result);
	}


	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PUBLIC FUNCTION - GET
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------	


	public function getId ()
	{
		return $this->id;
	}

	public function getNickname ()
	{
		return $this->nickname;
	}

	public function getPassword ()
	{
		return $this->nickname;
	}

	public function getMail ()
	{
		return $this->nickname;
	}

	/*public function getDescription ()
	{
		return $this->Description;
	}*/

	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PUBLIC FUNCTION - SET
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------	

	/*		//SET
		public function setDescription ($newDescription)
		{
			//$this->description = $newDescription;
		}
	*/

	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PUBLIC FUNCTION - DESTRUCTEUR
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------	

public function __destruct()
{
    echo 'Cet objet va être détruit !';
}


	// MODEL:

	/*	public function gettestif ($if)
		{
			$test_interface = exec("ifconfig $if", $out);
			$coucou = 'Chalut';
			var_dump ($coucou);
			var_dump ($out);
			return ($test_interface);
		}
	*/

}

