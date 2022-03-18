<?php
if(!isset($_COOKIE['usercookie'])){
    header("location: index.php?LoginFirst");    
}
require_once('databaseConnect.php');

$faciId = $_POST['faciId'];
$orderId = $_POST['orderId'];

$userEmail = $_COOKIE['usercookie'];
$month_year = date('F Y'); 



if (isset($_POST['faciId'])) {
    if (isset($_FILES['fileO'])) {
        $uploads_dir = "../img/user/prove";
        $tmp_name = $_FILES["fileO"]["tmp_name"];
        $name =md5($_FILES["fileO"]["name"]);
        $uniqName = $name.uniqid();
        $moveToFolder = move_uploaded_file($tmp_name, "$uploads_dir/$uniqName.jpg");
        
    }
    
    if (isset($_FILES['fileT'])) {
        $uploads_dir = "../img/user/prove";
        $tmp_name = $_FILES["fileT"]["tmp_name"];
        $name =md5($_FILES["fileT"]["name"]);
        $uniqName2 = $name.uniqid();
        $moveToFolder2 = move_uploaded_file($tmp_name, "$uploads_dir/$uniqName2.jpg");
        
    }else{
        $uniqName2 = '';        
    }
    
    if (isset($_FILES['fileTh'])) {
        $uploads_dir = "../img/user/prove";
        $tmp_name = $_FILES["fileTh"]["tmp_name"];
        $name =md5($_FILES["fileTh"]["name"]);
        $uniqName3 = $name.uniqid();
        $moveToFolder3 = move_uploaded_file($tmp_name, "$uploads_dir/$uniqName3.jpg");
        
    }else{
        $uniqName3 = '';
    }
    
    if($moveToFolder == true){
        
        $sql="INSERT INTO `claim` (`claim_id`, `file_1`, `file_2`, `file_3`, `month_year`, `order_id`, `faci_id`, `user_email`, `status`, `claim_delete`, `create_date`, `update_date`) VALUES (NULL, '$uniqName', '$uniqName2', '$uniqName3', '$month_year', '$orderId', '$faciId', '$userEmail', '0', '0', current_timestamp(), current_timestamp()); ";
        $result=mysqli_query($connect,$sql); 
    
        if ($result == true){
            header("location:../claim.php?dataupdated");
        }else{
            header("location:../claim.php?failed");
        }     
    }
    

}
else {
  header("location: index.php");
}

    
?>