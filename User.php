<?php
require "Database.php";

class User extends Database{

    


}


// class User extends Database{

//     public function get_users(){
//         //query
//         $sql = "SELECT * FROM users";
//         $result = $this->conn->query($sql);
        
//         //initialize an array
//         $rows = array();
//         if($result->num_rows > 0){
//             while($row = $result->fetch_assoc()){
//                 $rows[] = $row;
//             }
//             return $rows;
//         }
//         else{
//             return $this->conn->error;
//         }
//     }
//     //Select one value from the table using id
//     public function get_user($id=1){
//         $sql ="SELECT * FROM users WHERE user_id=$id";
//         $result = $this->conn->query($sql);

//         if($result->num_rows > 0){
//             $row = $result->fetch_assoc();

//             return $row;
//         }
//         else{
//             echo $this->conn->error;
//         }
//     }

//     public function insert($username, $password, $firstname, $lastname, $email){
//         $sql = "SELECT * FROM users WHERE username = '$username'";
//         $result = $this->conn->query($sql);

//         if($result->num_rows > 0){
//             return "Username is already taken.";
//         }
//         else{
//         $sql = "INSERT INTO users(username, password, firstname, lastname, email, status) VALUES('$username', '$password', '$firstname', '$lastname', '$email', 1)";
//         $result = $this->conn->query($sql);

//         if($result){
//             header("Location: userlist.php");
//         }
//         else{
//             echo $this->conn->error;
//         }
//         }
//     }

//     public function update($id, $username, $password, $firstname, $lastname, $email){
//         $sql = "SELECT * FROM users WHERE username = '$username' AND user_id != $id";
//         $result = $this->conn->query($sql);

//         if($result->num_rows > 0){
//             echo "Username is already taken.";
//         }
//         else{
//         $sql = "UPDATE users SET username='$username', password='$password', firstname='$firstname', lastname='$lastname', email='$email' WHERE user_id=$id";
//         $result = $this->conn->query($sql);

//         if($result){
//             header("Location: userlist.php");
//         }
//         else{
//             echo $this->conn->error;
//         }
//     }
//     }
// }
?>