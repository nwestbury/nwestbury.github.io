<?php

require_once("recaptchalib.php");

// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])		||
   empty($_POST['captcha'])		||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "Please fill all fields!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
$captcha = $_POST['captcha'];

// Captcha Stuff
$secret = "6LfEjBMTAAAAAONhAaNaeD0tSGO1VR3qeEo5nS9v";
$reCaptcha = new ReCaptcha($secret);
$response = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"], $captcha);

if($response == null || !$response->success){
    echo "Captcha Failed";
    return false;
}


// Create the email and send the message
$to = '5westbury5@gmail.com'; //'nwestbury@nwestbury.com';
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
$headers = "From: noreply@nwestbury.com\n";
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;			
?>