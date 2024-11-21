<?php  
session_start();
$host = "localhost";
$user = "root";
$password = "";
$dbname = "montemayor";
$dsn = "mysql:host={$host};dbname={$dbname}";

$pdo = new PDO($dsn,$user,$password);

?>