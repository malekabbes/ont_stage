<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Redirection</title>
  <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../css/style.css">

</head>
<body>

  
 <div class="loading-log">
 <center>
<img src="../img/loading.gif" alt="loading">
<h2 id='redirect'></h2>
</center>
</div>
 </div>
<?php echo("
<script>
var i = 0;
var txt = 'Vous etes en cours de redirection . . .'; 
var speed = 30; 

function typeWriter() {
  if (i < txt.length) {
    document.getElementById('redirect').innerHTML += txt.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  }
}
typeWriter();
setInterval(function(){
    window.location.href = '../index.php';
},3000);

</script>

"); ?>

</body>
</html>