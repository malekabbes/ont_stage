<?php

    $count= new DBController();
    $sqlcount = "SELECT COUNT(*) FROM utilisateurs";
    $countrez=mysqli_query($count->conn, $sqlcount);
    $row= mysqli_fetch_assoc($countrez);
    $var = $row['COUNT(*)'];
    echo $var;


?>