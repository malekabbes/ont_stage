<?php
require_once("DBController.php");
$db_handle = new DBController();

if((!empty($_POST["email"]))) {
  $query = "SELECT * FROM utilisateurs WHERE email='" . $_POST["email"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<span class='status-not-available'>Votre email est deja utilisé </span>";
    }else{
      echo "<span class='status-available'> Votre email est disponible</span>";
      echo "<script>$('.conex').prop('disabled',false);</script>";
    }

}
?>