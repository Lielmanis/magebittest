<?php

include '../model/email.php';

$data = json_decode(file_get_contents("php://input"));

$obj = new Email();

$obj->connect();
$obj->insert($data->email);
