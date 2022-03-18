<?php
session_start();


if(isset(($_SESSION["username"])))
{		
	unset($_SESSION["username"]);
	unset($_SESSION["password"]);
	header("location:../index.php");
}
else{
    header("location:../index.php");
}

?>