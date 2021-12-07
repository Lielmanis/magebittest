<?php

    include 'model/email.php';
    //Create Email class object
    //object invokes connection method
    $email = new Email();
    $email->connect();

    $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
    $co_regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.co)$/'; 

    $error = "";
    $terms_error = false;
    $success = false;
    
    //When button is pressed
    //assign input to new variable
    if(isset($_POST['submit'])) {
        $data = $_POST['email'];
        //error handling according to assigned variable 
        if(empty($data)) {
            $error = "Email address is required";
        }
        else if(!preg_match($regex, $data)) {
            $error = "Please provide a valid e-mail address";
        }
        else if(preg_match($co_regex, $data)){
            $error = "We are not accepting subscription from Colombia emails";
        }

        if(!isset($_POST['check'])){
            $terms_error = true;
        }
       
        //invokes insert method on successful validation
        if(!empty($data) && preg_match($regex, $data) && !preg_match($co_regex, $data) && isset($_POST['check'])){
            $email->insert($data);
            $success = true;
        }
    }

