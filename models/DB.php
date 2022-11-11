<?php

class DB{
    public $conn;

    public function __construct(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "rudeneliai_crud_multipage";
        $this->conn = new mysqli($servername, $username, $password, $db);
    }



}


?>