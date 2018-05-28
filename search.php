<?php
require_once("config.php");

$informationTyped=$_GET["search-term"];


 try{
            //Khởi tạo Prepared Statement từ biến $conn ở phần trước
            $stmt = $conn->prepare('SELECT email FROM user where gender like %:gender%');
         
            $stmt->execute((array(':gender'=>$informationTyped)));
                    
            
 }catch(PDOException $ex){
            echo $ex->getMessage();
        }
