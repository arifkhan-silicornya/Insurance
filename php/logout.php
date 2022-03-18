<?php
session_start();


if(isset($_COOKIE['usercookie']))
{
	unset($_COOKIE['usercookie']);
	unset($_COOKIE[$cookie_name]);
	setcookie('usercookie', false);
	setcookie('usercookie', '', -1, '/');
	setcookie($cookie_name, '' , time() - (864000 * 300), "/");
	header("location:../index.php?logout");
}
else
{
    header("location:../index.php");
}


?>