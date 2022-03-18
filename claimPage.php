<?php
if(!isset($_COOKIE['usercookie'])){
    header("location: index.php?LoginFirst");    
}
require_once('php/databaseConnect.php');

if(isset($_REQUEST['facilityID'])  && isset($_REQUEST['order_id'])){
    $facilityID = $_REQUEST['facilityID'];
    $order_id = $_REQUEST['order_id'];
}else{
    header('location: claim.php');
}

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
require_once('php/databaseConnect.php');

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

            <!--<div><button onclick="profile();" class="w-100 border btn border-primary d-block px-4 mx-2 my-1">Profile </button>  </div>-->
            <!--<div><button onclick="profilePicture();" class=" w-100 btn border border-primary d-block px-4 mx-2 my-1">Profile Picture Change </button>  </div>-->
            <!--<div><button onclick="cus_order_details()" class=" w-100 border btn border-primary d-block px-4 mx-2 my-1">Order Details </button>  </div>-->
            <!--<div><button onclick="changePassword()" class=" w-100 btn border border-primary d-block px-4 mx-2 my-1">Change Password </button>  </div>-->

        </aside>
<!-- ..............left side end.............. -->
<div class="clearfix"></div>

    <!-- =============================== Right Update Start ===================================== -->
<div class="pb-5 pl-0 border border-primary my-3 mx-auto w-100 d-flex " style="height: auto;">
                
                

    <!-- =================================  user profile update start ================================================== -->
<div class="w-75 pl-5 mt-2 " id="user-profile-change" style="display: block;">
    <form action="php/uploadclaim.php" method="POST" enctype="multipart/form-data">

    <div class="form-group  text-primary ">
        <label >Facility Id</label>
        <input type="number" class="form-control border border-dark"  placeholder="facility id" value="<?php echo $facilityID;?>" name="faciId" required readonly>
    </div>
    
    <div class="form-group  text-primary ">
        <label >Order Id</label>
        <input type="number" class="form-control border border-dark"  placeholder="ORDER id" value="<?php echo $order_id;?>" name="orderId" required readonly>
    </div>
    
    <div class="custom-file mb-5 border">
        <label for="inputGroupFile01" class="ml-2" >Upload Your Attachment 1<span class="text-danger">*</span> </label>
        <input type="file" class="form-control border border-dark" id="inputGroupFile01"  name="fileO" required >
    </div>
    
    <div class="custom-file mb-5 border" >
        <label for="inputGroupFile02" >Upload Your Attachment 2</label>
        <input type="file" class="form-control border border-dark" id="inputGroupFile02" name="fileT">
    </div>
    
    <div class="custom-file mb-5 border">
        <label for="inputGroupFile03" >Upload Your Attachment 3</label>
        <input type="file" class="form-control border border-dark" id="inputGroupFile03" name="fileTh">
    </div>
    
    <button type="submit" class="w-100 btn btn-outline-primary mt-3" >Save Changed</button>
    <a href="claim.php" type="button" class="w-100 btn btn-outline-danger mb-5 mt-2" >Cancel</a>
    </form>
</div>


<!-- =================================  user profile update End ================================================== -->

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
    
</script>
    <!-- End: Bootstrap Cards v2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.min.js?h=43583f9c06d57d8535a11a9e2f5a6a7c"></script>
</body>

</html>