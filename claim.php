<?php
if(!isset($_COOKIE['usercookie'])){
    header("location: index.php?LoginFirst");    
}
require_once('php/databaseConnect.php');

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>dashboard</title>
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

    <style>
        .bg-color{
            background: radial-gradient(circle,#0075b9 0,#002c5d 100%);
            /* background-color: rgba(0,0,0,.2); */
        }
        .user-profile-image{
            height: 100px;
            width: 100px;   
        }
        .responsive-screen{
            width: 350px;
            height: auto;
        }
        .popUpConfirmDiv{
            width : 100%;
            height : 85%;
            position:fixed;
            top:15%;
            left:0%;
            display:none;

            
        }
        @media (max-width: 767.98px) {
            .responsive-screen{
                width : 100%;
            } 

        }
    </style>
</head>

<body  class=" text-primary">
<!-- ......................header file included..................... -->
<?php include 'topNav.php';?>

<?php 

$userEmai= $_COOKIE['usercookie'];

$viewUser = "SELECT * FROM `user` where  `email` = '$userEmai' ";
$viewUserConnect = mysqli_query($connect,$viewUser);
if ($viewUserConnect == true) {
    while ($row = mysqli_fetch_array($viewUserConnect)) {
        $user_id = $row['user_id'];
        $nid_number = $row['nid_number'];
        $name = $row['name'];
        $email = $row['email'];
        $phoneNumber = $row['phoneNumber'];
        $profile_picture = $row['profile_picture'];
        $gender = $row['gender'];
    }
    
    $viewaddress = "SELECT * FROM `address` where  `email` = '$email' ";
    $viewUserAddressConnect = mysqli_query($connect,$viewaddress);
    if ($viewUserAddressConnect == true) {
        while ($row2 = mysqli_fetch_array($viewUserAddressConnect)) {
            $address_id = $row2['address_id'];
            $preAddress = $row2['preAddress'];
            $perAddress = $row2['perAddress'];
        }
    }
}

?>



<div class="container-fluid d-md-flex d-block">
    <!-- ..............left side Start.............. -->
        <aside class="responsive-screen py-5 px-3 my-3 mr-2 border border-primary float-left clearfix d-block" >
            <div class=" user-profile-image mx-auto">
                <img src="img/user/profile/<?php echo $profile_picture; ?>.jpg" class="rounded-circle border border-rounded "  alt="user-profile" style="height: 100px;width:100px;">
            </div>
            <div class="text-center font-weight-bold my-3"> <?php echo $name;?> </div><br><br>

            <div><button onclick="cus_order_details()" class=" w-100 btn border border-primary d-block px-4 mx-2 my-1">Claim </button>  </div>
            <div><button onclick="changePassword()" class=" w-100 btn border border-primary d-block px-4 mx-2 my-1">History </button>  </div>

        </aside>
<!-- ..............left side end.............. -->
<div class="clearfix"></div>

    <!-- =============================== Right Update Start ===================================== -->
<div class="pb-5 pl-0 border border-primary my-3 mx-auto w-100 d-flex " style="height: auto;">
                
    <!-- ================================= Change Password Start ======================================== -->
<div class="mx-0 w-100" id="changePassword" style="display: none;">
<table class="table table-hover table-striped table-bordered w-100">
  <thead class="thead-dark text-center">
    <tr>
      <th scope="col">Sr. No.</th>
      <th scope="col">Image 1</th>
      <th scope="col">Image 2</th>
      <th scope="col">Image 3</th>
      <th scope="col">Month-Year</th>
      <th scope="col">Order ID</th>
      <th scope="col">Facility ID</th>
      <th scope="col">Status</th>
      <th scope="col">Comments</th>
    </tr>
  </thead>
  <tbody>
<?php
$userEmail = $_COOKIE['usercookie'];
$viewclaim = "SELECT * FROM `claim` where `user_email` = '$userEmail' ";
$viewclaimResult = mysqli_query($connect,$viewclaim);

if ($viewclaimResult == true) {
  while ($row4 = mysqli_fetch_array($viewclaimResult)) {
      $claim_id = $row4['claim_id'];
      $file_1 = $row4['file_1'];
      $file_2 = $row4['file_2'];
      $file_3 = $row4['file_3'];
      $month_year = $row4['month_year'];
      $order_id = $row4['order_id'];
      $faci_id = $row4['faci_id'];
      $status = $row4['status'];
      $feedback = $row4['feedback'];
      $claim_delete = $row4['claim_delete'];
      
      if($claim_delete == 0 ){
          
?>
    <tr class="text-center">
      <th scope="row"><?php echo $claim_id;?></th>
      <td><a href="img/user/prove/<?php echo $file_1;?>.jpg"><img src="img/user/prove/<?php echo $file_1;?>.jpg" alt="img1" height="30" width="30"></a></td>
      <td><a href="img/user/prove/<?php echo $file_2;?>.jpg"><img src="img/user/prove/<?php echo $file_2;?>.jpg" alt="img2" height="30" width="30"></a></td>
      <td><a href="img/user/prove/<?php echo $file_3;?>.jpg"><img src="img/user/prove/<?php echo $file_3;?>.jpg" alt="img3" height="30" width="30"></a></td>
      <td scope="row"><?php echo $month_year;?></td>
      <td scope="row"><?php echo $order_id;?></td>
      <td scope="row"><?php echo $faci_id;?></td>
      <td class="text-light font-weight-bold bg-danger" scope="row"><?php if($status == 0){ echo "Pending";}elseif($status == 1){ echo "Confirm" ;}else{ echo "Cancel";}?></td>
      <td scope="row"><?php echo $feedback;?></td>
    </tr>
<?php }else{?>
    <tr class="text-center">
      <th scope="row"><?php echo $claim_id;?></th>
      <td><a href="img/user/prove/<?php echo $file_1;?>.jpg"><img src="img/user/prove/<?php echo $file_1;?>.jpg" alt="img1" height="30" width="30"></a></td>
      <td><a href="img/user/prove/<?php echo $file_2;?>.jpg"><img src="img/user/prove/<?php echo $file_2;?>.jpg" alt="img2" height="30" width="30"></a></td>
      <td><a href="img/user/prove/<?php echo $file_3;?>.jpg"><img src="img/user/prove/<?php echo $file_3;?>.jpg" alt="img3" height="30" width="30"></a></td>
      <td scope="row"><?php echo $month_year;?></td>
      <td scope="row"><?php echo $order_id;?></td>
      <td scope="row"><?php echo $faci_id;?></td>
      <td class="text-light font-weight-bold bg-success" scope="row"><?php echo "Cancel";?></td>
      <td scope="row"><?php echo $feedback;?></td>
    </tr>
<?php }}} ?>
  </tbody>
</table>
</div>

<!-- ================================= Change Password End ======================================== -->


        <!-- ================================= Order History Start =============================-->
<div class="mx-0 w-100" id="order_details_cus" style="display: block;">
    <table class="table table-striped table-light table-hover">
       <thead class="thead-dark text-center">
        <tr>
          <th scope="col">order_id</th>
          <th scope="col">Package name</th>
          <th scope="col">Premium</th>
          <th scope="col">Coverage</th>
          <th scope="col">Facility Name</th>
          <th scope="col">F Price</th>
          <th scope="col">Status</th>
          <th scope="col">Claim</th>
        </tr>
      </thead>
      <tbody class=" text-center">
<?php
$userEmail = $_COOKIE['usercookie'];
$viewOrder = "SELECT * FROM `orders` where `email` = '$userEmail' ";
$viewOrderResult = mysqli_query($connect,$viewOrder);

if ($viewOrderResult == true) {
  while ($row = mysqli_fetch_array($viewOrderResult)) {
      $order_id = $row['order_id'];
      $customer_id = $row['customer_id'];
      $customer_name = $row['customer_name'];
      $package_id = $row['package_id'];
      $phone_number = $row['phone_number'];
      $payment_status = $row['payment_status'];
      $nominee_nid = $row['nominee_nid'];
      $order_time = $row['order_time'];
      $order_cancel = $row['order_cancel'];
      
      $viewPackage = "SELECT * FROM `package` where `package_id` = '$package_id' ";
          $viewPackageResult = mysqli_query($connect,$viewPackage);
          while ($row2 = mysqli_fetch_array($viewPackageResult)) {
                
                $package_name = $row2['package_name'];
                $premium = $row2['premium'];
                $coverage = $row2['coverage'];
                $insurance_id = $row2['insurance_id'];
          }
          
          $viewInsurance = "SELECT * FROM `insurance_info` where `insurance_id` = '$insurance_id' ";
          $viewInsuranceResult = mysqli_query($connect,$viewInsurance);
          while ($row3 = mysqli_fetch_array($viewInsuranceResult)) {
              $insurance_type = $row3['insurance_type'];
          }
          
          $viewFacilities = "SELECT * FROM `facilities` where `package_id` = '$package_id' ";
          $viewFacilitiesResult = mysqli_query($connect,$viewFacilities);
          while ($row3 = mysqli_fetch_array($viewFacilitiesResult)) {
              $facilities_id = $row3['facilities_id'];
              $facilities_name = $row3['facilities_name'];
              $facilities_price = $row3['facilities_price'];
          
      if ($order_cancel == 0 && $payment_status == 0) {
          
    ?>
       
        <tr class="bg-danger">
          <th scope="row"><?php echo $order_id;?></th>
          <th scope="row"><?php echo $package_name;?></th>
          <th scope="row"><?php echo $premium;?></th>
          <th scope="row"><?php echo $coverage;?></th>
          <th scope="row"><?php echo $facilities_name;?></th>
          <th scope="row"><?php echo $facilities_price;?></th>
          <th colspan="2" class="text-warning">Unpaid</th>
        </tr> 
        <!-- Unpaid -->
        
        <?php }elseif($order_cancel == 0 && $payment_status == 1){?>
        <tr>
          <th scope="row"><?php echo $order_id;?></th>
          <th scope="row"><?php echo $package_name;?></th>
          <th scope="row"><?php echo $premium;?></th>
          <th scope="row"><?php echo $coverage;?></th>
          <th scope="row"><?php echo $facilities_name;?></th>
          <th scope="row"><?php echo $facilities_price;?></th>
          <th class="text-success">Paid</th>
          <th scope="row">
            <a href="claimPage.php?facilityID=<?php echo $facilities_id;?>&order_id=<?php echo $order_id;?>" onclick="profile();" class="btn btn-outline-success">Claim</a>    
          </th>
        </tr>
        <?php }}}} ?>
      </tbody>
    </table>
</div>
        <!-- ============================= Order History End ========================================-->


</div>

    
</div>
<!-- ......................footer file included..................... -->


<?php include 'footer.php';?>

<script>

    function popUpConfirmDiv() {
        var xx = document.getElementById("popUpConfirmDiv");
        if (xx.style.display == "none") {
            xx.style.display = "block";
        } else {
            xx.style.display = "none";
        }

    }
    
    var y = document.getElementById("changePassword");
    var z = document.getElementById("order_details_cus");
 
    function changePassword() {
        y.style.display = "block";
        z.style.display = "none";
     
    }
    function cus_order_details() {
        y.style.display = "none";
        z.style.display = "block";
        
    }
</script>
    <!-- End: Bootstrap Cards v2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.min.js?h=43583f9c06d57d8535a11a9e2f5a6a7c"></script>
</body>

</html>