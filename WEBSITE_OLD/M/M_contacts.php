<!--
M_contacts.php
Affiche la liste des contacts et les invitations
Auteur : Max (2014-05-13)
-->


<?php

	function connexion() {		// Connexion à la base de données
		try {
			$bdd = new PDO('mysql:host=localhost;dbname=notepost', 'root', '');
		}
		catch (Exception $e) {
			die("Erreur : ".$e->getMessage());
		}
		return $bdd;
	}

	function get_contacts ($bdd) {		// On récupère la liste des contacts
	
		$tab = array ();
		
		$response = $bdd -> prepare ("SELECT u_s.nickname as sender_nickname, u_s.id as sender_id, u_r.nickname as receiver_nickname, u_r.id as receiver_id FROM contacts LEFT JOIN users u_s ON contacts.sender = u_s.id LEFT JOIN users u_r ON contacts.receiver = u_r.id WHERE contacts.accept = true AND (contacts.sender = :id OR contacts.receiver = :id)");
		$zone_dyn = array ("id" => $_SESSION["USER"]);
		$response -> execute ($zone_dyn);
		
		while ($board_list_temp = $response -> fetch ()) {
			array_push ($tab, $board_list_temp);
		}
		
		$response -> closeCursor();
	
		return $tab;
	
	}
	
	function received_invitations ($bdd) {		// Affiche les invitations reçues et pas encore acceptées.
	
		$tab = array ();
		
		$response = $bdd -> prepare ("SELECT u_s.nickname as sender_nickname, u_s.id as sender_id, u_r.nickname as receiver_nickname, u_r.id as receiver_id FROM contacts LEFT JOIN USERS u_s ON contacts.sender = u_s.id LEFT JOIN users u_r ON contacts.receiver = u_r.id WHERE contacts.receiver = :id AND contacts.accept = false");
		$zone_dyn = array (':id' => $_SESSION["user"]);
		$response -> execute ($zone_dyn);
		
		while ($received_invitations_temp = $response -> fetch ()) {
			array_push ($tab, $received_invitations_temp);
		}
		
		$response -> closeCursor();
				
		return $tab;
		
	}

	function accept_invitation ($bdd, $sender, $received_invitations) {		// Accepte l'invitation
		
		$tab = array ();
		
		$bdd -> beginTransaction();
		
		$response = $bdd -> prepare ("CREATE OR REPLACE VIEW sender AS SELECT c.id, c.accept, u.nickname FROM contacts c JOIN users u ON c.sender = u.id WHERE c.sender = :id_sender");
		$response -> execute(array (":id_sender" => $sender));
		
		$response2 = $bdd -> prepare ("CREATE OR REPLACE VIEW receiver AS SELECT c.id, c.accept, u.nickname FROM contacts c JOIN users u ON c.receiver = u.id WHERE c.receiver = :id_receiver");
		$response2 -> execute (array (":id_receiver" => $_SESSION["user"]));
		
		$response = $bdd -> prepare ("UPDATE sender, receiver SET receiver.accept = 1 WHERE sender.id = receiver.id AND receiver.accept = 0");
		$response -> execute();
		
		$tab = $response -> fetchAll();
		
		$response -> closeCursor();
		
		$received_invitations = received_invitations ($bdd);
		
		$bdd -> commit();
	
	}
	
	function refuse_invitation ($bdd, $sender) {		// Refuse l'invitation
	
		$tab = array ();
	
		$response = $bdd -> prepare ("CREATE OR REPLACE VIEW sender AS SELECT c.id, c.accept, u.nickname FROM contacts c JOIN users u ON c.sender = u.id WHERE c.sender = :id_sender");
		$response -> execute(array (":id_sender" => $sender));
		
		$response2 = $bdd -> prepare ("CREATE OR REPLACE VIEW receiver AS SELECT c.id, c.accept, u.nickname FROM contacts c JOIN users u ON c.receiver = u.id WHERE c.receiver = :id_receiver");
		$response2 -> execute (array (":id_receiver" => $_SESSION["user"]));
		 
		$response = $bdd -> prepare ("DELETE FROM contacts WHERE sender = :sender_id AND receiver = :receiver_id AND accept = 0");
		$response -> execute (array (':sender_id' => $sender, ':receiver_id' => $_SESSION["user"]));
		
		while ($refuse_invitation_temp = $response -> fetch ()) {
			array_push ($tab, $refuse_invitation_temp);
		}
		
		$response -> closeCursor();
		
		$received_invitations = received_invitations ($bdd);
	
	}
	
	function sent_invitations ($bdd) {
	
		$tab = array ();
		
		$response = $bdd -> prepare ("SELECT u_s.nickname as sender_nickname, u_s.id as sender_id, u_r.nickname as receiver_nickname, u_r.id as receiver_id FROM contacts LEFT JOIN USERS u_s ON contacts.sender = u_s.id LEFT JOIN users u_r ON contacts.receiver = u_r.id WHERE contacts.sender = :sender_id AND contacts.accept = 0");
		$zone_dyn = array (':sender_id' => $_SESSION["user"]);
		$response -> execute ($zone_dyn);
		
		while ($sent_invitations_temp = $response -> fetch()) {
		
			array_push ($tab, $sent_invitations_temp);
		
		}
		
		$response -> closeCursor();
		
		return $tab;
	
	}
	
	function cancel_invitations ($bdd, $receiver, $sent_invitations) {		// Affiche les invitations envoyées et pas encore acceptées.
	
		$tab = array ();
	
		$response = $bdd -> prepare ("CREATE OR REPLACE VIEW sender AS SELECT c.id, c.accept, u.nickname FROM contacts c JOIN users u ON c.sender = u.id WHERE c.sender = :id_sender");
		$response -> execute(array (":id_sender" => $_SESSION["user"]));
		
		$response2 = $bdd -> prepare ("CREATE OR REPLACE VIEW receiver AS SELECT c.id, c.accept, u.nickname FROM contacts c JOIN users u ON c.receiver = u.id WHERE c.receiver = :id_receiver");
		$response2 -> execute (array (":id_receiver" => $receiver));
	
		$response = $bdd -> prepare ("DELETE FROM contacts WHERE sender = :sender_id AND RECEIVER = :receiver_id AND ACCEPT = 0;");
		$response -> execute (array (':sender_id' => $_SESSION["user"], ':receiver_id' => $receiver));
		
		while ($received_invitations_temp = $response -> fetch ()) {
			array_push ($tab, $received_invitations_temp);
		}
		
		$response -> closeCursor();
		
		return $tab;
	
	}
	
	

?>