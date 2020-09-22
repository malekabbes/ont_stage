<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

 if(isset($_POST["sendtoall"]))
{
    require "../../vendor/phpmailer/phpmailer/src/Exception.php";
    require "../../vendor/phpmailer/phpmailer/src/phpmailer.php";
    require "../../vendor/phpmailer/phpmailer/src/SMTP.php";
    
    
    include_once("../../DBController.php"); 
    $cnx = new DBController();

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;
    $mail->Username ='onttunisia@gmail.com';
    $mail->Password = 'malek123';
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->setfrom('onttunisia@gmail.com','ONT Tunisie');
    $sqlemail = "SELECT email FROM utilisateurs  ";
    $rslts = mysqli_query($cnx->conn,$sqlemail);
    while($row = mysqli_fetch_assoc($rslts))
    {
        $mail->addAddress($row["email"]);
    }
    $mail->Subject = "Nouvelle actualité : '$title'";
    $mail->isHTML(true);
    $body = $content;
    $mail->Body = $body ;
    $mail->send();
    echo 'Message has been sent';
    } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
 }

?>