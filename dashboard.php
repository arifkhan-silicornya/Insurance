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
        #msgdiv{
            position:fixed;
            z-index:100000000000!important;
            top:35%;
            left:25%;
            width:60%;
            height:250px;
            opacity:0.8;
        }
        
 
/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
    </style>
</head>

<body  class=" text-primary">

<?php if(isset($_REQUEST['youCreatedNewOrder'])){ ?>
<div class="bg-primary text-light p-3 py-5" id="msgdiv">
    <div class="d-flex justify-content-between text-center"><br><br><br><div><h1>Congratulations!</h1>
    You purchase a new package.</div>
      <button type="button" onclick="closeDiv();" class="close text-light" >
        <span aria-hidden="true" class="p-2">&times;</span>
      </button>
    </div>
</div>
<?php }?>

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

            <div><button onclick="profile();" class="w-100 border btn border-primary d-block px-4 mx-2 my-1">Profile </button>  </div>
            <div><button onclick="profilePicture();" class=" w-100 btn border border-primary d-block px-4 mx-2 my-1">Profile Picture Change </button>  </div>
            <div><button onclick="cus_order_details()" class=" w-100 border btn border-primary d-block px-4 mx-2 my-1">Order Details </button>  </div>
            <div><button onclick="changePassword()" class=" w-100 btn border border-primary d-block px-4 mx-2 my-1">Change Password </button>  </div>

        </aside>
<!-- ..............left side end.............. -->
<div class="clearfix"></div>

    <!-- =============================== Right Update Start ===================================== -->
<div class="py-5 pl-3 border border-primary my-3 mx-auto w-100 d-flex " style="height: auto;">
                
                
            <!-- .....................profile picture changes Start.............. -->

    <div class="custom-file border border-primary mb-5 mx-3 " id="profile-picture" style="display: none;">
        <label class="font-weight-bold pl-3 ">Change Your Profile Picture :</label>
        <form action="php/profilePictureChange.php" method="post" enctype="multipart/form-data" class="border border-primary pl-2 pb-2 ">
            <div class="form-group text-primary ">
                <input type="file" class="form-control border border-primary w-75 my-3" name="avatar_file" required>
            </div>
            <button type="submit" name="picture_file" class="btn btn-outline-primary mt-2 ">Save Changed</button>
        </form>
    </div>

    <!-- =================================  user Picture update End ================================================== -->

    <!-- =================================  user profile update start ================================================== -->
<div class="w-75 pl-5 " id="user-profile-change" style="display: none;">
    <form action="php/profileUpdate.php" method="post">

    <div class="form-group text-primary">
        <label for="exampleInputName">Name </label>
        <input type="text" class="border border-dark form-control" id="exampleInputName" placeholder="Enter Name" value="<?php echo $name?>" name="username">
    </div>
    
    <div class="form-group  text-primary d-none">
        <label >User Id</label>
        <input type="number" class="form-control border border-dark"  placeholder="user id" value="<?php echo $user_id?>" name="userId" required readonly>
    </div>
    
    
    <div class="form-group  ">
        <label for="showGender">Gender :</label>
        <input type="text" class="form-control text-capitalize border border-dark" id="showGender" placeholder="Gender" value="<?php echo $gender;?>" readonly>
    </div>
    
    
    

    <div class="form-group  text-primary">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control border border-dark" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo $email?>" name="email" readonly>
    </div>

    <div class="form-group  text-primary">
        <label for="contactno">Contact Number</label>
        <input type="text" class="form-control border border-dark" id="contactno" placeholder="Mobile Number" name="Phn_num" min="10" max="11" required value="<?php echo $phoneNumber?>" readonly>
    </div>
    
    <div class="form-group  text-primary">
        <label for="contactno">NID Number</label>
        <input type="text" class="form-control border border-dark" id="contactno" placeholder="Mobile Number" name="Phn_num" min="10" max="11" required value="<?php echo $nid_number?>" readonly>
    </div>

    <div class="form-group  text-primary text-capitalize">
        <label >Present Address</label>
        <input type="text" class="form-control border border-dark text-capitalize"  placeholder="Enter Present Address" name="preAddress" value="<?php echo $preAddress?>">
    </div>
    
    <div class="form-group  text-primary text-capitalize">
        <label >Permanent Address</label>
        <input type="text" class="form-control border border-dark text-capitalize" placeholder="Enter Permanent Address" name="perAddress" value="<?php echo $perAddress?>">
    </div>
    
    <div class="form-group  text-primary d-none">
        <label > Address id</label>
        <input type="text" class="form-control border border-dark" placeholder="Address id" name="address_id" value="<?php echo $address_id?>">
    </div>
    <button type="submit" class="w-100 btn btn-outline-primary mt-5" >Save Changed</button>
    </form>
</div>


<!-- =================================  user profile update End ================================================== -->




    <!-- ================================= Change Password Start ======================================== -->
<div class="mx-5 w-50" id="changePassword" style="display: none;">
<form action="php/changePassword.php" method="POST">

    <div class="form-group">
        <label for="exampleInputEmail1">Old Password</label>
        <input type="password" class="form-control border border-dark" id="exampleInputEmail1" placeholder="Old Password" required name="oldPass">
    </div>

    <div class="form-group">
        <label for="psw">New Password</label>
        <input type="password" class="form-control border border-dark" id="psw" placeholder="New Password" required name="newPass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" >
    </div>

    <div class="form-group">
        <label for="psw2">Confirm New Password</label>
        <input type="password" class="form-control border border-dark" id="psw2" placeholder="Retype New Password" required name="newPass2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" >
    </div>
    <button type="submit" class="w-50 btn btn-outline-primary mt-5">Save Changed</button>
</form>
</div>
<div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
<!-- ================================= Change Password End ======================================== -->


        <!-- ================================= Order History Start =============================-->
<div class="mx-1 w-100" id="order_details_cus" style="display: block;">
    <table class="table table-striped table-light table-hover">
      <thead class="thead-dark text-center">
        <tr>
          <th scope="col">order_id</th>
          <th scope="col">Policy name</th>
          <th scope="col">Package name</th>
          <th scope="col">Premium</th>
          <th scope="col">Coverage</th>
          <th scope="col">Payment Status</th>
          <th scope="col">Nominee Name</th>
          <th scope="col">Relationship</th>
          <th scope="col">Download PDF</th>
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
      
      
      
      if ($order_cancel == 0) {
          
          $viewPackage = "SELECT * FROM `package` where `package_id` = '$package_id' ";
          $viewPackageResult = mysqli_query($connect,$viewPackage);
          while ($row5 = mysqli_fetch_array($viewPackageResult)) {
                
                
                
                $package_name = $row5['package_name'];
                $premium = $row5['premium'];
                $coverage = $row5['coverage'];
                
                $insurance_id = $row5['insurance_id'];
                
                $viewInsurance = "SELECT * FROM `insurance_info` where `insurance_id` = '$insurance_id' ";
                $viewInsuranceResult = mysqli_query($connect,$viewInsurance);
                while ($row33 = mysqli_fetch_array($viewInsuranceResult)) {
                $insurance_type = $row33['insurance_type'];
            
                
                $viewNominee = "SELECT * FROM `nominee` where `order_id` = '$order_id' ";
                $viewNomineeResult = mysqli_query($connect,$viewNominee);
                while ($row4 = mysqli_fetch_array($viewNomineeResult)) {
                      
                    $full_name = $row4['full_name'];
                    $relation_ship = $row4['relation_ship'];
                }   
          
          ?>

        <tr>
          <th scope="row"><?php echo $order_id;?></th>
          <th scope="row"><?php echo $insurance_type;?></th>
          <th scope="row"><?php echo $package_name;?></th>
          <th scope="row"><?php echo $premium;?></th>
          <th scope="row"><?php echo $coverage;?></th>
          <th class="text-success"><?php if($payment_status == 0){echo "<span class='text-danger'>Unpaid</span>" ;}else{echo 'paid';};?></th>
          <th scope="row"><?php echo $full_name;?></th>
          <th scope="row"><?php echo $relation_ship;?></th>
          <th scope="row">
            <a href="php/pdf_dwonload.php?order=<?php echo $order_id;?>">click to download</a>
          </th>
          
        </tr>
        <?php 
                    
                }
            }
        }
    }
}
?>
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
    var w = document.getElementById("profile-picture");
    var x = document.getElementById("user-profile-change");
    var y = document.getElementById("changePassword");
    var z = document.getElementById("order_details_cus");
    var v = document.getElementById("transaction_cus_history");
 
    function profilePicture() {
        w.style.display = "block";
        x.style.display = "none";
        y.style.display = "none";
        z.style.display = "none";
        v.style.display = "none";
    }
    function profile() { 
        w.style.display = "none";
        x.style.display = "block";
        y.style.display = "none";
        z.style.display = "none";
        v.style.display = "none";
    }
    function changePassword() {
        w.style.display = "none";
        x.style.display = "none";
        y.style.display = "block";
        z.style.display = "none";
        v.style.display = "none";
    }
    function cus_order_details() {
        w.style.display = "none";
        x.style.display = "none";
        y.style.display = "none";
        z.style.display = "block";
        v.style.display = "none";
        
    }
    function transaction_cus_his() {
        w.style.display = "none";
        x.style.display = "none";
        y.style.display = "none";
        z.style.display = "none";
        v.style.display = "block";
        
    }
</script>

<script>

function closeDiv(){
  var x5 = document.getElementById("msgdiv");
  if (x5.style.display === "block") {
    x5.style.display = "none";
  } else {
    x5.style.display = "none";
  }
}
</script>

    // <!-- End: Bootstrap Cards v2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.min.js?h=43583f9c06d57d8535a11a9e2f5a6a7c"></script>
    <script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
</body>

</html>