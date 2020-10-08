<?php

    $count= new DBController();
    $sesdep=$_SESSION["departement"];
    $sqlcount = "SELECT COUNT(*) FROM utilisateurs WHERE departement='$sesdep' ";
    $countrez=mysqli_query($count->conn, $sqlcount);
    $row= mysqli_fetch_assoc($countrez);
    $var = $row['COUNT(*)'];
    echo $var;


?>