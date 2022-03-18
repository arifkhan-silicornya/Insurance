<?php 
require_once('php/databaseConnect.php');
if (isset($_REQUEST['policyID'])) {
  $policyID = $_REQUEST['policyID'];

  $viewPolicy = "SELECT * FROM `insurance_info` where `insurance_id` = '$policyID' ";
  $viewPolicyResult = mysqli_query($connect, $viewPolicy);
  if ($viewPolicyResult == true) {
      while ($row = mysqli_fetch_array($viewPolicyResult)) {
          $insurance_id = $row['insurance_id'];
          $insurance_type = $row['insurance_type'];
          $policy_title = $row['policy_title'];
          $policy_icon = $row['policy_icon'];
          $policy_delete = $row['policy_delete'];
          if ($policy_delete == 0) {
          } else {
              header("location: home.php");
          }
      }
  }else {
    header("location: home.php");
  }
}else {
  header("location: home.php");
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
  <link href="scssNew/style3.css" rel="stylesheet">

<style>
#topNav {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  font-size: 20px;
  z-index: 99999999;
}
#package{
  max-width: 900px;
  margin-top: -100px;
}
.navShadow{
    box-shadow: 0px 3px 7px 1px rgba(67,64,64,0.86);
    -webkit-box-shadow: 0px 3px 7px 1px rgba(67,64,64,0.86);
    -moz-box-shadow: 0px 3px 7px 1px rgba(67,64,64,0.86);
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

  </style>

</head>

<body class=" bg-light ">

<?php include 'topNav.php';?>
<!-------------------------------------------------------------
-------------Top navber End hera-------------------------------
--------------------------------------------------------------->
<section id="health-bg" class="bg-primary text-light py-5">
 <div class="container text-center my-5">
   <div class="row">
     <div class="col-md-12">
       <h4 class=""><?php echo $insurance_type;?></h4>
       <p class="my-3">For 1 year</p>
     </div>
   </div>
 </div>
 </section>
<!-------------------------------------------------------------------------------------------
------------------------------ single product card-1 ----------------------------------------
--------------------------------------------------------------------------------------------->
<?php 
$viewPackage = "SELECT * FROM `package` where `insurance_id` = '$policyID' ";
$viewPackageResult = mysqli_query($connect, $viewPackage);
if ($viewPackageResult == true) {
    while ($row = mysqli_fetch_array($viewPackageResult)) {
      $package_id = $row['package_id'];
      $package_name = $row['package_name'];
      $premium = $row['premium'];
      $coverage = $row['coverage'];
      $package_title = $row['package_title'];
      $package_delete = $row['package_delete'];
      if ($package_delete == 0) {
?>
<section id="package" class="mx-auto mb-5 py-4 px-5 ">
    <div class="d-flex flex-row justify-content-between bg-secondary  py-4 px-5 ">
      <div>
        <h5 class="text-primary "><?php echo $package_name; ?></h5>
        <small class="text-dark"><textarea cols="40" rows="2" class="bg-secondary border-0" readonly ><?php echo $package_title; ?></textarea><br></small>
      </div>|
      <div>Premium - BDT <span><?php echo $premium; ?></span></div>|
      <div class="text-primary">
        <div class="float-right ">  Coverage </div> 
        <div class="font-weight-bold"> BDT <span><?php echo $coverage; ?></span> </div>
      </div>
    </div>
<?php 
$viewFacilities = "SELECT * FROM `facilities` where `package_id` = '$package_id' ";
$viewFacilitiesResult = mysqli_query($connect, $viewFacilities);
if ($viewFacilitiesResult == true) {
    while ($row = mysqli_fetch_array($viewFacilitiesResult)) {
      $facilities_id = $row['facilities_id'];
      $facilities_name = $row['facilities_name'];
      $facilities_price = $row['facilities_price'];
      $image = $row['image'];
      $package_id = $row['package_id'];
      $status = $row['status'];
      if ($status == 0) {
?>
    <div class="d-flex flex-row justify-content-between mb-3 py-4 px-5 bg-light border border-top-0 border-left-0 border-right-0 ">
      <div class=""> 
        <span> <?php echo $facilities_name; ?> </span> 
      </div>
      <div class="font-weight-bold"> BDT <?php echo $facilities_price; ?> </div>
    </div>
<?php 
    }
  }
}
?>
    <div class=" mx-auto w-100 text-center btn-lg"><a href="dtailspackage.php?packageID=<?php echo $package_id; ?>" class="btn btn-outline-primary px-5 py-2">Details > </a></div>

    <div class="mb-5"></div>
</section>
<?php 
    }
  }
}
?>








<!-------------------------------------------------------------
--------------------------Footer Start here--------------------
--------------------------------------------------------------->
<?php include 'footer.php';?>
<!-------------------------------------------------------------
--------------------------Footer End here-----------------------
--------------------------------------------------------------->

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

</body>

</html>
