<?php
include_once 'includes/hash.class.php';
include_once 'includes/Database.class.php';
include_once 'includes/User.class.php';
include_once 'includes/Session.class.php';
function load_template($name){
    include __DIR__ ."/../templates/main/$name.php";
}

global $__site_config;
$__site_config = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/../dbconfig.json');
SESSION::start();
function get_config($key,$default=null){
    global $__site_config;
    $array = json_decode($__site_config,true);
    if(isset($array[$key])){
        return $array[$key];
    }
    else{
        return $default;
    }
}



?>



