<?php 
include "lib/load.php";
$email = "bbbbbbbb@gmail.com";
$password = "12345678";
$result = null;
SESSION::start();

if (Session::get('is_loggedin')) {
    $username = Session::get('session_username');
    $userobj = new User($username);
    echo 'Welcome Back ';

} else {
    printf('No session found, trying to login now.');
    $result = USER::Login($email,$password);

    if ($result) {
        echo 'Login Success ';
        Session::set('is_loggedin', true);
        Session::set('session_username', $result);
    } else {
        echo "Login failed, $user";
    }
}