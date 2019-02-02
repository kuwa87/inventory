<?php
require_once "Config.php";

class User extends Config{

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


    //change
    public function change($username,$password,$firstname,$lastname,$email,$user_id){

    $sqlFirst = "SELECT * FROM users WHERE username = '$username' AND user_id!= '$user_id'";
    $result = $this->conn->query($sqlFirst);

    if ($result->num_rows > 0) {
        echo 'Username is already taken.';
    } else{

    $sql = "UPDATE users SET username='$username',password='$password',email='$email',firstname='$firstname',lastname='$lastname' WHERE user_id=$user_id";

    $result = $this->conn->query($sql);

    if($result) {
        // header("Location: dashboard.php");
        echo "<script>window.location.replace('dashboard.php')</script>";
    }
    else{
        echo "Error: ".$this->conn->error;
    }
    }   
    }

    //delete
    public function delete($user_id){

    $sql = "DELETE FROM users WHERE user_id=$user_id";
    $result = $this->conn->query($sql);

    if($result) {
        echo "<script>window.location.replace('dashboard.php')</script>";
    }
    else{
        echo "Error: ".$this->conn->error;
    }
    }
       public function insert($username,$password,$firstname,$lastname,$email){

        $sqlFirst = "SELECT * FROM users WHERE username = '$username'";
        $result = $this->conn->query($sqlFirst);

        if ($result->num_rows > 0) {
            echo 'Username is already taken.';
        } else{

        $sql = "INSERT INTO users(username,email,password,firstname,lastname,permission) VALUES ('$username','$email','$password','$firstname','$lastname','USER')";
        $result = $this->conn->query($sql);
        
        // if($result) {            
        if($result == TRUE) {            
        echo "<script>window.location.replace('dashboard.php')</script>";
        }else
            echo 'Error in inserting record' .$this->conn->error;

    }
    
}

        // login_required
        public function login_required(){
            session_start();
            if($_SESSION['user_id'] == FALSE){
                // header( 'Location: login.php' );
            $this->redirect_js('login.php');

            }
        }
    
        public function logged_in(){
            session_start();
            if(isset($_SESSION['user_id'])){
            // header('Location: javascript://history.go(-1)');
            $this->redirect_js('javascript:history.go(-1)');
            //「://」が削除された理由・・・上記のコードはすでにJSであるから。


            // header("Location: ". $_SERVER['HTTP_REFERER']);
            // exit;
            }
        }

        //login_required
        // public function login_required(){
        //     session_start();
        //     if($_SESSION['user_id']){
        //         header('Location: '.$_SERVER['REQUEST_URI']);
        //     }
        //     else{
        //         header( 'Location: login.php' );
        //     }
        // }





}


?>