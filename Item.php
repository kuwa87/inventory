<?php
require_once "Config.php";

class Item extends Config{


    //get item
        public function get_item(){
        //query
        $sql = "SELECT * FROM items INNER JOIN categories ON categories.category_id=items.category_id";
        // $sql = "SELECT * FROM items";
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

    //echo item
        public function echo_item($item_id){
        $sql = "SELECT * FROM items WHERE item_id=$item_id";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;

        } else{
            return $this->conn->error;
        }

    }


    //change
    public function change($item_id,$item_name,$item_price,$item_quantity,$item_status){

    $sqlFirst = "SELECT * FROM items WHERE item_name = '$item_name' AND item_id!= '$item_id'";
    $result = $this->conn->query($sqlFirst);

    if ($result->num_rows > 0) {
        echo 'item_name is already taken.';
    } else{

    $sql = "UPDATE items SET item_id='$item_id', item_name='$item_name', item_price='$item_price', item_quantity='$item_quantity', item_status='$item_status' WHERE item_id=$item_id";

    $result = $this->conn->query($sql);

    if($result) {
        // header("Location: dashboard.php");
        echo "<script>window.location.replace('items.php')</script>";
    }
    else{
        echo "Error: ".$this->conn->error;
    }
    }   
    }

    //delete
    public function delete($item_id){

    $sql = "DELETE FROM items WHERE item_id=$item_id";
    $result = $this->conn->query($sql);

    if($result) {
        echo "<script>window.location.replace('items.php')</script>";
    }
    else{
        echo "Error: ".$this->conn->error;
    }
    }

    //insert
       public function insert($category_id,$item_name,$item_price,$item_quantity){

        $sqlFirst = "SELECT * FROM items WHERE item_name = '$item_name'";
        $result = $this->conn->query($sqlFirst);

        if ($result->num_rows > 0) {
            echo 'item_name is already taken.';
        } else{

        $sql = "INSERT INTO items(category_id,item_name,item_price,item_quantity,item_status) VALUES ('$category_id','$item_name','$item_price','$item_quantity','available')";
        $result = $this->conn->query($sql);
        
        // if($result) {            
        if($result == TRUE) {            
        echo "<script>window.location.replace('items.php')</script>";
        }else
            echo 'Error in inserting record' .$this->conn->error;

    }
    
}

    //get items by category
        public function get_items_by_category($category_id){
        //query
        $sql = "SELECT * FROM items INNER JOIN categories ON categories.category_id=items.category_id WHERE items.category_id=$category_id";
        // $sql = "SELECT * FROM items";
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



}


?>