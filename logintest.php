<?php 
include "lib/load.php";
$email = "bbbbbbbb@gmail.com";
$password = "12345678";
$result = null;
$unam;
$token=null;
SESSION::start();
if(isset($_GET['logout'])){
    Session::destroy();
}

if (Session::get('is_loggedin')) {
    $username = Session::get($token);
    echo 'Welcome Back ', USER::getUsername($email);
    // $data = new USER($email);
    // $data->setBio("The bio is firw so get thw water!");
    // echo "\nbio:",$data->getBio();
} else {
    printf('No session found, trying to login now.');
    $result = USER::Login($email,$password);
    $token = UserSession::autindication($email,$password);

    if ($result) {
        echo 'Login Success ';
        Session::set('is_loggedin', true);
        Session::set('is_loggedin', $token);
        // return $result;
        return $token;
    } else {
        echo "Login failed", $email;
    }
}
