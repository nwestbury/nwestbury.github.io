<?php	
$to = '5westbury5@gmail.com'; //'nwestbury@nwestbury.com';
$email_subject = "Website Contact Form: Test";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: whatever\n\nEmail: test@example.ca\n\nMessage:\n\nLOLOL";
$headers = "From: noreply@nwestbury.com\n";
$headers .= "Reply-To: $to";
mail($to,$email_subject,$email_body,$headers);
return true;			
?>