<!--login_check.php-->
<?php 
session_start();
require_once("php/databaseConnect.php");

if(isset($_COOKIE['usercookie'])){
  $emailId = $_COOKIE['usercookie'];
  
  $SELECTuSER = "SELECT * FROM `user` WHERE `email` = '$emailId' AND `status`= '0' ";
  $runquery = mysqli_query($connect, $SELECTuSER);
  if ($runquery == true) {
    while($row=mysqli_fetch_array($runquery))
    { 
      $name=$row['name'];
      $profile_picture=$row['profile_picture'];
    }
  }  
}


?>

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
  #myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}
html {
  scroll-behavior: smooth;
}

#chat{
  position: fixed;
  bottom: 1%;
  left: 10px;
  font-size: 30px;
  z-index:100000;
}

#topBtn{
  position: fixed;
  bottom: 1%;
  right: 10px;
  font-size:25px;
  z-index:100000;
}

.shadow_top_btn{
  box-shadow: 0px 3px 9px 0px rgba(16,15,15,0.73);
-webkit-box-shadow: 0px 3px 9px 0px rgba(16,15,15,0.73);
-moz-box-shadow: 0px 3px 9px 0px rgba(16,15,15,0.73);
}
textarea::-webkit-outer-spin-button,
textarea::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
textarea {
  resize: none;
  /* // other stuff */
  -moz-appearance:none;
  outline:0px none transparent;
  outline: 0;
}
textarea:focus{
  outline: 0;
}

#msgdiv{
  position:fixed;
  z-index:100000000000!important;
  top:35%;
  left:25%;
  width:60%;
  height:250px;
  opacity:0.8;
}

      
</style>


</head>

<body >

<div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-light">
      <div class="modal-body ">
        <h2 class="text-primary">Cooming Soon</h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php if(isset($_REQUEST['youCreatedNewOrder'])){ ?>
<div class="bg-primary text-light p-3 py-5" id="msgdiv">
    <div class="d-flex justify-content-between text-center"><br><br><br><div><h1>Congratulations!</h1>
    You purchase a new package.</div>
      <button type="button" onclick="closeDiv();" class="close text-light" >
        <span aria-hidden="true" class="p-2">&times;</span>
      </button>
    </div>
</div>
<?php }?>
<!-------------------------------------------------------------
-------------Top navber Start Here for Full screen-------------
--------------------------------------------------------------->
<?php require_once('topNav.php');?>
<?php include 'navBar.php';?>
<!--------------------------------------------------------------
----------------Carosel Start Here for Full screen---------------
--------------------------------------------------------------->
<section id="carousel">
  <div class="container-fluid">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
<!--   <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol> -->
  <div class="carousel-inner">

    <div class="carousel-item active">
      <div class="familyImage">
      <!-- <img src="img/family-banner-txt-price.png" class="family-banner-txt-price img-responsive animated bounceInDown delay-1s" alt="."> -->
      <img src="img/family-banner-family.png" class="d-block w-100 img-responsive" alt="image">
      </div>
    </div>

    <div class="carousel-item">
      <div class="familyImage">
          <!-- <img src="img/bike-price-text.png" class="bike-price img-responsive pricevalue animated bounceInDown delay-1s" alt="."> -->
          <img src="img/bike-banner-bike.png" class="d-block w-100" alt="...">
      </div>
    </div>
<!--     <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div> -->
  </div>
     <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"data-slide="prev">
         <i class="fa fa-angle-left fa-3x"></i>
     </a>
     <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
         <i class="fa fa-angle-right fa-3x"></i>
     </a>
</div>
</div>
</section>
<!-------------------------------------------------------------
---------Info Graphic design Start Here for Full screen--------
--------------------------------------------------------------->
<section id="infoGraphicFull">
  <div class="container">
     <img class="imgGraph img-responsive" src="img/infographic.svg" alt="infographic">
     <h2>Why Guardians <br> Health?</h2>
     <ul>
       <li>
        <div class="img-info">
           <img class="img-responsive center-block" src="img/go-paperless.svg" alt="image">
        </div>
        <p>
          <strong>Go Paperless</strong> <br>
          Life is simple with <br> zero paperwork
        </p>
      </li>
      <li>
        <div class="img-info">
           <img class="img-responsive center-block" src="img/easy-registration.svg" alt="image">
        </div>
        <p>
          <strong>Easy Registration &<br> Stress-Free Claim</strong><br>
          Register online in just 5 minutes & <br>Hassle-free claim settlement <br>within 10 working days
        </p>
      </li>
      <li>
        <div class="img-info">
           <img class="img-responsive center-block" src="img/affordable.svg" alt="image">
        </div>
        <p>
          <strong>Affordable<br>Customized Packages</strong><br>
          Best suited customized <br> packages at affordable premiums
        </p>
      </li>
      <li>
        <div class="img-info">
           <img class="img-responsive center-block" src="img/get-insured.svg" alt="image">
        </div>
        <p>
          <strong>Get Insured <br> on-the-go</strong><br>
          Purchase policy online and <br> get insured instantly
        </p>
      </li>
      <li>
        <div class="img-info">
           <img class="img-responsive center-block" src="img/leading.svg" alt="image">
        </div>
        <p>
          <strong>Leading <br> Insurance Partners</strong><br>
          Partnered with leading and <br> trusted insurance giants <br> of the country
        </p>
      </li>
     </ul>       
  </div>
</section>
<!-------------------------------------------------------------
---------Info Graphic design End Here for Full screen----------
--------------------------------------------------------------->
<!-------------------------------------------------------------
---------Info Graphic design Start Here for Small screen--------
--------------------------------------------------------------->
<section id="infoGraphicSmall">
  <div class="container">
    <h2>Why Guardians <br> Health?</h2>
    <ul>
       <li>
        <div class="img-info">
           <img class="img-responsive center-block" src="img/go-paperless.svg" alt="image">
        </div>
        <p>
          <strong>Go Paperless</strong> <br>
          Life is simple with <br> zero paperwork
        </p>
      </li>
      <li>
        <div class="img-info">
           <img class="img-responsive center-block" src="img/easy-registration.svg" alt="image">
        </div>
        <p>
          <strong>Easy Registration &<br> Stress-Free Claim</strong><br>
          Register online in just 5 minutes & <br>Hassle-free claim settlement <br>within 10 working days
        </p>
      </li>
      <li>
        <div class="img-info">
           <img class="img-responsive center-block" src="img/affordable.svg" alt="image">
        </div>
        <p>
          <strong>Affordable<br>Customized Packages</strong><br>
          Best suited customized <br> packages at affordable premiums
        </p>
      </li>
      <li>
        <div class="img-info">
           <img class="img-responsive center-block" src="img/get-insured.svg" alt="image">
        </div>
        <p>
          <strong>Get Insured <br> on-the-go</strong><br>
          Purchase policy online and <br> get insured instantly
        </p>
      </li>
      <li>
        <div class="img-info">
           <img class="img-responsive center-block" src="img/leading.svg" alt="image">
        </div>
        <p>
          <strong>Leading <br> Insurance Partners</strong><br>
          Partnered with leading and <br> trusted insurance giants <br> of the country
        </p>
      </li>
     </ul>
  </div>
</section>
<!-------------------------------------------------------------
---------Info Graphic design End Here for Full screen----------
--------------------------------------------------------------->
<!-------------------------------------------------------------
-----------Partner company End Here for Full screen------------
--------------------------------------------------------------->
<section id="brandSlider">
<h1>Our Insurance Partner</h1>
<div id="brand-slider">
    <div class="container-fluid">
  
       <div class="customer-logos slider">
          <div class="slide"><a href="#"><img src="img/progoti-life.png"></a></div>
          <div class="slide"><a href="#"><img src="img/green-life.png"></a></div>
          <div class="slide"><a href="#"><img src="img/chartered-life.png"></a></div>
          <div class="slide"><a href="#"><img src="img/delta-life.png"></a></div>
          <div class="slide"><a href="#"><img src="img/metlife1.png"></a></div>
          <div class="slide"><a href="#"><img src="img/Rupali1.png"></a></div>
          <div class="slide"><a href="#"><img src="img/progoti-life.png"></a></div>
          <div class="slide"><a href="#"><img src="img/green-life.png"></a></div>
          <div class="slide"><a href="#"><img src="img/delta-life.png"></a></div>

       </div>
  </div>
</div>
</section>

<!-------------------------------------------------------------
------------------Pakage ard company End Here-------------------
---------------------------------------------------------------> 

<section id="pakagesCard">
  <h1>You choose, we Assure Health</h1><br><br>
  <div class="container">
    <div class="row">
<?php 
require_once('php/databaseConnect.php');

$viewPolicy = "SELECT * FROM `insurance_info` ";
$viewPolicyResult = mysqli_query($connect,$viewPolicy);

if ($viewPolicyResult == true) {
  while ($row = mysqli_fetch_array($viewPolicyResult)) {
      $insurance_id = $row['insurance_id'];
      $insurance_type = $row['insurance_type'];
      $policy_title = $row['policy_title'];
      $policy_icon = $row['policy_icon'];
      $policy_delete = $row['policy_delete'];
      if ($policy_delete == 0) {
          ?>
      <div class="col-md-6 mb-5">
        <img class="img-responsive center-block" src="img/policy/<?php echo $policy_icon;?>.svg" alt="image" width="250" height="150"><br><br>
        <h3><?php echo $insurance_type; ?></h3> <br><br>
        <textarea cols="50" rows="5" class="text-center border-0" readonly ><?php echo $policy_title; ?></textarea><br>
        <a class="btn btn-outline-primary font-weight-bold px-5" href="package.php?policyID=<?php echo $insurance_id; ?>">See Pakages <i class="fa fa-angle-right"></i></a>
      </div>
<?php
      }
  }
}
 ?>
      <!-- <div class="col-md-6 ">
        <img class="img-responsive center-block" src="img/automobiles.svg" alt=""><br><br>
        <h3>Automobiles</h3><br><br>
        <p>A worry-free journey ensured with our convenient combos of Motor & Life/Health insurance coverage.</p><br>
        <a class="btn btn-info"data-toggle="modal" data-target="#myModalAuto" href="">See Pakages <i class="fa fa-angle-right"></i></a>
      </div> -->
    </div>
  </div>
</section>
<!-- Trigger the modal with a button -->
<!-- Modal -->
<div id="myModalAuto" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content bg-secondary">
      <div class="modal-header bg-primary">
        <h4 class="modal-title text-light text-center">Automobiles</h4>
      </div>
      <div class="modal-body text-center">
        <p>coming soon....</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-------------------------------------------------------------
------------------Process Step start Here-------------------
--------------------------------------------------------------->
<section id="itWork">
        <h3>HOW IT WORKS</h3>
      <h6>Get insured with few clicks</h6>
  <div class="container">
    <div class="row">
       <div class="col-md-4">
        <img class="img-responsive center-block" src="img/step-one.svg" alt="">
        <h3>STEP-1</h3>
        <p>Pick your preferred Guardians Health policy package</p>
      </div>
             <div class="col-md-4">
        <img class="img-responsive center-block" src="img/step-two.svg" alt="">
        <h3>STEP-2</h3>
        <p>Provide minimal information & pay online with ease</p>
      </div>
             <div class="col-md-4">
        <img class="img-responsive center-block" src="img/step-three.svg" alt="">
        <h3>STEP-3</h3>
        <p>Get your policy copy instantly</p>
      </div>
    </div>
  </div>
</section>

<!-------------------------------------------------------------
--------------------------Footer Start here--------------------
--------------------------------------------------------------->
<?php include 'footer.php';?>
<!-------------------------------------------------------------
--------------------------Footer End here-----------------------
--------------------------------------------------------------->



<button class="btn btn-outline-dark float-right shadow_top_btn " onclick="topFunction()" id="topBtn" title="Go to top">
  <i class="fas fa-arrow-circle-up"></i>
</button>
<script >
    //Get the button
    var mybutton = document.getElementById("topBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {
        mybutton.style.display = "block";
        var element = document.getElementById("topNav");
        element.classList.add("navShadow");
    } else {
        mybutton.style.display = "none";
        var element = document.getElementById("topNav");
        element.classList.remove("navShadow");
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
} 
</script>


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