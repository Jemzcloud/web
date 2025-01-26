<?php

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


function signup($username,$password,$email,$phone){

    $conn = connection();

    $sql = "INSERT INTO user_data(username, password, email, number) VALUES ('$username' , '$password' , '$email' , '$phone');";
    if($conn->query($sql) === TRUE){
        header('Location: http://jemz.com/web/templates/main/signup_success.php');
    }else{
        echo "ERROT: ". $sql . "</br>". $conn->error;
    }

    // $sql = "INSERT INTO `user_data` (`username` , `password` , `email` , `number`) VALUES ('$username' , '$password' , '$email' , '$phone');";
    
    // $result = false;
    // if($conn->query($sql)){
    //     $result = true;
    // }else{
    //     $result = false;
    // }  
    // $conn->close();
    // return $result;
}

function login(){

    $conn = connection();
    $email= 'test@gmail.com';
    $password = 'testtest';
    $sql = "SELECT * FROM user_data WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss",$email,$password);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        echo "working";
    }
    else{
        echo "Invalid";
    }

}
login();
?>



