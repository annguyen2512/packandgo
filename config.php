<?php
header('Content-Type: text/html; charset=utf-8');
$host = "localhost";
$userName = "root";
$password = "";
$dbName = "pack&go";
 
// Create database connection

try{
    $conn = new PDO('mysql:host=localhost;dbname=pack&go;charset=utf8', 'root', '',
                        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die('Error connecting to database');
}

?>