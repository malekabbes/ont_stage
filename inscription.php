<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONT - Inscription</title>
<link href="css/aos.css" rel="stylesheet">
<link rel="stylesheet" href="css/ui.css" />
<link rel="stylesheet" href="css/style.css">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>


</head>

<body>
<nav class="uk-navbar-container uk-margin" uk-navbar>
    <div class="uk-navbar-center">

        <div class="uk-navbar-center-left"><div>
            <ul class="uk-navbar-nav">
                <li class="uk-active"><a href="index.php"><b>Acceuil</b></a></li>
              
            </ul>
        </div></div>
        <a class="uk-navbar-item uk-logo" href="#"><img src="img/ont.jpg"></a>
        <div class="uk-navbar-center-right"><div>

        </div></div>

    </div>
</nav>
<form method="POST" action="inscription.php">
<div class="ins uk-container" data-aos="flip-right">
<img class="logo" src="img/teledif.gif"></img>
<div class="wosst">
<div class="inp uk-inline" >
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            <input name="nom" class="uk-input" type="text" placeholder="Votre nom et prenom">
        </div>   

        <div class="inp uk-inline">
            <span class="uk-form-icon" uk-icon="icon: phone"></span>
            <input name="mobile" class="uk-input" type="text" placeholder="Votre numero de telephone">
        </div>
        <div class="inp uk-inline">
            <span class="uk-form-icon" uk-icon="icon: mail"></span>
            <input name="email" class="uk-input"  type="mail" placeholder="Votre email">

        </div>
   
        <div class="inp uk-inline">
            <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
            <input name="pass" class="uk-input" type="password" placeholder="Votre mot de passe">
        </div>
        
           <center><button name="reg" class="conex uk-button uk-button-primary">Inscription</button></center>
           
           
           
           
  <?php 
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
 include("inc/db.php");
// Database connexion
$mysqli = new mysqli($mysql_host,$mysql_username,$mysql_password,$mysql_database);
if ($mysqli->connect_error){
    echo ("error");
}
// ?>
<?php  
if(isset($_POST["reg"])) { 

if (empty($username)){
    ?>
  <script>
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Vérifier votre nom!',
})
</script>
<?php }
elseif (empty($phone)|| !filter_var($phone,FILTER_VALIDATE_INT)){
    ?>
      <script>
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Verifier votre telephone!',
})
</script>
<?php }
elseif (empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
    ?>
        <script>
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Verifier votre email !',
})
</script>
<?php
}
elseif (empty($password)) {
    ?>
          <script>
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'verifier votre mot de passe!',
})
</script>
<?php } 
else {
	//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
$statement=$mysqli->prepare("INSERT INTO utilisateurs (username,phone,email,password) VALUES(?,?,?,?)");
$statement->bind_param('siss',$username,$phone,$email,$password);
$statement->execute();
?>
          <script>
              var nom ="<?php print $username ?>"
              var done =" <?php print "Bonjour ". $username ."! , Votre compte est en cours d'etre validé , consultez votre email ".$email." ... "?>"
          Swal.fire({
  icon: 'success',
  title: 'Felicitations !',nom,
  text: done
})
</script> 
<?php } } } ?>
</div>

</div>
</form>

    
</body>
<!-- UIkit JS -->

<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/js/uikit-icons.min.js"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="js/aos.js"></script>
<script src="js/anim.js"></script>
</html>