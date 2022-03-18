<?php

require_once("databaseConnect.php");
// //  ===============  End ===================
// // To Create Uniq Account Number For User 

$package_id = $_POST['package_id']; 

if ($package_id >0) { 
    if ( isset($_POST['package_id']) &&  isset($_POST['FacilitiesName'])  &&  isset($_POST['facilities_Price'])  ) {
        
        $package_id = htmlentities($_POST['package_id']);
        $FacilitiesName = htmlentities($_POST['FacilitiesName']);
        $facilities_Price = htmlentities($_POST['facilities_Price']);

        $insertDataInDb= "INSERT INTO `facilities` (`facilities_name`,`facilities_price` ,`image` ,`package_id`) VALUES('$FacilitiesName','$facilities_Price' ,'$uniqName' ,'$package_id' )";
        $runquery = mysqli_query($connect, $insertDataInDb);

        if ($runquery == true) {
            header("location: ../addnewFacilities.php?InsertedNewItem");
        }
        else{
            header("location: ../addnewFacilities.php?ItemNotInserted");
        }
            
    }else{
        header("location: ../addnewFacilities.php?fillupAllField");
    }    
}else {
    header("location: ../addnewFacilities.php?idNotFound");
}
?>