<?php
$actrecente=new DBController();
include("login-inc.php");
$sesdep=$_SESSION["departement"];
$sql="SELECT username,ID,entree,sortie,duree FROM utilisateurs WHERE departement='$sesdep'";

$sql=mysqli_query($actrecente->conn,$sql);
// Compteur du tableau 
while($row=mysqli_fetch_assoc($sql))
{
    $nom=$row["username"];
    $nomemp="&nbsp;&nbsp;<span style='font-size:10px;' class='uk-label uk-label-success'>$nom</span>";
    $uid=$row["ID"].$nomemp;
    $entree_act=$row["entree"];
    $sortie_act=$row["sortie"];
    $duree_act=$row["duree"];
   echo"
   <tr>
    <td><i class='fa fa-user w3-text-blue w3-large'></i>$uid</td>
    <td>$entree_act</td>
    <td>$sortie_act</td>
    <td>$duree_act</td>
    </tr>";

    
}









?>