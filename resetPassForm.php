<?php 
session_start();
if (isset($_SESSION['emailId'])) {
  header("location: home.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/fontawesome.min.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/brands.css">
  <link rel="stylesheet" href="css/solid.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <!-- <link href="css/mdb.min.css" rel="stylesheet"> -->
  <!-- Animation core CSS -->
  <link href="css/animate.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
</head>
<body >
    <?php if (isset($_REQUEST['InvalidUser'])) {
      
    ?>
    <div class="container text-center text-danger font-weight-bold w-100 bg-dark py-5" >
      Email ID was not found
    </div>
    <?php }else {
       $email = $_REQUEST['email'];
    }
     ?>
    <div class="container my-5">
      <div style="background: #fff; padding: 30px; border-radius: 10px; box-shadow: 6px 6px 10px 0px #003399!important; max-width: 550px ; margin: auto;" class="border border-primary">
      <h1 class="text-center text-primary mb-5">Reset Password</h1>
        <form action="php/resetPass.php" method="POST">
            <div class="form-group ">
                <input class="d-none form-control border border-primary" type="email" placeholder="Enter Password" name="email" required value="<?php echo $email;?>" required>
            </div>
            <div class="form-group ">
                <input class="form-control border border-primary" type="password" placeholder="Enter Password" name="pass" required>
            </div>
            <div class="form-group ">
                <input class="form-control border border-primary" type="password" placeholder="Retype Password" name="reTypePass" required>
            </div>
            <div class="form-group">
                <button class="btn btn-outline-primary w-100 font-weight-bolder" type="submit" name="submit">Send</button>
            </div>
            </form>
            <div class="d-flex flex-row justify-content-between">
                <div>Not a Member?<a href="register.php" class="link">Registraion</a> </div>
                <div>Have Account? <a href="index.php" class="link"> Login </a></div>
            </div>
      </div>
    </div>
</body>
</html>