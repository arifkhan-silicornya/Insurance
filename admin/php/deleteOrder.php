<?php 
require_once("databaseConnect.php");

$order_id = $_REQUEST['order_id'];
$id = $_REQUEST['id'];


if (isset($_REQUEST['order_id'])) {
    $sql="UPDATE `orders` SET `order_cancel`= '$id' WHERE `order_id`= '$order_id' ";
    $result=mysqli_query($connect, $sql);
    if ($result == true) {
        header("location:../viewOrder.php?orderDisabled");
    } else {
        header("location:../viewOrder.php?Failed_error :".mysqli_error($sql));
    }
}
else {
    header("location:../viewOrder.php?ValueNotFound");
}



?>