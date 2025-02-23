<?php 

class UserSession{
    public $conn;
    public $data;
    public $id;
    public $uid;
    public $token;
    public static function autindication($user,$pass){
        $username = USER::Login($user,$pass);
        if ($username) {
            $user = new USER($user);
            $conn = DataBase::connection();
            $ip = $_SERVER['REMOTE_ADDR'];
            $agent = $_SERVER['HTTP_USER_AGENT'];
            $token = md5(random_int(0, 9999999) . $ip . $agent . time());
            $sql = "INSERT INTO session (`uid`, `token`, `login_time`, `ip`, `user_agent`, `active`)
            VALUES ('$user->id', '$token', now(), '$ip', '$agent', '1')";
            if ($conn->query($sql)) {
                SESSION::set('session_token', $token);
                return $token;
            }else{
                return false;
            }
        } else {
            return false;
        }
    }
    public static function authorize($token){
        $sess = new UserSession($token);
        return $sess;
    }
    public function __construct($token){
        $this->conn = DataBase::connection();
        $this->token = $token;
        $this->id = 'user_data';
        $sql = "SELECT * FROM session WHERE token = $token;";
        $result = $this->conn->query($sql);
        if ($result->num_rows) {
            $row = $result->fetch_assoc();
            $this->data = $row;
            $this->uid = $row['uid'];
        } else {
            throw new Exception("Username does't exist");
        }

    }
    public function getUser(){
        return new UserSession($this->uid);
    }
    
}