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
            return $this->conn;
        }
    }
}