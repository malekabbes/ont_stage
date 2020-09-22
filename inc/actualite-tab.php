<?php 
include_once("../DBController.php"); 
$cnx = new DBController();

$sql = "SELECT id,titre,content FROM actualite  ";
$rslts = mysqli_query($cnx->conn,$sql);
while($row = mysqli_fetch_assoc($rslts)):

    $titre_table = $row["titre"];
    $content_table = $row["content"];
    $actuid = $row["id"];
    echo " <tr>
    <td>$actuid</td>
    <td>$titre_table</td>
    <td>$content_table</td>
    <td><button Onclick='Set_actu(this)' class='editactu uk-button uk-button-primary' type='button'>Modifier</button></td>
    </tr>";
endwhile;
?>
