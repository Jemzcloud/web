<?php 
class USER{
    public $usernamee;


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

        // public function __construct($username){
        //     $this->id = null;
        //     $this->id = 'user_data';
        //     $sql = "SELECT `id` FROM `auth` WHERE `username`= '$username' OR `id` = '$username' OR `email` = '$username' LIMIT 1;";
        // }

    // public static function setBio(){
    //     return $this->bio;
    // }

    public static function getBio(){
        $sql = "SELECT * FROM ";
    }

    


}
