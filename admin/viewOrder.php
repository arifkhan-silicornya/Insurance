<?php
session_start();
require_once("php/databaseConnect.php");


if(!isset($_SESSION['username']))
{
	header("location: index.php");
}

require_once("php/databaseConnect.php");
$sql="SELECT * FROM `orders` ";
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
    <h3 class="d-flex flex-row justify-content-between pl-2">Order List</h3>
      <table class="table table-light border table-striped  table-bordered table-hover">
        <thead class="text-center">
          <tr class=" bg-primary text-light font-weight-bold ">
            <td>Order Id</td>
            <td>cus_id</td>
            <td>NID</td>
            <td>Name</td>
            <td>E-mail</td>
            <td>Phone Number</td>
            <td>Insurance Id</td>
            <td>Package Id</td>
            <td>Payment / Active</td>
            <td>Action</td>
          </tr>
        </thead>
        <tbody>
            <?php
        while($row=mysqli_fetch_array($Result))
          { 
            $order_id = $row['order_id'];
            $customer_id = $row['customer_id'];
            $customer_nid = $row['customer_nid'];
            $customer_name = $row['customer_name'];
            $package_id = $row['package_id'];
            $phone_number = $row['phone_number'];
            $email = $row['email'];
            $payment_status = $row['payment_status'];
            $nominee_nid = $row['nominee_nid'];
            $order_time = $row['order_time'];
            $order_cancel = $row['order_cancel'];

            $sqlPackage = "SELECT * FROM `package` where `package_id` = '$package_id' ";
            $sqlPackageResult = mysqli_query($connect,$sqlPackage);
                while($row5 = mysqli_fetch_array($sqlPackageResult))
                { 
                    $insurance_id = $row5['insurance_id'];      
                }
            if ($order_cancel == 0) {
                
            ?>
          <tr class="text-center ">
            <td class=""><a href="#" class="btn btn-primary"> <?php echo $order_id;?> </a></td>
            <td class=""><a href="#" class="btn btn-primary"> <?php echo $customer_id;?></a></td>
            <td class=""> <?php echo $customer_nid;?> </td>
            <td class=""> <?php echo $customer_name;?> </td>
            <td class=""> <?php echo $email;?> </td>
            <td class=""> <?php echo $phone_number;?> </td>
            
            <td class=""><a href="#" class="btn btn-primary"> <?php echo $insurance_id;?></a></td>
            <td class=""><a href="#" class="btn btn-primary"> <?php echo $package_id;?></a></td>
            <?php if($payment_status == 0){?>
            <td class="btn btn-danger mt-2 py-2"> Unpaid </td>
            <td class="btn btn-success mt-2 py-2"> Active </td>
            <td class="mt-3 ">
              <a href="php/updateOrder.php?order_id=<?php echo $order_id;?>&id=1" class="btn btn-outline-primary mb-1">Confirm Paid</a>
              <a href="php/deleteOrder.php?order_id=<?php echo $order_id;?>&id=1" class="btn btn-outline-primary">Delete</a>
            </td>
            <?php }else{ ?>
            <td class="btn btn-success mt-2 py-2"> Paid </td>
            <td class="btn btn-success mt-2 py-2"> Active </td>
            <td class="mt-3 ">
              <a href="php/updateOrder.php?order_id=<?php echo $order_id;?>&id=0" class="btn btn-outline-primary mb-1">Do Unpaid Payment</a>
              <a href="php/deleteOrder.php?order_id=<?php echo $order_id;?>&id=1" class="btn btn-outline-primary">Delete</a>
            </td>
            <?php }?>
          </tr>
          
          <?php 
          }
          else{
              
          ?> 
          <tr class="text-center ">
            <td class=""><a href="#" class="btn btn-primary"> <?php echo $order_id;?> </a></td>
            <td class=""><a href="#" class="btn btn-primary"> <?php echo $customer_id;?></a></td>
            <td class=""> <?php echo $customer_nid;?> </td>
            <td class=""> <?php echo $customer_name;?> </td>
            <td class=""> <?php echo $email;?> </td>
            <td class=""> <?php echo $phone_number;?> </td>
            
            <td class=""><a href="#" class="btn btn-primary"> <?php echo $insurance_id;?></a></td>
            <td class=""><a href="#" class="btn btn-primary"> <?php echo $package_id;?></a></td>
            
           <?php if($payment_status == 0){?>
            <td class="btn btn-danger mt-2 py-2"> Unpaid </td>
            <td class="btn btn-danger mt-2 py-2"> De-active </td>
            <td class="mt-3 ">
              <a href="php/updateOrder.php?order_id=<?php echo $order_id;?>&id=1" class="btn btn-outline-primary mb-1">Confirm Paid</a>
              <a href="php/deleteOrder.php?order_id=<?php echo $order_id;?>&id=0" class="btn btn-outline-primary ">Do Active</a>
            </td>
            <?php }else{ ?>
            <td class="btn btn-success mt-2 py-2"> Paid </td>
            <td class="btn btn-danger mt-2 py-2"> De-active </td>
            <td class="mt-3 ">
              <a href="php/updateOrder.php?order_id=<?php echo $order_id;?>&id=0" class="btn btn-outline-primary mb-1">Do Unpaid Payment</a>
              <a href="php/deleteOrder.php?order_id=<?php echo $order_id;?>&id=0" class="btn btn-outline-primary ">Do Active</a>
            </td>
            <?php }?>
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
