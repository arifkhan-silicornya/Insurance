<?php
session_start();
require_once("php/databaseConnect.php");


if(!isset($_SESSION['username']))
{
	header("location: index.php");
}

?>
<?php 
$pid = $_REQUEST['Packageid'];

if (isset($_REQUEST['Packageid'])) {
    $sql= "SELECT * FROM `facilities`  WHERE `facilities_id`='$pid' ";
    $result=mysqli_query($connect, $sql);
    if ($result == true) {
        while($row=mysqli_fetch_array($result))
        {
            $facilities_id = $row['facilities_id'];
            $facilities_name = $row['facilities_name'];
            $facilities_price = $row['facilities_price'];
            $image = $row['image'];
            $package_id = $row['package_id'];
            $status = $row['status'];
        }
    } else {
        header("location:../viewInsuranceList.php?Failed_error :".mysqli_error($sql));
    }
    $Packageid = $_REQUEST['Packageid'];
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
  <title>Update Facilities</title>
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
      <h3 class="d-flex flex-row justify-content-between">Update Facilities</h3>
      <form action="php/updatefacilities.php" method="POST" enctype="multipart/form-data">
        <table class="table table-striped table-bordered table-hover table-responsive ">
            <tbody class="text-primary">
                <tr class="text-light font-weight-bold">
                    <td class="w-25 text-primary " >Package Id</td>
                    <td class="w-75">
                        <input type="number" readonly name="package_id" class="w-100" placeholder="Package Id" class="bg-light" value="<?php echo $facilities_id ; ?>" required>
                    </td>
                </tr>
                <tr class="text-light font-weight-bold">
                    <td class="w-25 text-primary " >Facilities Id</td>
                    <td class="w-75">
                        <input type="number" readonly name="faci_id" class="w-100" placeholder="Facilities Id" class="bg-light" value="<?php echo $pid ; ?>" required>
                    </td>
                </tr>
                <tr class=" text-light font-weight-bold">
                    <td class="text-primary ">Facilities  Name </td>
                    <td>
                       <textarea name="faci_name" cols="100" rows="6" placeholder="Enter Facilities Name" class="bg-light" ><?php echo $facilities_name; ?></textarea>
                    </td>
                </tr>
                <tr class="text-light font-weight-bold">
                    <td class="w-25 text-primary " >Facilities Price</td>
                    <td class="w-75">
                        <input type="number" name="faci_price" class="w-100" placeholder="Enter Facilities price" class="bg-light" value="<?php echo $facilities_price; ?>">
                    </td>
                </tr>
                
                <tr class=" text-light font-weight-bold w-100">
                    <td class="w-100">
                        <a href="viewFacilitiesList.php" class="btn btn-outline-danger w-100" onclick="return confirm('Cancel \n\nAre you Sure?');" >Cancel</a>
                    </td>
                    <td class="w-100">
                        <button type="submit" class="btn btn-outline-success w-100" onclick="return confirm('Are you Sure?');" >Save</button>
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
