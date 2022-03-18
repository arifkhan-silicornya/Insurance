<?php 
require_once("databaseConnect.php");

$Packageid = $_REQUEST['Packageid'];


if (isset($_REQUEST['Packageid'])) {
    $sql="UPDATE `facilities` SET `status`= 0 WHERE `facilities_id`= '$Packageid' ";
    $result=mysqli_query($connect, $sql);
    if ($result == true) {
        header("location:../viewFacilitiesList.php?FacilitiesDisabled");
    } else {
        header("location:../viewFacilitiesList.php?Failed_error :".mysqli_error($sql));
    }
}
else {
    header("location:../viewFacilitiesList.php?ValueNotFound");
}



?>