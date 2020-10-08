<?php
if(isset($_POST["Decission"]))
{
    include("../DBController.php"); 
    $connex = new DBController();
    $ID=$_POST["ID"];
    if($_POST["Decission"]=="approuve")$status = 1;
    elseif($_POST["Decission"]=="decline")$status = 2;

    $appdec = "UPDATE demandes SET status=$status WHERE ID=$ID";
    if(mysqli_query($rslttt=$connex->conn,$appdec) )echo "ok";
    else echo $appdec." error=".mysqli_error($rslttt);
}








?>