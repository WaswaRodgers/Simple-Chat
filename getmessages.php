<?php
    include('functions.php');
    $usersId = $_GET['usersId'];
    $mateId = $_GET['mateId'];
    $json = getmessages($usersId, $mateId);
    header('Content-type: application/json');
    echo json_encode($json, JSON_PRETTY_PRINT);
?>