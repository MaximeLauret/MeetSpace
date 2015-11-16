
<?php

// CLASS formControl
// Cette class est une bibliothéque de méthode pour tester les formulaires HTML


class formControl {

	

	public function is_special_chars($string) {	// Checking if there is any special character in nickname
		$special_chars = array("%", "/", "<", ">", "(", ")", ";", "[", "]",":");
		$bool_val = true;
				
		for($i = 0; isset($string[$i]); $i++) {
			foreach($special_chars as $key => $value) {
				if($string[$i] === $special_chars[$key]) {
					$bool_val = false;
				} else {
					// NOTHING
				}
			}
		}		
		return $bool_val;
	}	

	function is_max_chars($string, $maxLen) {		// Checking if there ain't too many characters in nickname or password
		$bool_val = false;
		
		$char_string = strlen($string);
		
		if($char_string > $maxLen) {
			$bool_val = true;
		} else {
			// Nothing
		}
		
		return $bool_val;
	}

	function is_space($string) {		// Checking if there ain't no space in nickname or password
		$bool_value = false;
		
		$string_aux = str_split($string);
		
		for($i = 0; $i < count($string_aux); $i++) {		// Checking in nickname
			if($string_aux[$i] === " ") {
				$bool_value = true;
			} else {
				// Nothing
			}
		}
		return $bool_value;
	
}

