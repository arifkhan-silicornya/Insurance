<?php 
require_once("databaseConnect.php");

$policyid = $_REQUEST['policyid'];


if (isset($_REQUEST['policyid'])) {
    $sql="UPDATE `insurance_info` SET `policy_delete`= 1 WHERE `insurance_id`= '$policyid' ";
    $result=mysqli_query($connect, $sql);
    if ($result == true) {
        header("location:../viewInsuranceList.php?Product_Deleted_Forever");
    } else {
        header("location:../viewInsuranceList.php?Failed_error :".mysqli_error($sql));
    }
}
else {
    header("location:../viewInsuranceList.php?ValueNotFound");
}



?>