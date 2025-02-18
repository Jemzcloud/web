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
    echo 'Welcome Back ';

} else {
    printf('No session found, trying to login now.');
    $result = USER::Login($email,$password);

    if ($result) {
        echo 'Login Success ';
        echo $name;
        Session::set('is_loggedin', true);
        Session::set('session_username', $result);
        return $result;
    } else {
        echo "Login failed", $email;
    }
}
print($unam);