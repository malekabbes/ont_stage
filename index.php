<?php 
session_start();
require_once("inc/db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <title>ONT - AUTH</title>
<link href="css/aos.css" rel="stylesheet">
<link rel="stylesheet" href="css/ui.css" />
<link rel="stylesheet" href="css/style.css">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
</head>

<body>

<nav class="uk-navbar-container uk-margin" uk-navbar>
    <div class="uk-navbar-center">

        <div class="uk-navbar-center-left"><div>
            <ul class="uk-navbar-nav">
                <li class="uk-active"><a href="#"><b>Acceuil</b></a></li>
              
            </ul>
        </div></div>
        <a class="uk-navbar-item uk-logo" href="#"><img src="img/ont.jpg"></a>
    

   

    </div>
</nav>
      <?php 

            if(!isset($_SESSION["access"]) || $_SESSION["access"] != "oui") {
   ?>     
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="log uk-container" data-aos="flip-right">
<img class="logo" src="img/teledif.gif"></img>
<div class="wosst">
   
        <div class="inp uk-inline">
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            <input name="email" class="uk-input" type="mail" placeholder="Votre email">
        </div>

        <div class="inp uk-inline">
            <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
            <input name="password" class="uk-input" type="password" placeholder="Votre mot de passe">
        </div>
        
           <center><button name="log" class="conex uk-button uk-button-primary">Connexion</button></center>
 

         <?php  require_once("inc/login-inc.php"); ?>


           <div class="inscrit">
           <h6 class="signup">J'ai pas un compte , <a href="inscription.php"><u>Je veut creer un</u></a> </h6> 
</div>


</div>
</div>
</form>
            <?php } ?>


    
</body>
<!-- UIkit JS -->

<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/js/uikit-icons.min.js"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="js/aos.js"></script>
<script src="js/anim.js"></script>
</html