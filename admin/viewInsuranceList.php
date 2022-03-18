<?php
session_start();
require_once("php/databaseConnect.php");


if(!isset($_SESSION['username']))
{
	header("location: index.php");
}

?>
<?php

require_once("php/databaseConnect.php");
$sql="SELECT * FROM `insurance_info` ";
$Result=mysqli_query($connect,$sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Insurance</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../css/fontawesome.min.css">
  <link rel="stylesheet" href="../css/all.min.css">
  <link rel="stylesheet" href="../css/brands.css">
  <link rel="stylesheet" href="../css/solid.css">
  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <!-- <link href="css/mdb.min.css" rel="stylesheet"> -->
  <!-- Animation core CSS -->
  <link href="../css/animate.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/dashboard.css" rel="stylesheet">


  <style>
    .shadow_top_btn{
      color: #003399 ;
      background-color: #fff;
      box-shadow: #003399;
    }
    .shadow_top_btn:hover{
      color: #fff;
      background-color: #003399 ;
    }
  </style>

</head>

<body data-spy="scroll" data-target="#left_side" data-offset="70">

<!-------------------------------------------------------------
-------------Top navber Start Here for Full screen-------------
--------------------------------------------------------------->
<?php include 'navBar.php';?>


<div class="container-fluid d-flex">
<!-------------------------------------------------------------
-------------  Left sidebar  start  ----------------------------------
--------------------------------------------------------------->

<?php include 'sidebar.php';?>

<!-- ======================================================= left side end ===================================== -->

<div class="clearfix"></div>
<!-- ===================================== Right Side Start =========================================
     ================================================================================================
     =================================================================================================== -->


  <div class="py-2 px-2 border border-primary my-1 mx-auto w-100 d-flex " style="height: auto;">
    <div class="mx-0 w-100" id="moneyRecharge" style="display: block;">
      <h3 class="d-flex flex-row justify-content-between">Insurance List <a href="addnewInsurance.php" class="btn btn-outline-primary">Add new</a></h3>
      <table class="table table-light border table-striped table-responsive">
        <thead class="text-center border">
          <tr class=" bg-primary text-light font-weight-bold">
            <td>Policy Id</td>
            <td>Policy Name</td>
            <td>Policy Description</td>
            <td>Status</td>
            <td>Action</td>
            <td>Create Date</td>
          </tr>
        </thead>
        <tbody>
        <?php
        while($row=mysqli_fetch_array($Result))
          { 
            $insurance_id=$row['insurance_id'];
            $policy_name=$row['insurance_type'];
            $policy_title=$row['policy_title'];
            $policy_delete=$row['policy_delete'];
            $create_date=$row['create_date'];

            if ($policy_delete == 0) {
        ?>
          <tr>
            <td><?php echo $insurance_id; ?></td>
            <td><?php echo $policy_name; ?></td>
            <td><?php echo $policy_title; ?></td>
            <td> <button class="btn btn-sm btn-success">Active</button></td>
            <td>
              <a href="updatePolicy.php?policyid=<?php echo $insurance_id ;?>" class="btn btn-sm btn-outline-primary">Update</a>
              <a href="php/deletePolicy.php?policyid=<?php echo $insurance_id ;?>" onclick="return confirm('Disable Policy,\n\nDo you Agree?')" class="btn btn-outline-primary btn-sm">Delete</a>
            </td>
            <td><?php echo $create_date; ?></td>
          </tr>
          <?php 
          }
          else{
          ?>
          <tr>
            <td><?php echo $insurance_id; ?></td>
            <td><?php echo $policy_name; ?></td>
            <td><?php echo $policy_title; ?></td>
            <td> <button class="btn btn-sm btn-danger">De-actived</button></td>
            <td>
              <a href="updatePolicy.php?policyid=<?php echo $insurance_id ;?>" class="btn btn-sm btn-outline-primary ">Update</a>
              <a href="php/activePolicy.php?policyid=<?php echo $insurance_id ;?>" onclick="return confirm('Active Policy,\n\nDo you Agree?')" class="btn btn-outline-primary btn-sm">Do Active</a>
            </td>
            <td><?php echo $create_date; ?></td>
          </tr>
          <?php
            }
          }
          ?>
        </tbody>
      </table>   
    </div>
<!-- =============================  End ========================================-->
    </div>
</div>








<!-------------------------------------------------------------
--------------------------Footer Start here--------------------
--------------------------------------------------------------->
<?php include 'footer.php';?>
<!-------------------------------------------------------------
--------------------------Footer End here-----------------------
--------------------------------------------------------------->




<button class="btn float-right shadow_top_btn " onclick="topFunction()" id="topBtn" title="Go to top">
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
        var element = document.getElementById("navbar");
        element.classList.add("navShadow");
    } else {
        mybutton.style.display = "none";
        var element = document.getElementById("navbar");
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
  <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../js/mdb.min.js"></script>
  <!-- Company Brand Slider -->
  <script src="../js/brandSlider.js"></script>

</body>

</html>
