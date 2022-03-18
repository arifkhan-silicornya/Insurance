<?php

require_once("databaseConnect.php");
// //  ===============  End ===================
// // To Create Uniq Account Number For User 

$faci_id = $_POST['faci_id'];
$faci_name = $_POST['faci_name'];
$faci_price = $_POST['faci_price'];

if ($faci_id >0) 
{ 
    if (isset($_POST['faci_id']))
    {
        $sql="UPDATE `facilities` SET `facilities_name`= '$faci_name' , `facilities_price` = '$faci_price' WHERE `facilities_id`= '$faci_id' ";
        $runquery = mysqli_query($connect, $sql);

        if ($runquery == true) 
        {
            if (isset($_FILES['faci_img']))
            {
                $uploads_dir = "../image/facilities";
                $tmp_name = $_FILES["faci_img"]["tmp_name"];
                $name =md5($_FILES["faci_img"]["name"]);
                $uniqName = $name.uniqid();
                $moveToFolder = move_uploaded_file($tmp_name, "$uploads_dir/$uniqName.svg");

                if ($moveToFolder ==true)
                {
                    $imageupdate="UPDATE `facilities` SET `image` = '$uniqName' WHERE `facilities_id`= '$faci_id' ";
                    $runquery2 = mysqli_query($connect, $imageupdate);
                    if ($runquery2 == true) 
                    {
                        header("location: ../viewFacilitiesList.php?dataUpdated");
                    }
                    else 
                    {
                        header("location: ../viewFacilitiesList.php?imageNotupdated");
                    }
                }
                else
                {
                    header("location: ../viewFacilitiesList.php?imageNotChanged");
                }    
            }
            else{
                header("location: ../updateFacilities.php?dataUpdated");
            }
        }
        else{
            header("location: ../viewFacilitiesList.php?dataNotupdated");
        }
    }
    else
    {
        header("location: ../viewFacilitiesList.php?fillupAllField");
    }    
}
else
{
    header("location: ../viewFacilitiesList.php?idNotFound");
}
?>