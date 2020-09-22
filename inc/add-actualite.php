<?php
include("db.php");

if (isset($_POST["valid-btn"])){
  $title=$_POST["titre"];
  $content=$_POST["news-content"];
$actu = "INSERT INTO actualite (titre,content) VALUES ('$title','$content')";
//mysqli_query($mysqli,$actu); 

if (mysqli_query($mysqli,$actu)) {
    echo "
    <script>
     Swal.fire({
       position: 'top-end',
       icon: 'success',
       title: 'Votre actualité a été bien ajoutée',
       showConfirmButton: false,
       timer: 1500
      }).then(function(){window.location.href='actualite.php'});</script>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
  }

}



?>
