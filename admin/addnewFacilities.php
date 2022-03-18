<?php
session_start();
require_once("php/databaseConnect.php");


if(!isset($_SESSION['username']))
{
	header("location: index.php");
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

<body data-spy="scroll" data-target="#demo" data-offset="70">

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
    <div class="mx-3 w-100" id="moneyRecharge" style="display: block;">
      <h3 class="d-flex flex-row justify-content-between">

        <div class="font-weight-bolder"> Add New Facilities </div>
      </h3>
      <form action="php/addnewFacilities.php" method="POST"  enctype="multipart/form-data">
        <table class="table table-striped table-hover table-responsive ">
            <tbody class="text-primary">
                <tr class="text-light font-weight-bold">
                    <td class="w-25 text-primary " >Package Name</td>
                    <td class="w-75">
                        <div class="input-group w-100 ">
                            <select class="custom-select font-weight-bolder border border-primary" id="selectInsurance" aria-label="Example select with button addon" required>
                                <option value="">Select Package Name</option>
                                <?php 
                                    $sql = "SELECT * FROM `package`";
                                    $result=mysqli_query($connect, $sql);
                                        
                                    if ($result == true) {
                                      while($row=mysqli_fetch_array($result))
                                      { 
                                        $package_id=$row['package_id'];
                                        $package_name=$row['package_name'];
                                        $package_delete=$row['package_delete'];

                                        if ($package_delete == 0) {
                                      ?>
                                        <option value="<?php echo $package_id; ?>">
                                          <?php echo $package_name; ?>
                                        </option>
                                      <?php
                                          }
                                      }
                                    }
                                  ?>
                            </select>
                            <div class="input-group-append ">
                                <button onclick="selectPackage();" class="btn btn-outline-primary font-weight-bolder" type="button" >Select Package</button>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="text-light font-weight-bold">
                    <td class="w-25 text-primary " >Package Id</td>
                    <td class="w-75">
                        <input type="number" name="package_id" class="w-100" placeholder="Package Id" class="bg-light" readonly id="package_id" min="1">
                    </td>
                </tr>
                <tr class="text-light font-weight-bold">
                    <td class="w-25 text-primary " >Facilities Name</td>
                    <td class="w-75">
                    <textarea name="FacilitiesName" id="" cols="100" rows="1" required placeholder="Enter Facilities Name" class="bg-light" ></textarea>
                    </td>
                </tr>
                <tr class="text-light font-weight-bold">
                    <td class="w-25 text-primary " >Facilities Price</td>
                    <td class="w-75">
                        <input type="number" name="facilities_Price" class="w-100" required placeholder="Enter Facilities Price" class="bg-light" >
                    </td>
                </tr>
                </tr>
                <tr class=" text-light font-weight-bold w-100">
                    <td class="w-100">
                        <a href="viewFacilitiesList.php" class="btn btn-outline-danger w-100" >Cancel</a>
                    </td>
                    <td class="w-100">
                        <button type="submit" [disabled]="!form.form.valid" class="btn btn-outline-success w-100" >Save</button>
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
  <script>
//Get the button
var mybutton = document.getElementById("topBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 40  || document.documentElement.scrollTop > 40) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

function selectPackage(){
    
    var no = document.getElementById("selectInsurance");
    var option = no.options[no.selectedIndex].value;
    document.getElementById("package_id").value = option;
  
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
