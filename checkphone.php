<?php
require_once("DBController.php");
$db_handle = new DBController();
if (!empty($_POST["mobile"])) {
  $query = "SELECT * FROM utilisateurs WHERE phone='" . $_POST["mobile"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<span class='status-not-available'>Votre Numero est deja utilisé </span>";
      echo "<script><script>$('.conex').prop('disabled',true);</script>";

    }else{
      echo "<span class='status-available'> Votre Numero est disponible</span>";
      echo "<script>$('.conex').prop('disabled',false);</script>";
    }
}
  ?>