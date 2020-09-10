<?php

class DBController {
    private $mysql_host = "localhost";
    private $mysql_username = "root";
    private $mysql_password = "root";
    private $mysql_database = "ont_stage";

    private  $conn;
    
    function __construct() {
        $this->conn = $this->connectDB();
        if(!empty($this->conn)) {
            $this->selectDB();
        }
    }
    
    function connectDB() {
        $conn = mysqli_connect($this->mysql_host,$this->mysql_username,$this->mysql_password,$this->mysql_database);
        return $conn;
    }
    
    function selectDB() {
        mysqli_select_db($this->conn, $this->mysql_database);
    }
    
    function numRows($query) {
        $result  = mysqli_query($this->conn, $query);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }
}
?>