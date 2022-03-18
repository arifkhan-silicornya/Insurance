<?php 
require_once("databaseConnect.php");

$Packageid = $_REQUEST['Packageid'];


if (isset($_REQUEST['Packageid'])) {
    $sql="UPDATE `package` SET `package_delete`= 0 WHERE `package_id`= '$Packageid' ";
    $result=mysqli_query($connect, $sql);
    if ($result == true) {
        header("location:../viewPackageList.php?Product_Deleted_Forever");
    } else {
        header("location:../viewPackageList.php?Failed_error :".mysqli_error($sql));
    }
}
else {
    header("location:../viewPackageList.php?ValueNotFound");
}



?>