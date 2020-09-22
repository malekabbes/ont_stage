<?php
include("db.php");
if (isset($_POST["edituser"])){
$edituserid = $_POST["IDs"];
$username=$_POST["username"];
$email=$_POST["email"];
$conge=$_POST["conge"];
$updateemp = "UPDATE utilisateurs SET username='$username',email='$email',conge='$conge' WHERE id='$edituserid'";

if (mysqli_query($mysqli,$updateemp)) {
    echo "<script> Swal.fire({position: 'top-end',icon: 'success',title:'Les informations ont été mise a jour',showConfirmButton: false,timer: 1500}).then(function(){window.location.href='liste-emp.php'});</script>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
  }

}



?>
