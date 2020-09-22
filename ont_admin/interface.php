<?php
session_start();
include("../DBController.php");
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="../js/time.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  <style>
  html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
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
    <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Accueil</a>
    <a href="param.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a>
    <a href="liste-emp.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Les Employés</a>
    <a href="actualite.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i> Actualités</a>  </div>
    <br><br><br>
    <form action="../inc/dec.php" method="POST">
  <center><button name="dec" class="w3-button w3-red">Se Deconnecter</button></center>
</form>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5 class="ont-dash"><b><i class="fas fa-user-shield"></i>&nbsp;&nbsp;ONT - Panneau d'Administration </b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i  class="fa fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>N/A</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Messages</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php include("../inc/countact-inc.php");?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Actualités</h4>
      </div>
    </div>

    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php include("../inc/countusr.inc.php");?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Users</h4>
      </div>
    </div>
  </div>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
        <h5>Access au Caméras (81.142.188.76) - TEST </h5>
        <img src="http://81.142.188.76//mjpg/video.mjpg" style="width:100%" alt="Google Regional Map">
      </div>
      <div class="w3-twothird">
        <h5>Activités</h5>
        <table class="w3-table w3-striped w3-white">
          <tr>
            <td><i class="fa fa-user w3-text-blue w3-large"></i></td>
            <td>test</td>
            <td><i>10 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-bell w3-text-red w3-large"></i></td>
            <td>test</td>
            <td><i>15 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-users w3-text-yellow w3-large"></i></td>
            <td>test</td>
            <td><i>17 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-comment w3-text-red w3-large"></i></td>
            <td>test</td>
            <td><i>25 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td>test</td>
            <td><i>28 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-laptop w3-text-red w3-large"></i></td>
            <td>test</td>
            <td><i>35 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-share-alt w3-text-green w3-large"></i></td>
            <td>test</td>
            <td><i>39 mins</i></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>General Stats</h5>
    <p>New Visitors</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-green" style="width:25%">+25%</div>
    </div>

    <p>New Users</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-orange" style="width:50%">50%</div>
    </div>

    <p>Bounce Rate</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-red" style="width:75%">75%</div>
    </div>
  </div>
  <hr>

  
  <hr>

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <p>Developpé Par Malek Abbes</p>
  </footer>

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
</html>
