<?php
require_once("databaseConnect.php");

if (isset($_FILES['avatar_file'])) {
    $uploads_dir = "../image";
    $tmp_name = $_FILES["avatar_file"]["tmp_name"];
    $name =md5($_FILES["avatar_file"]["name"]);
    $uniqName = $name.uniqid();
    $moveToFolder = move_uploaded_file($tmp_name, "$uploads_dir/$uniqName.jpg");
    if ($moveToFolder ==true)
        {
            $sql="UPDATE `admin` SET `profile_pic`='$uniqName'  WHERE `admin_id`= 1 ";
            $result=mysqli_query($connect,$sql); 

        if ($result == true){
            header("location:../profilePictureChange.php?imageUploaded");
        } 
    }
    else{
            header("location:../dashboard.php?error :".mysqli_error($sql));
        }
}

?>