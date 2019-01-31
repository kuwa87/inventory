<?php
require "Database.php";

class User extends Database{

    //login
    public function login($username,$password){
    $username;
    $password;

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $this->conn->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        session_start();
        $_SESSION['user_id'] = $row['user_id'];
        header("Location: dashboard.php");
    } else{
        echo 'Username and Password error.';

    }
}

    //get users
        public function get_users(){
        //query
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);

        //initialize an array
        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;

        } else{
            return $this->conn->error;
        }
    }

    //echo username
        public function echo_users($user_id){
        $sql = "SELECT * FROM users WHERE user_id=$user_id";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;

        } else{
            return $this->conn->error;
        }

    }

    //logout
        public function logout(){
        session_start();
        session_destroy();
        header("Location: login.php");
        exit;

    }

}


?>