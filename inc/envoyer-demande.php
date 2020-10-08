<?php
include("db.php");
if (isset($_POST["demande_valid"])){
    $dep=$_SESSION["departement"];
    $nom_dem=$_POST["username"];
    $mail_dem=$_POST["email"];
    $titre_dem=mysqli_real_escape_string($mysqli,$_POST["titre_dem"]);
    $contenu_dem=$_POST["contenu_dem"];
    if (empty($nom_dem) || empty($mail_dem) || empty($titre_dem) || empty($contenu_dem) ){
      echo "
      <script>
       Swal.fire({
         position: 'top-end',
         icon: 'error',
         title: 'Veuillez Remplir tous les champs',
         showConfirmButton: false,
         timer: 1500
        })</script>
        ";
    }
    else{
$verifmail="SELECT * FROM utilisateurs WHERE email='$mail_dem'";
$vmail=mysqli_query($mysqli,$verifmail);
$row=mysqli_fetch_assoc($vmail,MYSQLI_ASSOC);
if (mysqli_num_rows($vmail)==0){
    echo "
    <script>
     Swal.fire({
       position: 'top-end',
       icon: 'error',
       title: 'Votre email n\'existe pas',
       showConfirmButton: false,
       timer: 1500
      })</script>
      ";
}
else{
    $envdemande= "INSERT INTO demandes (username,email,titre,contenu,dpt) VALUES ('$nom_dem','$mail_dem','$titre_dem','$contenu_dem','$dep')";
  if(mysqli_query($mysqli,$envdemande)){
    echo "
    <script>
     Swal.fire({
       position: 'top-end',
       icon: 'success',
       title: 'Votre demande a été bien envoyée',
       showConfirmButton: false,
       timer: 1500
      }).then(function(){window.location.href='demande-envoye.php'});</script>";
  }
 else {
    echo "Error: " . $envdemande . "<br>" .mysqli_error($mysqli);
  }
}
}
}