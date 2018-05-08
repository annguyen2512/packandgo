<?php 
require_once("config.php");
if((isset($_POST['name'])&& $_POST['name'] !='') && (isset($_POST['email'])&& $_POST['email'] !='')&& (isset($_POST['feedback'])&& $_POST['feedback'] !='') && (isset($_POST['find-us'])&& $_POST['find-us'] !=''))
{
 //require_once("contact_mail.php");

$yourName = $conn->real_escape_string($_POST['name']);
$yourEmail = $conn->real_escape_string($_POST['email']);
$comments = $conn->real_escape_string($_POST['feedback']);
$source = $conn->real_escape_string($_POST['find-us']);
$news = $conn->real_escape_string($_POST['news']);

$sql="INSERT INTO customer_feedback (name, email, feedback, source, newsletter) VALUES ('".$yourName."','".$yourEmail."', '".$comments."', '".$source."', '".$news."')";


if(!$result = $conn->query($sql)){
    die('There was an error running the query [' . $conn->error . ']');
}
else
{
    echo "Thank you! We will contact you soon";
}
}else
{
	echo "Please fill Name and Email";
}
?>