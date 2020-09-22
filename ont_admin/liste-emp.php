<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['usertype'] != 'ADMIN') {
  echo '<h1>Vous etes pas authorisé de consulter cette page</h1>';
  //maybe redirect to login page
  die();
}
include("../inc/login-inc.php");
?>
<html>
<title>ONT - Admin</title>
<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="../js/time.js"></script>
<script src="../js/editemp-input-set.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../css/ui.css" />

<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
html,body {background:white;}
</style>
<body class="w3-light-grey">

<!-- Top container -->

<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span id="time" class="w3-bar-item w3-right"></span>
</div>
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="../img/ont-user.jpg" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
    <span>Bonjour, <strong><?php echo $_SESSION["username"]; ?></strong></span><br>
            <p><i class="dpt fas fa-building"></i>&nbsp;&nbsp;<?php echo $_SESSION["departement"] ?></p>



    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="interface.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Accueil</a>
    <a href="param.php" class="w3-bar-item w3-button w3-padding " ><i class="fa fa-cog fa-fw"></i>  Settings</a>
    <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Les Employés</a>
    <a href="actualite.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i> Actualités</a>  </div>
    <br><br><br>
    <form action="../inc/dec.php" method="POST">
  <center><button name="dec" class="w3-button w3-red">Se Deconnecter</button></center>
</form>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main bg" style="height:max-height;margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px;background:white;">
    <h5 class="ont-dash"><b><i class="fas fa-users-cog"></i>&nbsp;&nbsp;ONT - Liste Des Employés </b></h5>
  </header>
  <br>

         <form class="uk-search uk-search-default">
    <input class="uk-search-input" type="search" placeholder="Search...">
</form>
<table class="uk-table uk-table-hover uk-table-divider uk-overflow-auto ont-tab">
    <thead>
        <tr>
            <th>Matricule</th>
            <th>Nom Complét</th>
            <th>E-Mail </th>
            <th>Congé</th>
        </tr>
    </thead>
    <tbody>
    <?php
         include("../inc/emp-tab.php");?>
    </tbody>
</table>
<form action="" id="formD" method="POST">
  <center>
   <?php include("../inc/setting-emp.php"); ?>
      <fieldset class="edituser" style="display:none;">

        <legend class="uk-legend">Modifier les coordonnées </legend>

        <div class="uk-margin">
            <input name="username" class="addn uk-input" type="text" placeholder="Modifier le nom" value="<?php $edit_username?>">
        </div>

        <div class="uk-margin">
            <input name="email" class="addn uk-input" type="mail" placeholder="Modifier l'Email " value="<?php $edit_mail?>">
        </div>
        <div class="uk-margin">
        <input name="poste" class="addn uk-input" type="text" placeholder="Modifier la Poste" value="<?php $edit_poste?>">
        </div>
        <div class="uk-margin">
        <input name="conge" class="addn uk-input" type="date" placeholder="Modifier la date du congé" value="<?php $edit_conge?>">
        </div>
        <center><button name="edituser" class="validate-btn uk-button uk-button-primary" type="submit">Valider</button></center>

    </fieldset>
 
</center>
</form>



  <!-- Footer -->


  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>

</body>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/js/uikit-icons.min.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/edit-emp.js"></script>
</html>