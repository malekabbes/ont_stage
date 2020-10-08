<?php
include("../DBController.php");
$drec = new DBController();
$sesdep=$_SESSION["departement"];
$demrecu="SELECT ID,username,titre,contenu,status FROM demandes WHERE dpt='$sesdep'";
$demandesrecu=mysqli_query($drec->conn,$demrecu);
// echo "debug error".mysqli_error($rtscon);
while ($row=mysqli_fetch_assoc($demandesrecu)){
  $dr_id=$row["ID"];
  $dr_nom=$row["username"];
  $dr_titre=$row["titre"];
  $dr_contenu=$row["contenu"];
  $dr_status=$row["status"];

  echo "<tr>
  <td>$dr_id</td>
  <td>$dr_nom</td>
  <td>$dr_titre</td>
  <td>$dr_contenu</td>
";
  if ($dr_status==2){
    echo "<td><span class='uk-label uk-label-danger'>refusé</span></td></tr>";
  }
  elseif ($dr_status==1){
    echo "<td><span class='uk-label uk-label-success'>Approuvé</span></td></tr>";
  }
  else{
      echo"<td><img class='approve' style='width:29px;height:21px;' src='../img/approve.png'></img>
              <img class='decline' style='width:29px;height:21px;' src='../img/decline.png'></img></td></tr>";

  }

 
}











?>