<?php
session_start();
require_once("databaseConnect.php");
$userEMAIL=$_COOKIE['usercookie'];



$sql="SELECT * FROM `user` WHERE `email`='$userEMAIL' ";
$result=mysqli_query($connect,$sql);

while($row=mysqli_fetch_array($result))
    { 
    $dbpassword=$row['password'];
    }

$oldPass = $_REQUEST['oldPass'];
$newPass = $_REQUEST['newPass'];
$newPass2 = $_REQUEST['newPass2'];


if ($dbpassword != $oldPass) {
    
    header("location:../dashboard.php?passwordNotMatch");
}
else{
   if($newPass == $newPass2 ){
    $sql="UPDATE `user` SET `password`='$newPass'  WHERE `email`='$userEMAIL' ";
    $result=mysqli_query($connect,$sql);
    
    
    if($result === TRUE)
       {
        header("location:../dashboard.php?passwordChanged");
        } 
    else {
            header("location:../dashboard.php?error :".mysqli_error($sql));
            
        }
    }
    else{
        header("location:../dashboard.php#changePassword?failed");
    }
}





?>