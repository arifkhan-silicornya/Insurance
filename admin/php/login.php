<?php
session_start();
require_once("databaseConnect.php");

$userID=$_REQUEST['username'];
$password = md5(sha1($_REQUEST['password']));

$sql="SELECT * FROM admin WHERE  `name`='$userID' AND `password`='$password' ";
$result=mysqli_query($connect,$sql);


if(mysqli_num_rows($result) > 0)
{
	$_SESSION['username']=$userID;
	$_SESSION['password']=$password;
	header("location:../viewInsuranceList.php?Successfully_Login");
}
else 
{
	header("location:../index.php?Login_Failed");
}


?>