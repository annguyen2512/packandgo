<?php 
session_start();
require_once("config.php");
// echo $_POST['signup_name'];exit();

if((isset($_POST['signup_name']) && $_POST['signup_name'] !='') && (isset($_POST['email']) && $_POST['email'] !='')&& (isset($_POST['country'])&& $_POST['country'] !='') && (isset($_POST['password']) && $_POST['password'] !='') && (isset($_POST['confirmpass']) && $_POST['confirmpass'] !=''))
{
    $yourName = $_POST['signup_name'];
    $yourEmail = $_POST['email'];
    $yourCountry = $_POST['country'];
    $gender = $_POST['gender'];
    $yourPassword = md5($_POST['password']);

	$filename = "";

    if ($_FILES['image']['tmp_name']){
    	$image_content = file_get_contents($_FILES["image"]["tmp_name"]);
	    $filename = time().".".pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
		move_uploaded_file($_FILES['image']['tmp_name'], './resource/users/'.$filename);
    }
        try{       
            //Khởi tạo Prepared Statement từ biến $conn ở phần trước
            $stmt = $conn->query("SELECT * FROM user WHERE email = '$yourEmail'");
            if($stmt->rowCount() > 0 ) {
            	echo json_encode(array('message'=>"Fail","data"=>"Email was exists"));
            	return;
            }

            $stmt = $conn->prepare('INSERT INTO user (name, password, email, country, photo, gender) VALUES (:yourName, :yourPassword, :yourEmail, :yourCountry, :filename, :gender)');
        

            $stmt->execute((array(':yourName'=>$yourName,':yourPassword'=>$yourPassword,':yourEmail'=>$yourEmail,':yourCountry'=>$yourCountry,':filename'=>$filename, ':gender'=>$gender)));

            if($stmt->rowCount() >= 1) {
                // Save session
	             $_SESSION['email'] = $yourEmail;
	             $_SESSION['name'] = $yourName;
	             $_SESSION['time_start_login'] = time();

                $result['name'] = $yourName;
                $result['email'] =  $yourEmail;
                $result['country']= $yourCountry;

                echo json_encode(array('message'=>"Success","data"=>$result));
                // echo $res;
            }else{
                echo json_encode(array('message'=>"Fail"));
            }

        }catch(PDOException $ex){
            echo $ex->getMessage();
        }
}else{
    echo "Please fill Name and Email";
}
?>