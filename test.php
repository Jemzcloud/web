<?php
include "lib/load.php";
$email = "bbbbbbbb@gmail.com";

class Test{
    private $conn;
    private $id=null;
    // public $name = "getBio";
    public function __call($name, $args){
        $proprety = preg_replace("/[^0-9a-zA-Z]/","",substr($name, 3));
        $proprety = strtolower(preg_replace('/\B([A-Z])/','_$1',$proprety));
        if(substr($name,0,3)=="get"){
            return $this->_get_data($proprety);
        }
        elseif(substr($name,0,3)=="set"){
            return $this->_set_data($proprety,$args[0]);
        }else{
            throw new Exception("Test::__call() -> $name function unavalable.");
        }
        
        
    }
    public function __construct($email){
        $this->conn = DataBase::connection();
        $this->id = 'user_data';
        $sql = "SELECT id FROM `user_data` WHERE `email`= '$email';";
        $result = $this->conn->query($sql);
        if ($result->num_rows) {
            $row = $result->fetch_assoc();
            $this->id = $row['id']; //Updating this from database
        } else {
            throw new Exception("Username does't exist");
        }
    }
    public function _get_data($var){
        if(!$this->conn){
            $this->conn = DataBase::connection();
        }
        $sql= "SELECT $var FROM user_posts WHERE id=$this->id;";
        $result = $this->conn->query($sql);
        if ($result->num_rows) {
            $row = $result->fetch_assoc();
            print($row['bio']); 
        }else{
            print("Not working");
        }
    }
    private function _set_data($var,$data){
        if(!$this->conn){
            $this->conn = DataBase::connection();
        }
        $sql= "UPDATE user_posts SET bio='$data' WHERE id=$this->id;";//UPDATE user_posts SET bio="this is sample" WHERE id=8;

        if($this->conn->query($sql)){
            return true;
        }else{{
            return false;
        }}
    }
}

$tes = new Test($email);
// $change = $tes->setBio("This is samplesamplesample");
// if($change){
//     print("Bio Changed! \n");
// }

echo $tes->getBio();
echo $tes->isaBHD();
