<?php
$host = "localhost";
$userName = "root";
$password = "";
$dbName = "pack&go";
 
// Create database connection
$conn = new mysqli($host, $userName, $password , $dbName);
// cách 2
//$conn = new mysqli("localhost", "root", "" , "pack&go"); // nhưng ko ai xài cái kiểu nà
 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else{
//    echo "connect được rồi đó";
}
?>