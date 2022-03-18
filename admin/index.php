<?php
session_start();

if(isset($_SESSION['username']))
{
	header("location: viewInsuranceList.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    

</head>



<body id="particles-js" ></body>
<div class="animated bounceInDown pb-5">
  <div class="container">
    <span class="error animated tada" id="msg"></span>
    <form name="form1" class="box" onsubmit="return checkStuff()" method="post" action="php/login.php">
      <h4>Admin<span class="mx-2">Login</span></h4>
      <h5 class="mt-1">Sign in to your account.</h5>
        <input type="text" name="username" placeholder="Username" autocomplete="off" required>
        <input type="password" name="password" placeholder="Passsword" id="pwd" autocomplete="off" required>
        <a href="#" class="forgetpass">Forget Password?</a>
        <input type="submit" value="Sign in" class="btn1" >
      </form>
    </div>
</div>

<!-- Company Brand Slider -->
<script src="js/custom.js"></script>

</html>


