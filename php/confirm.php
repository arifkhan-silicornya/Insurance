<?php 
require_once("databaseConnect.php");

if (isset($_REQUEST['email'])) {
    $email = $_REQUEST['email'];

    $update = "UPDATE `user` SET `status`= '0'  WHERE `email` = '$email' ";
    $runquery = mysqli_query($connect, $update);

    if ($runquery == true) {
        header("location: ../login.php?LoginNow");
    }
}
?>