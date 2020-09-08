<?php 
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //mysql info
    $mysql_host ="localhost";
    $mysql_username="root";
    $mysql_password="root";
    $mysql_database="ont_stage";
    $ont = $_POST;
    $username = filter_var($ont["nom"],FILTER_SANITIZE_STRING);
    $phone = filter_var($ont["mobile"],FILTER_SANITIZE_NUMBER_INT);
    $email = filter_var($ont["email"],FILTER_SANITIZE_EMAIL);
    $password = filter_var($ont["pass"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
  }
 // CONDITIONS
 
 ?>