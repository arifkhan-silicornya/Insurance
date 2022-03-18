<?php 
include 'core/init.php';
$link=mysqli_connect("localhost","root","","lr");
if(empty($_POST)===false){
	$username=$_POST['username'];
	$password=$_POST['password'];
if(empty($username)===true||empty($password)===true){
	$errors[]='You need to enter a username and password';
} else if(user_exists($username)===false){
	$errors[]='We can\'t find that username ';
} else if(user_active($username)===false){
	$errors[]='You haven\'t activated your account';
} else{
	//here
}
print_r($errors);
}
?>