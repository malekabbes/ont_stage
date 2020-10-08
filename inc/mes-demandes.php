<?php
include("../DBController.php");
$medem = new DBController();
$myname=$_SESSION["username"];
$mesdem="SELECT titre,contenu,status FROM demandes WHERE username='$myname'";
$demandesenv=mysqli_query($rtscon = $medem->conn,$mesdem);
// echo "debug error".mysqli_error($rtscon);
while ($row=mysqli_fetch_assoc($demandesenv)){
  $md_titre=$row["titre"];
  $md_contenu=$row["contenu"];
  $md_status=$row["status"];

  echo "<tr>
  <td>$md_titre</td>
  <td>$md_contenu</td>";

    if($md_status==0)echo "<td><span class='uk-label uk-label-warning'>En cours de traitement</span></td></tr>";
    elseif($md_status==1)echo "<td><span class='uk-label uk-label-success'>Approuvé</span></td></tr>";
    elseif($md_status==2)echo "<td><span class='uk-label uk-label-danger'>refusé</span></td></tr>";
    else echo "<td>ERROR</td>";
}











?>