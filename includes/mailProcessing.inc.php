<?php

/* ***Functions*** */

$suspect = false;
$mailSent = false;
$pattern = '/Content-type:|Bcc:|Cc:/i';

function isSuspect($array, $pattern, &$suspect) { // note that suspect is pass by reference
	
	foreach($array as $item) {
		if(is_array($item)) {
			// recursively call the isSuspect function
			isSuspect($item, $pattern, $suspect);
		} else {
			// if not, then check whether it is a suspect
			if(preg_match($pattern, $item)) {
				$suspect = true;
			}
		}
	}
}

isSuspect($_POST, $pattern, $suspect); // check whether there is a suspicious phrase

if(!$suspect) {
	// loop through the variables of the $_POST superglobal
	foreach($_POST as $key => $value) {
	// assign the value to a temporary variable
	$temp = is_array($value) ? $value : trim($value);
	
		// if the key is a required field and it is empty, we need to add it to the missing array
		if(empty($value) && in_array($key, $required)) {
			$missing[] = $key;
		} else if(in_array($key, $expected)) { // if the value is in the expected array, create a new variable with the keyname and assign temp to it
		
			${$key} = $temp;
		}
	
	}
}

// Check whether the email is in the correct format
if(!$suspect && !empty($email)) {
	$validEmail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	
	if($validEmail) {
		$headers .= "\r\nReply-To: $validEmail";
	} else {
		$errors['email'] = true;
	}
}

// Populate the $message variable 
if(!$suspect && !$errors && !$missing) {
	$message = '';

	foreach($expected as $item) {
		if(isset(${$item}) && !empty(${$item})) {
			$value = ${$item};
		} else {
			$value = 'Not Selected';
		}
		
		// if it's an array, output the elements as a comma separated list
		if(is_array($value)) {
			$value = implode(", ", $value);
		}
		
		$item = ucfirst(str_replace(array("_", "-"), " ", $item)); // replace and underscore or a dash with a space
		
		$message .= "{$item}: $value \r\n\r\n";
	}
	
	$message = wordwrap($message, 70);
	if(!($mailSent = mail($to, $subject, $message, $headers))) {
		$errors['mailTo'] = true;
	}
	
}



