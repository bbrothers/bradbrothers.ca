<?php
function clean_input($input){
	return strip_tags(trim($input));
}
if(!empty($_POST) ){
	
	//form validation vars
	$formok = true;
	$errors = array();
	
	//sumbission data
	$ipaddress = $_SERVER['REMOTE_ADDR'];
	$date = date('d/m/Y');
	$time = date('H:i:s');
	
	//form data
	$name = clean_input($_POST['name']);	
	$email = clean_input($_POST['email']);
	$message = clean_input($_POST['message']);
	
	//validate form data
	
	//validate name is not empty
	if(empty($name)){
		$formok = false;
		$errors[] = "Please enter your name";
	}
	
	//validate email address is not empty
	if(empty($email)){
		$formok = false;
		$errors[] = "You have not entered an email address";
	//validate email address is valid
	}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$formok = false;
		$errors[] = "You have not entered a valid email address";
	}
	
	//validate message is not empty
	if(empty($message)){
		$formok = false;
		$errors[] = "You have not entered a message";
	}
	//validate message is greater than 20 charcters
	elseif(strlen($message) < 20){
		$formok = false;
		$errors[] = "Your message must be greater than 20 characters";
	}
	
	//send email if all is ok
	if($formok){

		$headers = "From: {$email}". "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		$emailbody = "You have recieved a new message from  your website.
					  Name: {$name}
					  Email Address: {$email}
					  Message: {$message}
					  This message was sent from the IP Address: {$ipaddress} on {$date} at {$time}";
		
		mail("BradBrothers86@gmail.com","BradBrothers.ca",$emailbody,$headers);
	}
	
	//what we need to return back to our form
	$returndata = array(
		'posted_form_data' => array(
			'name' => $name,
			'email' => $email,
			'message' => $message
		),
		'form_ok' => $formok,
		'errors' => $errors
	);
		
	
	//if this is not an ajax request
	if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest'){
		//set session variables
		session_start();
		$_SESSION['cf_returndata'] = $returndata;
		
		//redirect back to form
		header('location: ' . $_SERVER['HTTP_REFERER']);
	}
}
?>