<?php
include("db.php");
if (isset($_POST["change-btn"])){
  $THEactuid = $_POST["IDs"];
$title=$_POST["titre"];
$content=$_POST["content"];
$updateactu = "UPDATE actualite SET titre='$title',content='$content' WHERE id='$THEactuid'";

if (mysqli_query($mysqli,$updateactu)) {
    echo "<script> 
    Swal.fire({position: 'top-end',icon: 'success',title: 'Votre actualité a été bien modifiée',showConfirmButton: false,timer: 1500}).then(function(){window.location.href='actualite.php'});</script>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
  }

}
elseif(isset($_POST["remove-btn"])){
  $THEactuid = $_POST["IDs"];
        $delete="DELETE from actualite where id='$THEactuid'";
         mysqli_query($mysqli,$delete);
         echo"<script>
         Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'L\'actualité a été bien supprimée',
          showConfirmButton: false,
          timer: 1500
        }).then(function(){window.location.href='actualite.php'})
        </script>
      ";
      
}



?>
