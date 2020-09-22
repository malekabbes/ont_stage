<?php
include_once("../DBController.php");
if (isset($_POST["setting"])){
$_GET["id"]==$uid;

    $setting= new DBController();
$sql_mem="SELECT username,email,poste,conge FROM utilisateurs WHERE ID='$uid'";
$output=mysqli_query($setting->conn,$sql_mem);
$row=mysqli_fetch_assoc($output);
    $edit_user=$row["username"];
    $edit_mail=$row["email"];
    $edit_poste=$row["poste"];
    $edit_conge=$row["conge"];

}

?>
