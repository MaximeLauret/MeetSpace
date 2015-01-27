
<?php include_once ("./M/OBJECT/DB.class.php"); /* Inclusion de la class de la database */?>
<?php

// CLASS USER - Permet de gérer un utilisateur


class User extends  DB{


	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	#PROTECTED  ATTRIBUT
	#------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	protected $ID;
	protected $NICKNAME;
	protected $PASSWORD;
	protected $MAIL;
	protected $DESCRIPTION;
	protected $USER_PROJECTS;

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

    	 //var_dump($memberID);

    	if (!isset($memberID) || $memberID == false) {

    		$ID = NULL;
    		$NICKNAME = NULL;
    		$PASSWORD = NULL;
    		$MAIL = NULL;
    		$DESCRIPTION = NULL;
    		$USER_PROJECTS=NULL;
    	}
    	else{

    		$this->request = $this->meetspace_database->prepare ("SELECT `ID`, `NICKNAME`, `PASSWORD`, `MAIL`, `PROFILE_DESCRIPTION` FROM `USERS` WHERE `ID` = :id");
			$this->request->execute (array ('id' => $memberID));
			$this->resultat = $this->request->fetch();

    		$this->ID = $this->resultat['ID'];
    		$this->NICKNAME = $this->resultat['NICKNAME'];
    		$this->PASSWORD = $this->resultat['PASSWORD'];
    		$this->MAIL = $this->resultat['MAIL'];
    		$this->DESCRIPTION = $this->resultat['PROFILE_DESCRIPTION'];
			
			$this->request -> closeCursor();
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
					$this->result=$this->DESCRIPTION;
					break;
				case 'USER_PROJECTS':
					$this->result=$this->USER_PROJECTS;
					break;
				default:
					$this->result="UserClass:Mauvais nom de variable";
			}
		return ($this->result);
	}

	//public function setNICKNAME($var){$this->NICKNAME=$var;}

	//public function setMAIL($var){$this->MAIL=$var;}
		
	/*public function setPASSWORD($var){
		$this->request = $this->meetspace_database->prepare ("UPDATE `meetspace`.`USERS` SET `PASSWORD` = :password WHERE `USERS`.`ID`=:id");
		$this->request -> execute (array (
		'id' => $nickname_signin_input,
		'password' => $password_signin_input));
		$this->request -> closeCursor()
		//AJOUTER LES PHP EXEC
	}*/
		
	public function setDESCRIPTION($description){
		$this->request = $this->meetspace_database->prepare ("UPDATE `meetspace`.`USERS` SET `PROFILE_DESCRIPTION` = :description WHERE `USERS`.`ID` :id;
");
		$this->request -> execute (array (
		'description' => $description,
		'id' => $this->ID));
		$this->request -> closeCursor();
	}
	

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

			//ENVOIE D'UN EMAL DE BIENVENU
			$destinataire = $nickname_signin_input.'@meetspace.itinet.fr';
			$expediteur   = "contact@meetspace.itinet.fr";
			$reponse      = $expediteur;

			mail($destinataire,
			     "Bienvenue sur Meetspace",
			     "L'équipe de Meetspace vous souhaite la bienvenue $nickname_signin_input sur son site.",
			     "From: $expediteur\r\nReply-To: $reponse");
					
			echo ("Votre compte a bien été créé");
					
			echo ("Votre compte a bien été créé");
				

			$result=true;
		}

		else { echo ("Erreur : votre compte n'a pas pu être créé");$result=false;}

		return ($result);
	}

	public function connect($nickname_login_input, $password_login_input) {	// CONNEXION


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
	
}

