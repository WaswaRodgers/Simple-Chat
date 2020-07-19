<?php
include('funtions.php');
$json=getallusers();
header('Content-type: application/json');
    echo json_encode($json, JSON_PRETTY_PRINT);
?>