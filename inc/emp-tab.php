<?php 
$pagerowlimit = 3;
$page = 1;
if (isset($_GET["page"]) )$page = $_GET["page"];
include_once("../DBController.php");
$emp= new DBController();
include("login-inc.php");
$sesdep=$_SESSION["departement"];
if (isset($_POST["search"]) && (!empty($_POST["search"]))){
    $trouve=$_POST["search"];
    // Processus de recherche 
$sql="SELECT ID,username,email,conge FROM utilisateurs WHERE departement='$sesdep' AND (username='$trouve' OR email='$trouve' OR conge='$trouve') ";
}
   // Affichage normale
 else
    $sql="SELECT ID,username,email,conge FROM utilisateurs WHERE departement='$sesdep' LIMIT $pagerowlimit OFFSET ".( ($page-1)*$pagerowlimit );

    $sql=mysqli_query($emp->conn,$sql);
while($row=mysqli_fetch_assoc($sql))
{
    $uid=$row["ID"];
    $nom_tab=$row["username"];
    $email_tab=$row["email"];
    $conge_tab=$row["conge"];
    if ($row["conge"]==""){
        $conge_tab="N/A";
    }
    if ($email_tab==$_SESSION["email"]){
     $nom_tab= $_SESSION["username"]."&nbsp;&nbsp;<span class='uk-label uk-label-success'>Chef</span>";

    }
    echo "<tr id='row$uid'>
    <td>$uid</td>
    <td>$nom_tab</td>
    <td>$email_tab</td>
    <td>$conge_tab</td>
    <td><a  id='user$uid' onclick='Set_table(this);' name='setting' class='w3-bar-item w3-button setting'><i class='fa fa-cog'></i></a></td>
    
    </tr>
    ";

    
}



?>