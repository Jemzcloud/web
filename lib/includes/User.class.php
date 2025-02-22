<?php 
class USER{
    public $usernamee;
    private $conn;
    public $bio;
    public $email;
    public $id=null;

    public static function register($username,$password,$email,$phone){
        $conn = DataBase::connection();
        $password = Hashing::saltit($password);
        $sql = "INSERT INTO user_data(username, password, email, number) VALUES ('$username' , '$password' , '$email' , '$phone');";
        if($conn->query($sql) === TRUE){
            // header('Location: http://jemz.com/web/templates/main/signup_success.php');
        }else{
            echo "ERROT: ". $sql . "</br>". $conn->error;
        }
    } 

    public static function Login($email,$password){
        $pass = Hashing::saltit($password);
        $conn = DataBase::connection();
        $query = "SELECT * FROM user_data WHERE email='$email';";
        $result = $conn->query($query);
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            if($row['password'] == $pass){
                return $row;
            }
            if (password_verify($pass,$row['password'])){
                return true;

            }
            else{
                return false;
            }
            }
        else{
            return false;
        }
    }

        public function __call($name, $args){
        $proprety = preg_replace("/[^0-9a-zA-Z]/","",substr($name, 3));
        $proprety = strtolower(preg_replace('/\B([A-Z])/','_$1',$proprety));
        if(substr($name,0,3)=="get"){
            return $this->_get_data($proprety);
        }
        elseif(substr($name,0,3)=="set"){
            return $this->_set_data($proprety,$args[0]);
        }
        else{
            
        }
    }

    public static function getUsername($email){
        $conn = DataBase::connection();
        $query = "SELECT * FROM user_data WHERE email='$email';";
        $result = $conn->query($query);
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            return $row['username'];
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
            $sql= "UPDATE user_posts SET bio='$data' WHERE id=$this->id;"; 

            if($this->conn->query($sql)){
                return true;
            }else{{
                return false;
            }}
        }


    


}
