<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Insurance</title>
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
        #message{
            height:100vh;
            width: 100%;
        }
    </style>
</head>

<body>

<div class="container-fluid d-flex justify-content-center align-items-center" id="message">
    <?php 
        if (isset($_REQUEST['checkyourMail'])) {
    ?>
    <div class="text-success font-weight-bolder">Email Sent. Please Check your email and confirm Your Account. </div>
    
    <?php 
        }elseif (isset($_REQUEST['passResetMSG'])) {
    ?>
    <div class="text-success font-weight-bolder">Email Sent. Please Check your email and Reset Your Password. </div>
    <?php
        }else{
            echo "Nothing Happen";
        }
    ?>
</div>


  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Company Brand Slider -->
  <script src="js/brandSlider.js"></script>
    <!-- my custom JavaScript file -->
  <script type="text/javascript" src="js/custom.js"></script>

  </body>

</html>