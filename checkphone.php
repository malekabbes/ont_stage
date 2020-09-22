<?php
require_once("DBController.php");
$db_handle = new DBController();
$mob=$_POST["mobile"];
if (!empty($mob)) {
  $query = "SELECT * FROM utilisateurs WHERE phone='$mob'";
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