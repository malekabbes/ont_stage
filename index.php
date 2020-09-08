<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONT - Accueil</title>
<link href="css/aos.css" rel="stylesheet">
<link rel="stylesheet" href="css/ui.css" />
<link rel="stylesheet" href="css/style.css">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">




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
        <div class="uk-navbar-center-right"><div>
            <ul class="uk-navbar-nav">
                <li><a style="display:none;" href="#">Déconnexion</a></li>
            </ul>
        </div></div>

    </div>
</nav>
<form method="get" action="login.php">
<div class="log uk-container" data-aos="flip-right">
<img class="logo" src="img/teledif.gif"></img>
<div class="wosst">
   
        <div class="inp uk-inline">
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            <input name="email" class="uk-input" type="mail" placeholder="Votre email">
        </div>
   


        <div class="inp uk-inline">
            <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
            <input name="pass" class="uk-input" type="password" placeholder="Votre mot de passe">
        </div>
        
           <center><button class="conex uk-button uk-button-primary">Connexion</button></center>
           <div class="inscrit">
           <h6 class="signup">J'ai pas un compte , <a href="inscription.php"><u>Je veut creer un</u></a> </h6> 
</div>
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
</html