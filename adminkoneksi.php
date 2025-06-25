<?php
$hostname = "localhost"; 
$username_db = "root"; 
$password_db = ""; 
$dbname = "travel"; 

$connect = new mysqli($hostname, $username_db, $password_db, $dbname);


if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>
