<?php 
session_start();

require_once("config.php");
if((isset($_POST['email'])&& $_POST['email'] !='') && (isset($_POST['password'])&& $_POST['password'] !=''))
    {
    $yourEmail = $_POST['email'];
    $originPassword = $_POST['password'];

    $yourPassword = md5($_POST['password']);
        try{
            //Khởi tạo Prepared Statement từ biến $conn ở phần trước
            $stmt = $conn->prepare(' SELECT * FROM user WHERE email=? AND password=? ');

            // $stmt->execute((array(':yourName'=>$yourName,':yourEmail'=>$yourEmail,':comments'=>$comments,':source'=>$source,':news'=>$news)));

            $stmt->execute(array($yourEmail,$yourPassword));
            
            $resultSet = $stmt->fetchAll();

            $result = array();
            foreach ($resultSet as $row) {
                $result['name'] = $row['name'];
                $result['email'] =  $row['email'];
                $result['country']= $row['country'];
            }

            if($stmt->rowCount() >= 1) {
                 $_SESSION['email'] = $yourEmail;
                 $_SESSION['name'] = $result['name'];
                 $_SESSION['time_start_login'] = time();
                 
                 echo json_encode(array('message'=>"Success","data"=>$result));
                 // echo $res;

                 // Check remember                
                 if(isset($_POST['remember'])){
                                   
                    setcookie("email", $yourEmail, time() + (86400 * 30), "/");
                    setcookie("password", $originPassword, time() + (86400 * 30), "/");
                 }else{
                    if(isset($_COOKIE['email'])) {
                        unset($_COOKIE['email']);
                        unset($_COOKIE['password']);
                        setcookie('email', '', time() - 3600, '/'); 
                        setcookie('password', '', time() - 3600, '/'); 
                    }
                 }

            }else{
                echo json_encode(array('message'=>"Fail"));
            }
        }catch(PDOException $ex){
            echo $ex->getMessage();
        }
    }else
    {
        echo "Please fill Name and Email";
    }
?>