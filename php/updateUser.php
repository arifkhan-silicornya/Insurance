<?php 
session_start();
require_once("databaseConnect.php");

$username = htmlentities($_POST['username']);
$gender = htmlentities($_POST['gender']);
$preAddress = htmlentities($_POST['preAddress']);
$perAddress = htmlentities($_POST['perAddress']);

?>