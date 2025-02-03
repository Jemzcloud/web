<?php
include_once 'includes/hash.class.php';
include_once 'includes/Database.class.php';
include_once 'includes/User.class.php';
include_once 'includes/Session.class.php';
function load_template($name){
    include __DIR__ ."/../templates/main/$name.php";
}

function valid($user,$password){
    if($user == 'jemz@gmail.com' and $password == 'jemz'){
        return true;
    }
    else{
        return false;
    }
}
function connection(): mysqli{
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



?>



