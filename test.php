<?php
include 'lib/load.php';
class userrr{
    public $unam;
    function userdata(){
        $conn = DataBase::connection();
        $pass = "25d55ad283aa400af464c76d713c07ad";
        $query = "SELECT * FROM user_data WHERE email='bbbbbbbb@gmail.com';";
        $result = $conn->query($query);
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            if($row['password'] ==  $pass){
                $this->unam = $row['username'];
                return true;
                //return $this->unam =  $row['username'];
            }
        }
    }
}

$user = new userrr;
if($user->userdata()){
    echo $user->unam;
}

