<?php 
class USER{
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
        $query = "SELECT * FROM user_data WHERE email='$email';
";
        $result = $conn->query($query);
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            if($row['password'] == $pass){
                return $row;
            }
            else{
                return false;
            }
            }
            else{
                return false;
            }
        }
    }
