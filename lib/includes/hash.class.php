<?php 

class Hashing{
    public static function saltit($password){
        $password = md5($password);
        return $password;
    }
}