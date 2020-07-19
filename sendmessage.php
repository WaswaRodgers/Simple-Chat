<?php
    include('functions.php');
    //error_reporting(0);
    $message = $_POST['message'];
    $senderId = $_POST['senderId'];
    $receiverId =11;
    $response;

    
    if(empty($message)){
        $response['Error'].="Please type your message";
    }
    

    if ($response == null) {
        $response['Message'].=$Message;
        $response['senderId'].=$senderId;
        $response['receiverId'].=$receiverId;
    }
    header('Content-type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
?>