<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'zalego');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('could not connect because of '.mysqli_connect_error());
?>