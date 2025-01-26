<?php 


function connection(){
    $servername = "localhost:3306";
    $usrname = "phpmyadmin";
    $passwd = "kali";
    $dbname = "phpmyadmin";
    $conn = new mysqli($servername, $usrname, $passwd, $dbname);
    if ($conn->connect_error) {
        die("Connection Failed". $conn->connect_error);
    }else{
        echo "Connection Succesds </br>";
    }
    $sql = "SELECT * FROM user_data ;";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "name: ". $row['username'] . " Password: " . $row['password'] . ' Email: ' . $row['email'] . ' Number: ' . $row['number']. "</br>" ;
        }

        
    }else{
        echo "0 result";
    }
    $conn->close();
}
connection();