<?php
if(!isset($_COOKIE['usercookie'])){
    header("location: index.php?LoginFirst");    
}
require_once('php/databaseConnect.php');
$faciId = $_REQUEST['faciId'];




if (isset($_FILES['avatar_file'])) {
    $uploads_dir = "../img/user/profile";
    $tmp_name = $_FILES["avatar_file"]["tmp_name"];
    $name =md5($_FILES["avatar_file"]["name"]);
    $uniqName = $name.uniqid();
    $moveToFolder = move_uploaded_file($tmp_name, "$uploads_dir/$uniqName.jpg");
    if ($moveToFolder ==true)
        {
            $sql="UPDATE `user` SET `profile_picture`='$uniqName'  WHERE `email`= '$userEmail' ";
            $result=mysqli_query($connect,$sql); 

        if ($result == true){
            header("location:../dashboard.php?imageUploaded");
        } 
    }
    else{
            header("location:../dashboard.php?error :".mysqli_error($sql));
        }
}



if (isset($_REQUEST['faciId'])) {
    
    $viewfacility = "SELECT * FROM `facilities` where `facilities_id` = '$faciId' ";
    $viewPackageResult = mysqli_query($connect, $viewfacility);
    if ($viewfacilityResult == true) {
     
    }
}
else {
  header("location: index.php");
}
?>