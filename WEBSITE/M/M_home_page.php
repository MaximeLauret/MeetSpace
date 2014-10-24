<!--
M_home_page.php
Model for the home page
Created by Maxime (2014-10-24)
-->

<?php

function log_database () {		// Logging into the database	
	try {	
	$database = new PDO('mysql:host=localhost;dbname=MEETSPACE', 'root', '');
	} catch (Exception $e) {
		die("Error : ".$e->getMessage());
	}
	return $database;
}

function user_exists($database, $login) {		// Checking if user exists
	$bool_value = false;
	$reponse = $database->query('SELECT NICKNAME FROM USERS');
	
	while($data = $reponse->fetch()) {
		if($data['NICKNAME'] === $login) {
			$bool_value = true;
		} else {
			// NOTHING
		}
	}
	return $bool_value;
}

function tests_special_chars($string) {		// Checking if there is any special character in nickname
	$special_chars = array("%", "/", "<", ">", "(", ")", ";", "[", "]");
	$flag = true;
			
	for($i = 0; isset($string[$i]); $i++) {
		foreach($special_chars as $key => $value) {
			if($string[$i] === $special_chars[$key]) {
				$flag = false;
			} else {
				// NOTHING
			}
		}
	}
	
	return $flag;
}

function connect_user($database, $login, $password) {		// Connecting the user & returning any error
	$value_for_np = pwd_ok($database, $login, $password);
	$value_nickname = user_exists($database, $login);
	
	if($value_nickname === false) {		// If the user doesn't exist
		return "Error : This user doesn't exist";
	} else if($value_for_np === false) {		// If the nickname and the password doesn't match
		return "Error : Bad combination nickname / password";
	} else {		// If everything's fine : connecting the user
		$req = $database->prepare('SELECT id FROM users WHERE nickname LIKE :login');
		$req->execute(array("login" => $login));
		$line = $req->fetch();
		$id = $line['id'];
		$req->closeCursor();
		$_SESSION['user'] = $line['id'];
		return "OK";
	}
	
}

function pwd_ok($database, $pseudo, $pwd) {		// Checking if the password matches with the database
	$req = $database->prepare("SELECT PASSWORD FROM users WHERE nickname=:pseudo");
	$req->execute( array("pseudo" => $pseudo) );
	$line = $req->fetch();
	
	$req->closeCursor();
	
	if($line["PASSWORD"] == $pwd) {
		return true;
	} else {
		return false;
	}
}

function register_user($database, $login, $password) {		// Signing the user in
	$value_chars = tests_max_chars($database, $login, $password);		// CHecking if there is any special character in nickname or password
	$value_existence = user_exists($database, $login);		// Checking if user exists
	$value_space = is_space($database, $login, $password);
	
	if($value_existence === true) {		// If the nickname already exists, the sign in can't be done
		return "Error : This nickname already exists.</br>";
	} else if($value_chars !== false) {
		return "Error : Too many characters. <br/> The nickname can't exceed 15 characters, the password can't exceed 30 characters.<br/>";
	} else if($value_space !== false) {
		return "Error : No space allowed in nickname or password. <br/>";	
	} else {
		$req = $database->prepare('INSERT INTO USERS(NICKNAME, PASSWORD) VALUES(:login, :password)');
		$req->execute(array(
			'login' => $login,
			'password' => $password));
		return "Your profile is ready.";
	}
}

function tests_max_chars($database, $login, $password) {		// Checking if there ain't too many characters in nickname or password
	$max_char_pwd = 30;
	$max_char_nick = 15;
	$bool_val = false;
	
	$char_login = strlen($login);
	$char_pwd = strlen($password);
	
	if($char_login > $max_char_nick OR $char_pwd > $max_char_pwd) {
		$bool_val = true;
	} else {
		// Nothing
	}
	
	return $bool_val;
}

function is_space($database, $login, $password) {		// Checking if there ain't no space in nickname or password
	$bool_value_nick = false;
	$bool_value_pwd = false;
	$bool_final_value = false;
	
	$string_aux = str_split($login);
	$string_aux2 = str_split($password);
	
	for($i = 0; $i < count($string_aux); $i++) {		// Checking in nickname
		if($string_aux[$i] === " ") {
			$bool_value_nick = true;
		} else {
			// Nothing
		}
	}

	for($j = 0; $j < count($string_aux2); $j++) {		// Checking in password
		if($string_aux2[$j] === " ") {
			$bool_value_pwd = true;
		} else {
			// Nothing
		}
	}
	
	if($bool_value_nick === true OR $bool_value_pwd === true) {		// If there is any space, the signing can't be done.
		$bool_final_value = true;
	} else {
		// Nothing
	}
	
	return $bool_final_value;
}

?>
