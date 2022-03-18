<?php

require_once("databaseConnect.php");
// //  ===============  End ===================
// // To Create Uniq Account Number For User 

$policy_id = $_REQUEST['policy_id'];

if ($policy_id >0) { 
    if ( isset($_REQUEST['policy_id']) &&  isset($_REQUEST['package_name'])  &&  isset($_REQUEST['package_title']) &&  isset($_REQUEST['premium'])  &&  isset($_REQUEST['covergae']) ) {

        $policy_id = htmlentities($_REQUEST['policy_id']);
        $package_name = htmlentities($_REQUEST['package_name']);
        $package_title = htmlentities($_REQUEST['package_title']);
        $premium = htmlentities($_REQUEST['premium']);
        $covergae = htmlentities($_REQUEST['covergae']);
    
        $insertDataInDb= "INSERT INTO `package` (`package_name`,`premium` ,`coverage` ,`package_title` ,`insurance_id`) VALUES('$package_name','$premium' ,'$covergae' ,'$package_title' ,'$policy_id')";
        $runquery = mysqli_query($connect, $insertDataInDb);
    
        if ($runquery == true) {
            header("location: ../viewPackageList.php?InsertedNewPackage");
        }
        else{
            header("location: ../addnewPackage.php?FailedToAdd");
        }
    }
    else{
       header("location: ../addnewPackage.php?fillupAllField");
    }    
}
else {
    header("location: ../addnewPackage.php?policyNotFound");
}

?>