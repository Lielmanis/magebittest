<?php

include 'database.php';

//Create new class that inherits database class
class Email extends Database {
    private $id;
    private $email;

    //id property setter
    private function setId($id){
        $this->id = $id;
    }

    //Email property setter
    private function setEmail($data){
        $this->email = $data;
    }

    //Set property as argument to email setter
    //performs query to database to insert new record
    public function insert($data){
        $this->setEmail($data);
        $this->conn->query("INSERT INTO test (email) VALUES ('$this->email')");
    }

    public function show(){
        $data = null;
        $sql = "SELECT * FROM test ORDER BY date ASC";
        $value = $_POST['sort'] ?? "";

        // $provider = $_GET['provide'] ?? "";
        // if(isset($_GET['provider'])){
        //     $sql = "SELECT * FROM test WHERE email='/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@' . $provider . '(\.[a-z]{2,3})$/'";
        // }

        if(isset($_POST['button'])){
            $sql = "SELECT * FROM test ORDER BY " . $value . " ASC";
        }
        $result = $this->conn->query($sql);
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    }

    //When button pressed,
    //performs query to database to delete record with specific id
    public function delete(){
        if(isset($_GET['delete'])){
            $this->setId($_GET['delete']);
            $this->conn->query("DELETE FROM test where id = '$this->id'");
            header('location: data.php');
        }
    }

}