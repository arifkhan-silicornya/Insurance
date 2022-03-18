<?php
require_once("databaseConnect.php");

$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));

$date = date('Y-m-d h:i:s', time());

$fullName = htmlentities($_POST['username']);

$userEmail = $_COOKIE['usercookie'];

if($_POST['username']){
    $updateName = "UPDATE `user` SET `name`= '$fullName'  WHERE `email` = '$userEmail' " ;    
    $runupdateName = mysqli_query($connect, $updateName);
    
    if($runupdateName == true){
        if($_POST['preAddress'] || $_POST['perAddress']){
        
            $preAddress = $_POST['preAddress'];
            $perAddress = $_POST['perAddress'];
            
            $updateaddress =  "UPDATE `address` SET `preAddress`= '$preAddress' ,`perAddress`= '$perAddress' , `update_date` = '$date' WHERE `email` = '$userEmail' ";
            $runUpdateaddress = mysqli_query($connect, $updateaddress);
            
            if($runUpdateaddress == true){
                header("location:../dashboard.php?dataUpdated");    
            }else{
                header("location:../dashboard.php?Nameupdated");
            }
            
        }else{
            header("location:../dashboard.php?onlyNameupdate");
        }    
    }else{
        header("location: ../home.php?notUpdate");
    }
    
}
else{
    if($_POST['preAddress'] || $_POST['perAddress']){
        
        $preAddress = $_POST['preAddress'];
        $perAddress = $_POST['perAddress'];
        
        $updateaddress =  "UPDATE `address` SET `preAddress`= '$preAddress' ,`perAddress`= '$perAddress'  `update_date`= current_timestamp()  WHERE `email` = '$userEmail' ";
        $runUpdateaddress = mysqli_query($connect, $updateaddress);
        
        if($runUpdateaddress == true){
            header("location:../home.php?addressUpdated");    
        }
    }else{
        header("location:../home.php?failed");
    }
}
?>