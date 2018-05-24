<?php
require_once("config.php");

$informationTyped=$_GET["searchtext"];


 try{
            //Khởi tạo Prepared Statement từ biến $conn ở phần trước
            $stmt = $conn->prepare('SELECT email FROM user where name like %:yourName%');
         
            $stmt->execute((array(':yourName'=>$informationTyped)));
                    
            
 }catch(PDOException $ex){
            echo $ex->getMessage();
        }
