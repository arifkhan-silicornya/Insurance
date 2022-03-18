<?php

require_once("databaseConnect.php");
// //  ===============  End ===================
// // To Create Uniq Account Number For User 


if (isset($_POST['policy_title']) &&  isset($_POST['policy_title']) &&  isset($_FILES['Policy_image']) ) {
    
    $uploads_dir = "../../img/policy";
    $tmp_name = $_FILES["Policy_image"]["tmp_name"];
    $name =md5($_FILES["Policy_image"]["name"]);
    $uniqName = $name.uniqid();
    $moveToFolder = move_uploaded_file($tmp_name, "$uploads_dir/$uniqName.svg");
    if ($moveToFolder == true)
    {
        
        $policy_name = htmlentities($_REQUEST['policy_name']);
        $policy_title = htmlentities($_REQUEST['policy_title']);
     
    
        $insertDataInDb= "INSERT INTO `insurance_info` (`insurance_type`,`policy_title`,`policy_icon`) VALUES('$policy_name','$policy_title','$uniqName')";
        $runquery = mysqli_query($connect, $insertDataInDb);
    
        if ($runquery == true) {
            header("location: ../viewInsuranceList.php?InsertedNewPolicy");
        }
        else{
            header("location: ../addnewInsurance.php?FailedToAdd");
        }
    }
    
    
}
else{
   header("location: ../addnewInsurance.php?fillupAllField");
}
?> 