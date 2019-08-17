<?php

$db_host = '127.0.0.1';
$db_username = 'root';
$db_password = $_ENV['MYSQL_PASSWORD'];
$db_name = 'security';

$conn = mysqli_connect($db_host,$db_username,$db_password,$db_name);

?>