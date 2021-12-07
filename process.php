<?php 

// include '../model/email.php';
include 'model/email.php';

$emails = array();
$providers;
$rows;

$email = new Email();
$email->connect();

$rows = $email->show();

// if(isset($_GET['provider'])){
//     $providers = $rows;
//     $rows = array();
//     $prov = "/" . $_GET['provider'] . "/i";
//     // $reg = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@' . $prov .'*(\.[a-z]{2,3})$/';
//     // echo $key = array_search($reg, array_column($providers, 'email'));
//     foreach($providers as $provider){
//         if(preg_match($prov, $provider['email'])){
//             array_push($rows, $provider);
//         }
//         // echo $key = array_search($reg, $provider);
//     }
//     header('location: data.php');
// }

if(!empty($rows)){
    $providers = $rows;
    foreach($providers as $provider){
        $email_provider = $provider['email'];
        $email_provider = explode('@',$email_provider);
        $email_provider = explode('.',$email_provider[1]);
        if(!in_array($email_provider[0], $emails)){
            array_push($emails, $email_provider[0]);
        }
    }
}

$email->delete();
