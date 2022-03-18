<?php 
session_start();
if(isset($_COOKIE['usercookie'])){
  header('location: index.php?Successfully_login');
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
  
  
  <style>
      #msgdiv{
          position:fixed;
          z-index:100000;
          top:30%;
          left:25%;
          width:50%;
      }
      
  </style>
  
</head>
<body >
    
    <div class="container my-5">

      <div style="background: #fff; padding: 30px; border-radius: 10px; box-shadow: 6px 6px 10px 0px #003399!important; max-width: 550px ; margin: auto;" class="border border-primary">
    
      <?php if(isset($_REQUEST['LoginNow'])){ ?>
        <div class="bg-primary text-light p-3 py-5" id="msgdiv">
            <div class="d-flex justify-content-around"> Your Registration Succesful. Login Now
              <button type="button" onclick="closeDiv();" class="close text-light" >
                <span aria-hidden="true" class="p-2">&times;</span>
              </button>
            </div>
        </div>
      <?php }?>
      <?php if(isset($_REQUEST['Login_Failed'])){ ?>
        <div class="bg-primary text-light p-3 py-5" id="msgdiv">
            <div class="d-flex justify-content-around"> Your Email or password is not correct!
              <button type="button" onclick="closeDiv();" class="close text-light" >
                <span aria-hidden="true" class="p-2">&times;</span>
              </button>
            </div>
        </div>
      <?php }?>
          
      <h1 class="text-center text-primary mb-5">Login</h1>
        <form action="php/login.php" method="POST">
          <div class="form-group ">
            <input class="form-control border border-primary" type="email" placeholder="E-mail " name="email" required>
          </div>
          <div class="form-group">
            <input class="form-control border border-primary" type="password" placeholder="Password" name="pwd" required autocomplete="off">
          </div>
          <div class="form-group">
            <button class="btn btn-outline-primary w-100 font-weight-bolder" type="submit" name="submit">Login</button>
          </div>
        </form>
          <div class="d-flex flex-row justify-content-between">
            <div>Not a Member?<a href="register.php" class="link">Register Now</a> </div>
            <div>Forgot Password? <a href="reset.php" class="link">Reset Now</a> </div>
          </div>
      </div>
    </div>
    
<script>

function closeDiv() {
  var x = document.getElementById("msgdiv");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

</script>
</body>
</html>



