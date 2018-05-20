<?php 
session_start();
require_once("config.php");
// echo $_POST['signup_name'];exit();

if((isset($_POST['signup_name']) && $_POST['signup_name'] !='') && (isset($_POST['email']) && $_POST['email'] !='')&& (isset($_POST['country'])&& $_POST['country'] !='') && (isset($_POST['password']) && $_POST['password'] !='') && (isset($_POST['confirmpass']) && $_POST['confirmpass'] !=''))
{
    $yourName = $_POST['signup_name'];
    $yourEmail = $_POST['email'];
    $yourCountry = $_POST['country'];
    $yourPassword = md5($_POST['password']);

        try{
            //Khởi tạo Prepared Statement từ biến $conn ở phần trước
            $stmt = $conn->prepare('INSERT INTO user (name, password, email, country) VALUES (:yourName, :yourPassword, :yourEmail, :yourCountry)');

            $stmt->execute((array(':yourName'=>$yourName,':yourPassword'=>$yourPassword,':yourEmail'=>$yourEmail,':yourCountry'=>$yourCountry)));

            if($stmt->rowCount() >= 1) {
                // Save session
                 $_SESSION['email'] = $yourEmail;
                 $_SESSION['name'] = $yourName;
                 $_SESSION['time_start_login'] = time();

                $result['name'] = $yourName;
                $result['email'] =  $yourEmail;
                $result['country']= $yourCountry;

                $res = json_encode(array('message'=>"Success","data"=>$result));
                echo $res;
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