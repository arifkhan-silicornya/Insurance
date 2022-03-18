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
      <div class="font-weight-bolder"> Add New Package </div>
        <div class="input-group w-50 ">
            <select class="custom-select font-weight-bolder border border-primary" id="selectInsurance" aria-label="Example select with button addon" required>
                <option value="">Select policy Name</option>
                <?php 
                $sql = "SELECT * FROM `insurance_info`";
                $result=mysqli_query($connect, $sql);
                    
                if ($result == true) {
                  while($row=mysqli_fetch_array($result))
                  { 
                    $insurance_id=$row['insurance_id'];
                    $policy_name=$row['insurance_type'];
                    $policy_title=$row['policy_title'];
                    $policy_delete=$row['policy_delete'];
                    $create_date=$row['create_date'];

                    if ($policy_delete == 0) {
                  ?>
                <option value="<?php echo $insurance_id; ?>"><?php echo $policy_name; ?></option>
                <?php
                      }
                  }
                }
                ?>
            </select>
            <div class="input-group-append ">
                <button onclick="selectInsurance();" class="btn btn-outline-primary font-weight-bolder" type="button">Select</button>
            </div>
        </div>
      </h3>
      <form action="php/addNewpackagge.php" method="post">
        <table class="table table-striped table-bordered table-hover table-responsive ">
            <tbody class="text-primary">
            <tr class="text-light font-weight-bold">
                    <td class="w-25 text-primary " >Insurance Id</td>
                    <td class="w-75">
                        <input type="number" readonly name="policy_id" class="w-100" placeholder="Policy Id" class="bg-light" id="policy_id" required min="1">
                    </td>
                </tr>
                <tr class="text-light font-weight-bold">
                    <td class="w-25 text-primary " >Package Name</td>
                    <td class="w-75">
                        <input type="text" name="package_name" class="w-100" required placeholder="Enter Package Name" class="bg-light" >
                    </td>
                </tr>
                <tr class=" text-light font-weight-bold">
                    <td class="text-primary ">Package description</td>
                    <td>
                       <textarea name="package_title" id="" cols="100" rows="6" required placeholder="Enter Package title" class="bg-light" ></textarea>
                    </td>
                </tr>
                <tr class="text-light font-weight-bold">
                    <td class="w-25 text-primary " >Premium</td>
                    <td class="w-75">
                        <input type="number" name="premium" class="w-100" required placeholder="Premium Price" class="bg-light" >
                    </td>
                </tr>
                <tr class="text-light font-weight-bold">
                    <td class="w-25 text-primary " >Coverage</td>
                    <td class="w-75">
                        <input type="number" name="covergae" class="w-100" required placeholder="Coverage Price" class="bg-light" >
                    </td>
                </tr>
                
                <tr class=" text-light font-weight-bold w-100">
                    <td class="w-100">
                        <a href="viewPackageList.php" class="btn btn-outline-danger w-100" >Cancel</a>
                    </td>
                    <td class="w-100">
                        <button type="submit" [disabled]="!form.form.valid" class="btn btn-outline-success w-100" onclick="validform(); " >Save</button>
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


function selectInsurance(){
    
  var no = document.getElementById("selectInsurance");
  var option = no.options[no.selectedIndex].value;
  document.getElementById("policy_id").value = option;


}

function validform(){
  let inpObj = document.getElementById("policy_id").value;
  if (inpObj < '1' ) {
    alert('Policy Not Found');
    return False;
  }
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
  
  <script src="js/custom.js"></script>

</body>

</html>
