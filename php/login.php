<?php
session_start();
require_once("databaseConnect.php");

$email= $_POST['email'];
$email = strtolower($email);
$pwd = $_POST['pwd'];

$sql="SELECT * FROM `user` WHERE  `email`='$email' AND `password`='$pwd' AND `status` = 0 ";
$result=mysqli_query($connect,$sql);


if(mysqli_num_rows($result) > 0)
{
	$cookie_name = 'usercookie';
	$cookie_value = $email;
	
	
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
	header("location:../index.php?Successfully_Login");
	
}
else
{
	header("location:../login.php?Login_Failed");
}


?>