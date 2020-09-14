<?php
session_start();
session_unset();
session_destroy();
echo("<center><h4 id='redirect'></h4></center>");
echo("
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
},2000);

</script>

");
?>