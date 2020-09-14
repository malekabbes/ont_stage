<?php
require_once("DBController.php");

$db_handle = new DBController();
$validmail=FALSE;
$validphone=FALSE;
if((!empty($_POST["email"]))) {
    $query = "SELECT * FROM utilisateurs WHERE email='" . $_POST["email"] . "'";
    $user_count = $db_handle->numRows($query);
    if($user_count>0) {
        $validmail=FALSE;
    }else{
            $validmail=TRUE;
        
    }
}
    if (!empty($_POST["mobile"])) {
        $query = "SELECT * FROM utilisateurs WHERE phone='" . $_POST["mobile"] . "'";
        $user_count = $db_handle->numRows($query);
        if($user_count>0) {
            $validphone=FALSE;
        }else{
             $validphone=TRUE;
            }
    }

?>