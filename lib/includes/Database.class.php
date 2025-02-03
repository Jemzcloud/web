<?php

class DataBase{
    public static function connection(): mysqli{
        $servername = "localhost:3306";
        $usrname = "phpmyadmin";
        $passwd = "kali";
        $dbname = "phpmyadmin";
    
        $conn = new mysqli($servername,$usrname,$passwd,$dbname);
        if($conn->connect_error){
            die("connection Failed:" . $conn->connect_error);
        }
        return $conn;
    }
}