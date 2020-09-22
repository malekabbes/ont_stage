<?php

$actcount= new DBController();
$actusql="SELECT COUNT(*) FROM actualite";
$acturez=mysqli_query($actcount->conn,$actusql);
$row=mysqli_fetch_assoc($acturez);
$actu = $row['COUNT(*)'];
echo $actu;

?>