<?php
include_once("../DBController.php");
$cnx = new DBController();
if(isset($_GET["ID"]))
{
    $sql="SELECT ID FROM actualite ORDER BY ID DESC LIMIT 1"; 
    $rslts=mysqli_query($cnx->conn,$sql);
    $row = mysqli_fetch_assoc($rslts);
    echo $row["ID"];
}
else
{
    $sql="SELECT * FROM actualite ORDER BY ID DESC LIMIT 1"; 
    $rslts=mysqli_query($cnx->conn,$sql);
    $row = mysqli_fetch_assoc($rslts);
    $alert_titre=$row["titre"];
    $alert_content=$row["content"];
    echo "<div class='uk-alert-primary' uk-alert>
    <a class='uk-alert-close' uk-close></a>
    <p><b>Une nouvelle anounce</b> : $alert_titre : $alert_content</p>
    </div>
";
}
?>