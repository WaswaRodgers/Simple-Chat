<?php
    error_reporting(0);
    include('functions.php');
    include('connection.php');
    $email=$_POST['emailtext'];
    $password=$_POST['password'];
    $response;
    
    if(empty($email)){
        $response['Email'].="Please enter your Email";
    }
    if(emailvalidation($email) ==false){
        $response['Email_valid'].="Please enter a valid Email";
    }      
   
    if(empty($password)){
        $response['Password'].="Please enter a password";
    }

    if ($response == null) {
        if(login($email, $password)==true){
           session_start();
           $_SESSION['Email']=$email;
           $_SESSION['Pass']=sha1($password);
           $response['Success'].="Logged in perfectly";

        }else{
            $response['Error'].="Account does not exist";
        }
    }
    header('Content-type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
?>