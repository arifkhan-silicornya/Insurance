<?php 
require_once("databaseConnect.php");

$order_id = $_REQUEST['order_id'];
$id = $_REQUEST['id'];


if (isset($_REQUEST['order_id'])) {
    $sql="UPDATE `claim` SET `status`= '$id' WHERE `claim_id`= '$order_id' ";
    $result=mysqli_query($connect, $sql);
    if ($result == true) {
        header("location:../viewClaim.php?payment_status_changed");
    } else {
        header("location:../viewClaim.php?Failed_error :".mysqli_error($sql));
    }
}
else {
    header("location:../viewClaim.php?ValueNotFound");
}

?>