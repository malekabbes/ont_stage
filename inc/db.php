<?php 
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //mysql info
    $mysql_host ="localhost";
    $mysql_username="root";
    $mysql_password="root";
    $mysql_database="ont_stage";
    $mysqli = mysqli_connect($mysql_host, $mysql_username, $mysql_password, $mysql_database);
  }
 // CONDITIONS
 
 ?>