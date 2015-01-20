<!--
M_home_page.php
Model for the home page
Created by Maxime (2014-10-24)
-->


<?php
	function log_database () {		// CONNEXION À LA BASE DE DONNÉES	
		try {	
			$database = new PDO('mysql:host=localhost;dbname=meetspace', 'meetspace', 'meetspace');
		} catch (Exception $e) {
			die("Error : ".$e->getMessage());
		}
		return $database;
	}

	// USER Registering part

	function register_user (
		$database, 
		$nickname_signin_input, 
		$mail_input, 
		$password_signin_input, 
		$password_confirmation_input)
	 
	{		// Signing in
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
			#var_dump ($out);
			#echo $output;
			
				// EN TANT QU'UTILISATEUR MAIL
			$output = exec("sudo /home/GIT_REPOSITORY/SCRIPT/fonctionnel/add_userMail.sh $nickname_signin_input $password_signin_input", $out);
			#var_dump ($out);
			#echo $output;
				// EN TANT QU'UTILISATEUR CHAT
			$output = exec("sudo /home/GIT_REPOSITORY/SCRIPT/fonctionnel/add_userChat.sh $nickname_signin_input $password_signin_input", $out);
			#var_dump ($out);
			#echo $output;

			//ENVOIE D'UN EMAL DE BIENVENU
			$destinataire = ''.$nickname_signin_input.'@meetspace.itinet.fr';
			$expediteur   = "contact@meetspace.itinet.fr";
			$reponse      = $expediteur;

			mail($destinataire,
			     "Bienvenue sur Meetspace",
			     "L'équipe de Meetspace vous souhaite la bienvenue $nickname_signin_input sur son site.",
			     "From: $expediteur\r\nReply-To: $reponse");
					
			echo ("Votre compte a bien été créé");

			//AJOUT D'UN PREMIER CONTACT PROSODY

			//INSERT INTO `prosody`(`host`, `user`, `store`, `key`, `type`, `value`) VALUES ('meetspace.itinet.fr','guillaume','roster','test@meetspace.itinet.fr','json','{"groups":{"Meetspace":true},"subscription":"both"}')​
			/*$request = $database -> prepare ("INSERT INTO `prosody`(`host`, `user`, `store`, `key`, `type`, `value`) VALUES ('meetspace.itinet.fr', :nickname_signin_input,'roster','pierrick@meetspace.itinet.fr','json','{\"groups\":{\"Meetspace\":true},\"subscription\":\"both\"}')​")​;
			$request -> execute (array (
			'nickname_signin_input' => $nickname_signin_input));
			$request -> closeCursor();*/

			//Il s'est inscrit, on le connecte
			connect_user($database, $nickname_signin_input, $password_signin_input);

			header("Location: ./index.php");

		} else {
			echo ("Erreur : votre compte n'a pas pu être créé");
		}
	}

	function connect_user($database, $nickname_login_input, $password_login_input) {		// CONNEXION


		// Vérification des identifiants
		$req = $database->prepare('SELECT id FROM USERS WHERE NICKNAME = :pseudo AND PASSWORD = :pass');
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
			$_SESSION['USER'] = $nickname_login_input;
			$_SESSION['PASSWORD'] = $password_login_input;
			echo 'Vous êtes connecté !';
		}
	}

	function delete_user($database, $memberID) 
	{		// SUPPRESSION D'UN UTILISATEUR
		// Signing in

		$request = $database -> prepare ('DELETE FROM `USERS` WHERE `ID` = :id');
		$request -> execute (array ('id' => $memberID));
		$request -> closeCursor();


		// SUPPRESSION DE L'UTILISATEUR SUR LE SERVEUR
			// EN TANT QU'UTILISATEUR UNIX
		$output = exec("sudo /home/GIT_REPOSITORY/SCRIPT/fonctionnel/del_userUnix.sh $nickname_signin_input", $out);
		#var_dump ($out);
		#echo $output;
		
			// EN TANT QU'UTILISATEUR MAIL
		$output = exec("sudo /home/GIT_REPOSITORY/SCRIPT/fonctionnel/del_userMail.sh $nickname_signin_input", $out);
		#var_dump ($out);
		#echo $output;
			// EN TANT QU'UTILISATEUR CHAT
		$output = exec("sudo /home/GIT_REPOSITORY/SCRIPT/fonctionnel/del_userChat.sh $nickname_signin_input", $out);
		#var_dump ($out);
		#echo $output;	
		#echo ("Votre compte a bien été supprimé");

	}

?>