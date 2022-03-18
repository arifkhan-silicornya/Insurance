<?php 
require_once("databaseConnect.php");

$package_id = $_REQUEST['package_id'];
$package_name = $_REQUEST['package_name'];
$package_title = $_REQUEST['package_title'];
$premium = $_REQUEST['premium'];
$covergae = $_REQUEST['covergae'];


if (isset($_REQUEST['package_id'])) {
    
    $sql="UPDATE `package` SET `package_name`= '$package_name' , `premium` = '$premium' , `coverage` = '$covergae' , `package_title` = '$package_title'  WHERE `package_id`= '$package_id' ";
    $result=mysqli_query($connect, $sql);
    if ($result == true) {
        header("location:../viewPackageList.php?PackageUpdated");
    } else {
        header("location:../viewPackageList.php?Failed_error :".mysqli_error($sql));
    }
}
else {
    header("location:../viewPackageList.php?ValueNotFound");
}

?>