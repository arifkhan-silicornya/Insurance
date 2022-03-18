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

$pid = $_REQUEST['policyid'];

if (isset($_REQUEST['policyid'])) {
    $sql= "SELECT * FROM `insurance_info`  WHERE `insurance_id`='$pid' ";
    $result=mysqli_query($connect, $sql);
    if ($result == true) {
        while($row=mysqli_fetch_array($result))
        {
            $policy_name=$row['insurance_type'];
            $policy_title=$row['policy_title'];
        }
    } else {
        header("location:../viewInsuranceList.php?Failed_error :".mysqli_error($sql));
    }
    $policyid = $_REQUEST['policyid'];
}
else {
    header("location:../viewInsuranceList.php?ValueNotFound");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Update Insurance</title>
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

<body>

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


  <div class="py-2 pl-3 border border-primary my-1 mx-auto w-100 d-flex " style="height: auto;">
    <div class="mx-5 w-100" id="moneyRecharge" style="display: block;">
      <h3 class="d-flex flex-row justify-content-between">Add New Insurance</h3>
      <form action="php/updatePolicy.php" method="POST">
        <table class="table table-striped table-bordered table-hover table-responsive ">
            <tbody class="text-primary">
                <tr class="text-light font-weight-bold">
                    <td class="w-25 text-primary " >Policy Id</td>
                    <td class="w-75">
                        <input type="number" name="policy_id" class="w-100" required placeholder="Policy Id" class="bg-light" required readonly value="<?php echo $policyid; ?>">
                    </td>
                </tr>
                <tr class="text-light font-weight-bold">
                    <td class="w-25 text-primary " >Policy Name</td>
                    <td class="w-75">
                        <input type="text" name="policy_name" class="w-100" required placeholder="Enter Policy Name" class="bg-light" required value="<?php echo $policy_name; ?>">
                    </td>
                </tr>
                <tr class=" text-light font-weight-bold">
                    <td class="text-primary ">Policy Description</td>
                    <td>
                       <textarea name="policy_title" id="" cols="100" rows="4" required placeholder="Enter Policy title" class="bg-light" required ><?php echo $policy_title; ?></textarea>
                    </td>
                </tr>
                <tr class=" text-light font-weight-bold w-100">
                    <td class="w-100">
                        <a href="viewInsuranceList.php" class="btn btn-outline-danger w-100" onclick="return confirm('Cancel \n\nAre you Sure?');" >Cancel</a>
                    </td>
                    <td class="w-100">
                        <button type="submit" [disabled]="!form.form.valid" class="btn btn-outline-success w-100" onclick="return confirm('Are you Sure?')" >Save</button>
                    </td>
                </tr>
            </tbody>
        </table>
      </form>

        
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
