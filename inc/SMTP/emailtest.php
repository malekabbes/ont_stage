<?php

use PHPMailer\PHPMailer\PHPMailer;

include "../../vendor/phpmailer/phpmailer/src/Exception.php";
include "../../vendor/phpmailer/phpmailer/src/phpmailer.php";
include "../../vendor/phpmailer/phpmailer/src/SMTP.php";
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions
try{
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; 
$mail->SMTPAuth = true;
$mail->Username ='onttunisia@gmail.com';
$mail->Password = 'malek123';
$mail->SMTPSecure = "tls";
$mail->Port = 587;

$mail->setfrom('onttunisia@gmail.com','ONT Tunisie');
$mail->addAddress('malek@mailHazard.com');  
$mail->Subject = "Nouvelle actualité : titree";
$mail->isHTML(true);
$body = "hello";
$mail->Body = $body ;
$mail->send();
echo 'Message has been sent';
} catch (Exception $e) {
echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>