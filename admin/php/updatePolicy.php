<?php 
require_once("databaseConnect.php");

$policyid = $_REQUEST['policy_id'];
$policy_name = $_REQUEST['policy_name'];
$policy_title = $_REQUEST['policy_title'];


if (isset($_REQUEST['policy_id'])) {
    
    $sql="UPDATE `insurance_info` SET `insurance_type`= '$policy_name' , `policy_title` = '$policy_title'  WHERE `insurance_id`= '$policyid' ";
    $result=mysqli_query($connect, $sql);
    if ($result == true) {
        header("location:../viewInsuranceList.php?upddate");
    } else {
        header("location:../viewInsuranceList.php?Failed_error :".mysqli_error($sql));
    }
}
else {
    header("location:../viewInsuranceList.php?ValueNotFound");
}
 
 

?>