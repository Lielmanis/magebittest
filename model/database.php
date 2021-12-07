<?php

//Create class for database connection
class Database {
    private $host = "localhost";
    private $user = "root";
    private $DBname = "subscribe";
    private $password = "";

    protected $conn;

    //Creates connection
    //Checks connection, returns error on failed, otherwise returns connection
    public function connect(){
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->DBname);

        if ($this->conn->connect_error) {
            return error_log('Connection error: ' . $mysqli->connect_error);
        }
        else{
            $this->createTable();
            return $this->conn;
        }
    }

    public function createTable(){
        $sql = "CREATE TABLE test (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(50),
            date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
        $this->conn->query($sql);
    }
}