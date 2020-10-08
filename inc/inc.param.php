<?php
include("db.php");
if (isset($_POST["param-valid"])){
$p_username=$_POST["username"];
$p_email=$_POST["email"];
$p_phone=$_POST["phone"];
$p_password=$_POST["password"];
$p_id=$_SESSION['myid'];
$passverify = "SELECT password FROM utilisateurs WHERE email='$p_email'";
$pwverif=password_verify($p_password,$row['password']);
if ($pwverif == TRUE){
    echo"<script>
         Swal.fire({
          position: 'top-end',
          icon: 'error',
          title: 'Veuillez chosir un mot de passe different de votre mot de passe actuel',
          showConfirmButton: false,
          timer: 1500
        })</script>";
}
$mailverify = "SELECT * FROM utilisateurs WHERE email='$p_email'";
$mailv=mysqli_query($mysqli,$mailverify);
$row=mysqli_fetch_assoc($mailv,MYSQLI_ASSOC);
if(mysqli_num_rows($mailv)==1){
  echo"<script>
  Swal.fire({
   position: 'top-end',
   icon: 'error',
   title: 'Votre email existe Déja',
   showConfirmButton: false,
   timer: 1500
 })</script>";

}
elseif (empty($_POST["password"])){

  $param = "UPDATE utilisateurs SET username='$p_username',email='$p_email',phone='$p_phone' WHERE ID='$p_id'";
}
elseif($pwverif === FALSE) {
    $newpass=password_hash($p_password,PASSWORD_DEFAULT);   
$param = "UPDATE utilisateurs SET username='$p_username',email='$p_email',phone='$p_phone',password='$newpass' WHERE ID='$p_id'";
}
if (mysqli_query($mysqli,$param)) {
    echo "<script> 
    Swal.fire({position: 'top-end',icon: 'success',title: 'Votre profile a été bien modifiée',showConfirmButton: false,timer: 1500}).then(function(){window.location.href='../inc/dec.php'});</script>";
  } else {
    echo "<p style='color:red;'>Veuillez Changer votre email saisie</p> " . $sql . "<br>" . mysqli_error($mysqli);
  }

}

?>
