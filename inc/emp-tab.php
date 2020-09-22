<?php 
include_once("../DBController.php");
$emp= new DBController();
include("login-inc.php");
$sesdep=$_SESSION["departement"];
$sql="SELECT ID,username,email,conge FROM utilisateurs WHERE departement='$sesdep'";
$rez=mysqli_query($emp->conn,$sql);
while($row=mysqli_fetch_assoc($rez))
{
    $uid=$row["ID"];
    $nom_tab=$row["username"];
    $email_tab=$row["email"];
    $conge_tab=$row["conge"];
    if ($row["conge"]==""){
        $conge_tab="N/A";
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