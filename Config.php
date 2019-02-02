<?php

class Config{

    //properties
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "inventory";

    public $conn;

    public function __construct(){
        //Create the connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

        //check connection
        if($this->conn->connect_error){
            die("Connection error: " . $this->conn->connect_error);
        }

        return $this->conn;

    }

    // public function redirect($url){
    //     #ob_clean - remove all output before header
    //     ob_clean();
    //     header("Location: $url");
    //     exit;
    // }
    public function redirect_js($url){
        echo "<script>window.location.replace('$url')</script>";
        exit;
    }




}