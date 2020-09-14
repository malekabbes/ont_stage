<?php session_start();
    require_once("DBController.php");
    include("inc/login-inc.php");
    if (isset($_SESSION["loggedin"])=="oui"){
        echo '<h1>Vous etes deja connecté</h1>';
        die();
    } else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
        <title>ONT - Inscription</title>
<link href="css/aos.css" rel="stylesheet">
<link rel="stylesheet" href="css/ui.css" />
<link rel="stylesheet" href="css/style.css">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>


</head>
<script>
function checkmail() {
	jQuery.ajax({
	url: "checkmail.php",
	data:'email='+$("#email").val(),
	type: "POST",
	success:function(data){
        $("#email-availability-status").html(data);
        
        

	},
	error:function (){}
	});
}
function checkphone() {
	jQuery.ajax({
	url: "checkphone.php",
	data:'mobile='+$("#test").val(),
	type: "POST",
	success:function(data){
        $("#phone-availability-status").html(data);

	},
	error:function (){}
	});
}

</script>
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

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="ins uk-container" data-aos="flip-right">
<img class="logo" src="img/teledif.gif"></img>
<div class="wosst">
<div class="inp uk-inline" >

            <span class="uk-form-icon" uk-icon="icon: user"></span>
            <input name="nom" class="uk-input" type="text" placeholder="Votre nom et prenom">
        </div>   

        <div class="inp uk-inline">
            <span class="uk-form-icon" uk-icon="icon: phone"></span>
            <input id="test" name="mobile" class="uk-input" type="text" placeholder="Votre numero de telephone" onBlur="checkphone()">
        </div>
        <span id="phone-availability-status"></span>
        <div class="inp uk-inline">
            <span class="uk-form-icon" uk-icon="icon: mail"></span>
            <input id="email" name="email" class="uk-input"  type="mail" placeholder="Votre email" onBlur="checkmail()">
        </div>
        <span id="email-availability-status"></span>
        <div class="inp uk-inline">
            <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
            <input id="pass" name="pass" class="uk-input" type="password" placeholder="Votre mot de passe">
           
        </div>
        <center><progress id="progress" value="0" max="100">70</progress>
        <div class="pr">
        <p id="proglabel" style="border-radius:15px;margin-top:0px;"></p><center>
        </div>
        
           <center><button name="reg" class="conex uk-button uk-button-primary">Inscription</button></center>
           
           
           
           
<?php 
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
 include("inc/db.php");
 $ont = $_POST;
    $username = filter_var($ont["nom"],FILTER_SANITIZE_STRING);
    $phone = filter_var($ont["mobile"],FILTER_SANITIZE_NUMBER_INT);
    $email = filter_var($ont["email"],FILTER_SANITIZE_EMAIL);
    $password = filter_var($ont["pass"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
// Database connexion
if ($mysqli->connect_error){
    echo ("error");
}
// ?>
<?php  
if(isset($_POST["reg"])) { 
 include_once("validate.php");

if (empty($username)){
    ?>
  <script>
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Vérifier votre nom!',
})
</script>
<?php 
}

elseif (empty($phone)|| !filter_var($phone,FILTER_VALIDATE_INT) || $validphone==FALSE){
    ?>
      <script>
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Verifier votre telephone!',
})
</script>
<?php }
elseif (empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL) || $validmail==FALSE){
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
}).then(function(){
    window.location.href = 'index.php';
})
</script> 
<?php } } } }?>
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
<script src="js/jquery.min.js"></script>
<script src="js/progbar.js"></script>

</html>