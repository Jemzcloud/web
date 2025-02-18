<?php
include 'lib/load.php';

$username = "bbbbbbbb@gmail.com";
class userdata{

    public $id=null;
    public $conn;
    public $username = "bbbbbbbb@gmail.com";


        public function constructt($email){
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
            
            $conn = DataBase::connection();
            
            $sql= "SELECT bio FROM user_posts WHERE id=$this->id;";//SELECT * FROM user_posts
            $result = $conn->query($sql);
            if ($result->num_rows) {
                $row = $result->fetch_assoc();
                print($row['bio']); 
            }else{
                print("Not working");
            }
        }
}
$user = new userdata();
echo $user->constructt('bbbbbbbb@gmail.com');
echo $user->_get_data("bbbbbbbb@gmail.com");

// $conn = DataBase::connection();
// $sql= "SELECT * FROM user_posts;";
// $result = $conn->query($sql);

// if ($result->num_rows) {
//     $row = $result->fetch_assoc();
//     print($row['bio']); 
// }else{
//     print("Not working");
// }
