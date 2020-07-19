<?php
$server="localhost";
$user="root";
$password="";
$database="testify";

$connection=mysqli_connect($server, $user, $password, $database) or die("Database connection error:".mysqli_connect_error());
 ?>