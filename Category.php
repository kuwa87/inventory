<?php
require_once "Config.php";

class Category extends Config{


    //get category
        public function get_category(){
        //query
        $sql = "SELECT * FROM categories";
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

    //echo category
        public function echo_category($category_id){
        $sql = "SELECT * FROM categories WHERE category_id=$category_id";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;

        } else{
            return $this->conn->error;
        }

    }


    //change
    public function change($category_name,$category_id){

    $sqlFirst = "SELECT * FROM categories WHERE category_name = '$category_name' AND category_id!= '$category_id'";
    $result = $this->conn->query($sqlFirst);

    if ($result->num_rows > 0) {
        echo 'category_name is already taken.';
    } else{

    $sql = "UPDATE categories SET category_name='$category_name' WHERE category_id=$category_id";

    $result = $this->conn->query($sql);

    if($result) {
        // header("Location: dashboard.php");
        echo "<script>window.location.replace('categories.php')</script>";
    }
    else{
        echo "Error: ".$this->conn->error;
    }
    }   
    }

    //delete
    public function delete($category_id){

    $sql = "DELETE FROM categories WHERE category_id=$category_id";
    $result = $this->conn->query($sql);

    if($result) {
        echo "<script>window.location.replace('categories.php')</script>";
    }
    else{
        echo "Error: ".$this->conn->error;
    }
    }
       public function insert($category_name){

        $sqlFirst = "SELECT * FROM categories WHERE category_name = '$category_name'";
        $result = $this->conn->query($sqlFirst);

        if ($result->num_rows > 0) {
            echo 'category_name is already taken.';
        } else{

        $sql = "INSERT INTO categories(category_name) VALUES ('$category_name')";
        $result = $this->conn->query($sql);
        
        // if($result) {            
        if($result == TRUE) {            
        echo "<script>window.location.replace('categories.php')</script>";
        }else
            echo 'Error in inserting record' .$this->conn->error;

    }
    
}


}


?>