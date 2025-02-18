<?php 
include "lib/load.php";
$email = "bbbbbbbb@gmail.com";
$password = "12345678";
$result = null;
$unam;
SESSION::start();
if(isset($_GET['logout'])){
    Session::destroy();
}
if (Session::get('is_loggedin')) {
    $username = Session::get('session_username');
    echo 'Welcome Back ', USER::getUsername($email);
    $bio = new USER($email);
    echo $bio->_get_data("bio");
} else {
    printf('No session found, trying to login now.');
    $result = USER::Login($email,$password);

    if ($result) {
        echo 'Login Success ';
        Session::set('is_loggedin', true);
        Session::set('session_username', $result);
        return $result;
    } else {
        echo "Login failed", $email;
    }
}
