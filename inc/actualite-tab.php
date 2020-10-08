<?php 
$pagerowlimit = 3;
$page = 1;
if (isset($_GET["page"]) )$page = $_GET["page"];
include_once("../DBController.php"); 
$cnx = new DBController();
if (isset($_POST["search"]) && (!empty($_POST["search"]))){
    $trouve=$_POST["search"];
    // Processus de recherche
    $sql="SELECT id,titre,content FROM actualite WHERE titre LIKE '$trouve' OR content LIKE '$trouve'"; 
   
}    // Affichage normale
else{
    $sql = "SELECT id,titre,content FROM actualite LIMIT $pagerowlimit OFFSET ".( ($page-1)*$pagerowlimit );
}
$rslts=mysqli_query($cnx->conn,$sql);



while($row = mysqli_fetch_assoc($rslts)){

    $titre_table = $row["titre"];
    $content_table = $row["content"];
    $actuid = $row["id"];
    echo " <tr>
    <td>$actuid</td>
    <td>$titre_table</td>
    <td>$content_table</td>
    <td><button Onclick='Set_actu(this)' class='editactu uk-button uk-button-primary' type='button'>Modifier</button></td>
    </tr>";
}
$rslts=mysqli_query($cnx->conn,"SELECT id,titre,content FROM actualite");
$rowcountss = mysqli_num_rows($rslts);
?>
