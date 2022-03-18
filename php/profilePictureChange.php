<?php
require_once("databaseConnect.php");

$userEmail = $_COOKIE['usercookie'];

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

?>