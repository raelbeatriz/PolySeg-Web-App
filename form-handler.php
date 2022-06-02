<?php
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];
$additional_details = $_POST['details'];

$email_from = 'pentatronics.polyseg@gmail.com';

$email_subject = 'New Form Submission';

$email_body = "User Name: $name.\n". 
                "User Email: $visitor_email.\n". 
                "User Message: $message.\n". 
                "User details: $additional_details.\n";

$to = 'rlbtrz@gmail.com';

$headers = "From: $visitor_email \r\n";

mail($to,$email_subject,$email_body,$headers);

header("Location: contact.html");


?>