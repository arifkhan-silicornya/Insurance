<!--login_check.php-->
<?php 
session_start();
require_once("php/databaseConnect.php");

if(isset($_COOKIE['usercookie'])){
  $emailId = $_COOKIE['usercookie'];
  
  $SELECTuSER = "SELECT * FROM `user` WHERE `email` = '$emailId' AND `status`= '0' ";
  $runquery = mysqli_query($connect, $SELECTuSER);
  if ($runquery == true) {
    while($row=mysqli_fetch_array($runquery))
    { 
      $name=$row['name'];
      $profile_picture=$row['profile_picture'];
    }
  }  
}
else{
  header("location: index.php?LoginFirst");    
}


?>