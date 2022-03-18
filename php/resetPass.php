<?php 
require_once("databaseConnect.php");

$emailID = htmlentities($_POST['email']);
$PassW = htmlentities($_POST['pass']);
$RetypePass = htmlentities($_POST['reTypePass']);

$SELECT= "SELECT `email` FROM `user` where `email` = '$emailID' ";
$runquery = mysqli_query($connect, $SELECT);

if (mysqli_num_rows($runquery) > 0) {
    if ($PassW == $RetypePass) {
        $updatePass = "UPDATE `user` SET `password` = '$RetypePass'  WHERE `email` = '$emailID' ";
        $runquery2 = mysqli_query($connect, $updatePass);
        if ($runquery2 == true) {
            header("location: ../index.php?PasswordChanged");
        }else {
            header("location: ../resetPassForm.php?PasswordNotUpdated");
        }
    }else {
        header("location: ../resetPassForm.php?PasswordNotMatched");
    }   
}else {
    header("location: ../reset.php?tryAgain");
}

?>