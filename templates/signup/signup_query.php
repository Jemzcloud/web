<?php 
$signup = false;
if(isset($_POST["username"]) and isset( $_POST["password"]) and isset($_POST["email"]) and isset($_POST["phone"]));{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $number = $_POST['phone'];

    USER::register($username,$password,$email,$number);
    $signup = true;
    
}

if($signup){
    load_template('signup_success');

// if($new_data){
//     load_template('signup_success');
// }
// else{
//     echo "Data Not Added";
// }
}
?>