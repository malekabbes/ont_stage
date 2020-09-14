<?php

    include("db.php");
    $sql = "SELECT COUNT(*) FROM utilisateurs";
    $result=mysqli_query($mysqli, $sql);
    $row= mysqli_fetch_array($result);
    $var = $row['COUNT(*)'];


?>