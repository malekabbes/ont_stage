<?php
include_once("../DBController.php");
$activities= new DBController();
include("login-inc.php");
$sesdep=$_SESSION["departement"];
if (isset($_POST["search"]) && (!empty($_POST["search"]))){
    $trouve=$_POST["search"];
    // Processus de recherche 
    $sql="SELECT username,ID,entree,sortie,duree FROM utilisateurs WHERE departement='$sesdep' AND matricule='$trouve'";
}
else
$sql="SELECT username,ID,entree,sortie,duree FROM utilisateurs WHERE departement='$sesdep'";

$sql=mysqli_query($activities->conn,$sql);
// Compteur du tableau 
while($row=mysqli_fetch_assoc($sql))
{
    $nom=$row["username"];
    $nomemp="&nbsp;&nbsp;<span style='font-size:10px;' class='uk-label uk-label-success'>$nom</span>";
    $uid=$row["ID"].$nomemp;
    $entree_tab=$row["entree"];
    $sortie_tab=$row["sortie"];
    $duree_tab=$row["duree"];
   echo"
   <tr>
    <td>$uid</td>
    <td>$entree_tab</td>
    <td>$sortie_tab</td>
    <td>$duree_tab</td>
    </tr>";
}
?>