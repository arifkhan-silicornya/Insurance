<?php 
function user_exists($username){
	$username=sanitize($username);
	$query=mysqli_query(mysqli_connect("localhost","root","","lr"),"SELECT COUNT(user_id) FROM `users` WHERE `username`='$username'");
	return (mysql_result($query,0)===1) ? true:false;
}
function user_active($username){
	$username=sanitize($username);
	$query=mysqli_query(mysqli_connect("localhost","root","","lr"),"SELECT COUNT(user_id) FROM `users` WHERE `username`='$username' AND `active`=1");
	return (mysql_result($query,0)===1) ? true:false;
}
?>