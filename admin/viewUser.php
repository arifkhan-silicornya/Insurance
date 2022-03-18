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


  <div class="py-2 px-1 border border-primary my-1 mx-auto w-100 d-flex " style="height: auto;" >
    <div class="mx-0 w-100" id="moneyRecharge" style="display: block;">
    <h3 class="d-flex flex-row justify-content-between">Users List</h3>
      <table class="table table-light border table-striped">
        <thead class="text-center border">
          <tr class=" bg-primary text-light font-weight-bold ">
            <td>Id</td>
            <td>Image</td>
            <td>Name</td>
            <td>NID Number</td>
            <td>E-mail</td>
            <td>Phone Number</td>
            <td>Gender</td>
          </tr>
        </thead>
        <tbody>
<?php 
    $sql="SELECT * FROM `user` ";
    $Result=mysqli_query($connect,$sql);
    
    while($row=mysqli_fetch_array($Result))
      { 
        $user_id = $row['user_id'];
        $nid_number = $row['nid_number'];
        $name = $row['name'];
        $email = $row['email'];
        $phoneNumber = $row['phoneNumber'];
        $profile_picture = $row['profile_picture'];
        $gender = $row['gender'];

?>
          <tr class="text-center ">
              <td class=""><?php echo $user_id;?></td>
              <td class="">
                <img src="../img/user/profile/<?php echo $profile_picture;?>.jpg" alt="image" height="40" width="60" class="img-fluid m-0"> 
              </td>
              <td class=""><?php echo $name;?></td>
              <td class=""><?php echo $nid_number;?></td>
              <td class=""><?php echo $email;?></td>
              <td class=""><?php echo $phoneNumber;?></td>
              <td class="text-capitalize"><?php echo $gender;?></td>
            </tr>
            <?php
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
