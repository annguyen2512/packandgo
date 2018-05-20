<?php 
require_once("config.php");
if((isset($_POST['name'])&& $_POST['name'] !='') && (isset($_POST['email'])&& $_POST['email'] !='')&& (isset($_POST['feedback'])&& $_POST['feedback'] !='') && (isset($_POST['find-us'])&& $_POST['find-us'] !=''))
    {
    $yourName = $_POST['name'];
    $yourEmail = $_POST['email'];
    $comments = $_POST['feedback'];
    $source = $_POST['find-us'];
    $news = $_POST['news'];
        try{
            //Khởi tạo Prepared Statement từ biến $conn ở phần trước
            $stmt = $conn->prepare('INSERT INTO customer_feedback (name, email, feedback, source, newsletter) VALUES (:yourName, :yourEmail, :comments, :source, :news)');

            $stmt->execute((array(':yourName'=>$yourName,':yourEmail'=>$yourEmail,':comments'=>$comments,':source'=>$source,':news'=>$news)));
        }catch(PDOException $ex){
            echo $ex->getMessage();
        }
    }else
    {
        echo "Please fill Name and Email";
    }
?>