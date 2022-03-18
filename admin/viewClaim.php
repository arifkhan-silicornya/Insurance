<?php
session_start();
require_once("php/databaseConnect.php");


if(!isset($_SESSION['username']))
{
	header("location: index.php");
}

require_once("php/databaseConnect.php");
$sql="SELECT * FROM `claim` ";
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


  <div class="py-2 border border-primary my-1 mx-auto w-100 d-flex " style="height: auto;">
    <div class="mx-0 w-100" id="moneyRecharge" style="display: block;">
    <h3 class="d-flex flex-row justify-content-between pl-2">Claim List</h3>
      <table class="table table-light border table-striped  table-bordered table-hover">
        <thead class="text-center">
          <tr class=" bg-primary text-light font-weight-bold ">
            <td>Claim Id</td>
            <td>Email Id</td>
            <td>Image 1</td>
            <td>Image 2</td>
            <td>Image 3</td>
            <td>Month - Year</td>
            <td>feedback</td>
            <td>Status</td>
            <td>Action</td>
          </tr>
        </thead>
        <tbody>
            <?php
        while($row=mysqli_fetch_array($Result))
          { 
            $claim_id = $row['claim_id'];
            $file_1 = $row['file_1'];
            $file_2 = $row['file_2'];
            $file_3 = $row['file_3'];
            $month_year = $row['month_year'];
            $order_id = $row['order_id'];
            $faci_id = $row['faci_id'];
            $user_email = $row['user_email'];
            $status = $row['status'];
            $feedback = $row['feedback'];
            $claim_delete = $row['claim_delete'];

            
            if ($claim_delete == 0) {
                
            ?>
          <tr class="text-center ">
            <td class=""><a href="#" class="btn btn-primary"> <?php echo $claim_id;?> </a></td>
            <td class=""><a href="#" class=""> <?php echo $user_email;?> </a></td>
            <td class=""> <a href="../img/user/prove/<?php echo $file_1;?>.jpg"> <img src="../img/user/prove/<?php echo $file_1;?>.jpg" alt="img1" height="40" width="40"> </a> </td>
            <td class=""> <a href="../img/user/prove/<?php echo $file_2;?>.jpg"> <img src="../img/user/prove/<?php echo $file_2;?>.jpg" alt="img2" height="40" width="40"> </a> </td>
            <td class=""> <a href="../img/user/prove/<?php echo $file_3;?>.jpg"> <img src="../img/user/prove/<?php echo $file_3;?>.jpg" alt="img3" height="40" width="40"> </a> </td>
            <td class=""> <?php echo $month_year;?> </td>
            <td class=""> <?php echo $feedback;?> </td>
            
            <?php if($status == 0){?>
            <td class="btn btn-danger mt-2 py-2"> Pending </td>
            
            <?php }elseif($status == 1){ ?>
            <td class="btn btn-success mt-2 py-2"> Confirm </td>
            
            <?php }else{?>
            <td class="btn btn-warning mt-2 py-2"> Cancel </td>
            <?php }?>
            <td class="mt-3 ">
              <a href="php/updateClaim.php?order_id=<?php echo $claim_id;?>&id=1" class="btn btn-outline-primary ">Confirm</a>
              <a href="php/updateClaim.php?order_id=<?php echo $claim_id;?>&id=2" class="btn btn-outline-primary">Cancel</a>
              <a href="php/updateClaim.php?order_id=<?php echo $claim_id;?>&id=0" class="btn btn-outline-primary mt-1">Re Pending</a>
            </td>
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
