<?php
include "lib/load.php";
$user = "bbbbbbbb@gmail.com";
$pass = "12345678";


// class UserSession{
//     public static function autindication($user,$pass){
//         $username = USER::Login($user,$pass);
//         if ($username) {
//             $user = new USER($user);
//             $conn = DataBase::connection();
//             $ip = $_SERVER['REMOTE_ADDR'];
//             $agent = $_SERVER['HTTP_USER_AGENT'];
//             $token = md5(random_int(0, 9999999) . $ip . $agent . time());
//             $sql = "INSERT INTO session (`uid`, `token`, `login_time`, `ip`, `user_agent`, `active`)
//             VALUES ('$user->id', '$token', now(), '$ip', '$agent', '1')";
//             if ($conn->query($sql)) {
//                 SESSION::set('session_token', $token);
//                 return $token;
//             }else{
//                 return false;
//             }
//         } else {
//             return false;
//         }
//     }
    
// }

// UserSession::autindication($user,$pass);