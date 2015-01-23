
<?php

// CLASS USER - Permet de gérer un utilisateur


class User{


	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PROTECTED  ATTRIBUT
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	protected $ID;
	protected $NICKNAME;
	protected $PASSWORD;
	protected $MAIL;
	protected $DESCRIPTION;
	protected $meetspace_database;
	protected $request;

	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PUBLIC FUNCTION - CONSTRUCTEUR
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
	
	//CONSTRUCTEUR SANS INITIALISATION L'UTILISATEUR N'EST PAS CONNECTE
    public function __construct($memberID){
    	// Définir les variables avec les résultats de la base

		//LOG DATABASE
		$this->log_meetspace_database ();
		$this->log_prosody_database ();
    	 $memberID = (int)$memberID;

    	 var_dump($memberID);

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
			print_r($this->resultat);
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


	public function get($var)
		{
			switch ($var) { // On renvoi la variable demandé
				case 'ID':
					$this->result=$this->ID;
					break;
				case 'NICKNAME':
					$this->result=$this->NICKNAME;
					break;
				case 'MAIL':
					$this->result=$this->MAIL;
					break;
				case 'PASSWORD':
					$this->result=$this->PASSWORD;
					break;
				case 'DESCRIPTION':
					$this->result=$this->PASSWORD;
					break;
				default:
					$this->result="UserClass:Mauvais nom de variable";
			}
		return ($this->result);
	}

public function setID($var){$this->ID=$var;}
	
public function setNICKNAME($var){$this->NICKNAME=$var;}

public function setMAIL($var){$this->MAIL=$var;}
	
public function setPASSWORD($var){$this->PASSWORD=$var;}
	
public function setDESCRIPTION($var){$this->DESCRIPTION=$var;}
	

    public function add_user (
			$nickname_signin_input, 
			$mail_signin_input, 
			$password_signin_input, 
			$password_confirmation_input)
	{	// Signing in
	if ($password_signin_input === $password_confirmation_input) 
	{	
	// Checking if the password input and the confirmation input matches
		$this->request = $this->meetspace_database->prepare ("INSERT INTO USERS (NICKNAME, PASSWORD, MAIL) VALUES(:nickname_signin_input, :password_signin_input, :mail_input)");
		$this->request -> execute (array (
		'nickname_signin_input' => $nickname_signin_input,
		'password_signin_input' => $password_signin_input,
		'mail_input' => $mail_signin_input));
		$this->request -> closeCursor();


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
		//L'INSCRIPTION A FONCTIONNER: ON CONNECTE L'UTILISATEUR
		$this->connect($nickname_signin_input,$password_signin_input);

		$result=true;
	} 

	else { echo ("Erreur : votre compte n'a pas pu être créé");$result=false;}

		return ($result);
	}

	public function connect($nickname_login_input, $password_login_input) {		// CONNEXION


		// Vérification des identifiants
		$req = $this->meetspace_database->prepare('SELECT id FROM USERS WHERE NICKNAME = :pseudo AND PASSWORD = :pass');
		$req->execute(array(
			'pseudo' => $nickname_login_input,
			'pass' => $password_login_input));

		$resultat = $req->fetch();

		if (!$resultat)
		{
			echo 'Mauvais identifiant ou mot de passe !';
		}
		else
		{
			if (!isset($_SESSION)) { session_start(); }
			$_SESSION['ID'] = $resultat['id'];
			echo 'Vous êtes connecté !';
		}
	}

	protected function log_prosody_database () {		// Connexion à la base de données de Prosody
		try {	
			$this->prosody_database = new PDO('mysql:host=localhost;dbname=prosody', 'meetspace', 'meetspace');
		} catch (Exception $e) {
			die("Error : ".$e->getMessage());
		}
	}

	protected function log_meetspace_database () {		// CONNEXION À LA BASE DE DONNÉES	
		try {	
			$this->meetspace_database = new PDO('mysql:host=localhost;dbname=meetspace', 'meetspace', 'meetspace');
		} catch (Exception $e) {
			die("Error : ".$e->getMessage());
		}
	}

}

