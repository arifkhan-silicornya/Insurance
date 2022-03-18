<?php

session_start();
require_once("databaseConnect.php");

if(!isset($_COOKIE['usercookie'])){
    header("location: login.php?LoginFirst");    
}
else{
    $userEmail = $_COOKIE['usercookie'];
    $selectQuery = "SELECT * FROM `user` WHERE `email` = '$userEmail' AND `status`= '0' ";
    $runquery = mysqli_query($connect, $selectQuery);
    if ($runquery == true) {
        while($row=mysqli_fetch_array($runquery))
        { 
            $user_id = $row['user_id'];
            $name = $row['name'];
            $user_nid_number = $row['nid_number'];
            $userEmail = $row['email'];
            $phoneNumber = $row['phoneNumber'];
        }
        $fullName = htmlentities($_POST['fullName']);
        $relationShip = htmlentities($_POST['relationShip']);
    
        $birthDate = htmlentities($_POST['birthDate']);
        $mobileNumber = htmlentities($_POST['mobileNumber']);
        $nidNumber = htmlentities($_POST['nidNumber']);
        $email = strtolower(htmlentities($_POST['email']));
        $homeAddress = htmlentities($_POST['homeAddress']);
        $postOfficeAddress = htmlentities($_POST['postOfficeAddress']);
        $postStationAddress = htmlentities($_POST['postStationAddress']);
        $district = htmlentities($_POST['district']);
        $postCode = htmlentities($_POST['postCode']);
        $division = htmlentities($_POST['division']);
        $checkOne = htmlentities($_POST['checkOne']);
        $checkTwo = htmlentities($_POST['checkTwo']);
    
        $package_id = htmlentities($_POST['package_id']);
        
        $uniqueID = uniqid();
        
        $newOrderInsert = " INSERT INTO `orders` (`order_id`, `customer_id`, `customer_nid`, `customer_name`, `package_id`, `phone_number`, `email`, `payment_status`, `nominee_nid`, `order_time`, `order_session`) 
        VALUES (NULL, '$user_id', '$user_nid_number', '$name', '$package_id', '$phoneNumber', '$userEmail', '0', '$nidNumber', current_timestamp(), '$uniqueID'); ";
        $runquerynewOrderInsert = mysqli_query($connect, $newOrderInsert);
    
        if ($runquerynewOrderInsert == true) {
            $selectOrderId = "SELECT * FROM `orders` WHERE `order_session` = '$uniqueID'  ";
            $runqueryselectOrderId = mysqli_query($connect, $selectOrderId);
            if(mysqli_num_rows($runqueryselectOrderId) > 0){
                while($rowT=mysqli_fetch_array($runqueryselectOrderId)){
                    $order_id = $rowT['order_id'];
                }
                $nomineeInsert = " INSERT INTO `nominee` (`nominee_nid`, `full_name`, `relation_ship`, `birth_date`, `email`, `phone`, `flat_area`, `post_office`, `thana`, `district`, `post_code`, `division`,`order_id`) 
                VALUES ('$nidNumber', '$fullName', '$relationShip', '$birthDate', '$email', '$mobileNumber', '$homeAddress', '$postOfficeAddress', '$postStationAddress', '$district', '$postCode', '$division','$order_id' ); ";
                $runqueryNomineeInsert = mysqli_query($connect, $nomineeInsert);
    
                if ($runqueryNomineeInsert == true) {
                    header("location: ../index.php?youCreatedNewOrder");        
                }else {
                    header("location: ../index.php?OrderhaveButnomiNot");
                }
            }else {
                header("location: ../index.php?failedOrder");
            }
    
        }else {
            header("location: ../index.php?failedYourOrder");
        }
    }else {
        header("location: ../index.php");
    }

}
?>

