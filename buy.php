<?php
if(!isset($_COOKIE['usercookie'])){
    header("location: login.php?LoginFirst");    
}
?>
<?php 
require_once('php/databaseConnect.php');
$packageID = $_REQUEST['packID'];
if (isset($_REQUEST['packID'])) {
    
    $viewPackage = "SELECT * FROM `package` where `package_id` = '$packageID' ";
    $viewPackageResult = mysqli_query($connect, $viewPackage);
    if ($viewPackageResult == true) {
        while ($row = mysqli_fetch_array($viewPackageResult)) {
            $package_id = $row['package_id'];
            $package_name = $row['package_name'];
            $premium = $row['premium'];
            $coverage = $row['coverage'];
            $package_title = $row['package_title'];
            $package_delete = $row['package_delete'];
            if ($package_delete == 1) {
                header("location: home.php");
            }
        }
    }
}
else {
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>buyNow</title>

  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
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
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

input {
  width: 100%;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

button {
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
</head>

<body>
<!-------------------------------------------------------------
-------------Top navber Start Here for Full screen-------------
--------------------------------------------------------------->
<?php include 'topNav.php';?>

<section id="health-bg" class="bg-primary text-light py-5">
 <div class="container text-center my-5">
   <div class="row">
     <div class="col-md-12 mb-3">
       <h4 class=""><?php echo $package_name;?></h4>
       <small class="mt-1 mb-5">Complete Your Purchase</small>
     </div>
   </div>
 </div>
 </section>
<!-------------------------------------------------------------
-------------Main Content Start Here for Full screen-------------
--------------------------------------------------------------->
<section class="container" style="margin-top: -14%;">
    <form id="regForm" action="php/buyPackage.php" method="POST" autocomplete="off" name="myForm" onsubmit="return validateForm()">
    <input type="number" value="<?php echo $packageID; ?>" required class="d-none" name="package_id">
    <h2 class="text-primary">Your Purchase Details</h2>
    <!-- One "tab" for each step in the form: -->
    <div class="tab">
      <h3 class="text-center text-primary font-weight-bold text-capitalize">Nominee Info:</h3>

      <p class="font-weight-bolder">Nominee Full Name:
        <input placeholder="Full Name..." name="fullName" class="border border-dark form-control " required autocomplete="off">
      </p>
      <p class="font-weight-bolder">Relationship with primary insured:
      <select class="custom-select border border-dark form-control text-primary" required name="relationShip" >
        <option value="">Select One</option>
        <option value="father">Father</option>
        <option value="mother">Mother</option>
        <option value="son">Son</option>
        <option value="daughter">Daughter</option>
        <option value="husband">Husband</option>
        <option value="wife">Wife</option>
        <option value="brother">Brother</option>
        <option value="sister">Sister</option>
      </select>
      </p>
      <p class="font-weight-bolder">Date Of Birth :
        <input type="date" placeholder="Birth Date" name="birthDate" required class="form-control border border-dark text-primary">
      </p>
      <p class="font-weight-bolder">Mobile Number: 
        <input type="number" placeholder="Mobile Number" name="mobileNumber" autocomplete="off" required class="border border-dark form-control">
      </p>
      <p class="font-weight-bolder">NID Number: 
        <input type="number" placeholder="NID Number" name="nidNumber" autocomplete="off" required class="border border-dark form-control">
      </p>
      <p class="font-weight-bolder">Email : 
        <input type="email" placeholder="Email..." name="email" autocomplete="off" required class="border border-dark form-control" >
      </p>
    </div>
    <div class="tab">
      <h3 class="text-center text-primary font-weight-bold text-capitalize">Nominee Address:</h3>
        <p class="font-weight-bold">Flat/Holding/Street/Area
          <input type="text" placeholder="Flat/Holding/Street/Area" name="homeAddress" class="border border-dark form-control" required>
        </p>
        <p class="font-weight-bold">Sub-office<input type="text" placeholder="Sub-office" name="postOfficeAddress" class="border border-dark form-control" required></p>
        <p class="font-weight-bold">Thana<input type="text" placeholder="Thana"   name="postStationAddress" class="border border-dark form-control" required></p>
        <p class="font-weight-bold">District<input type="text" placeholder="District"   name="district" class="border border-dark form-control" required></p>
        <p class="font-weight-bold">Post Code<input type="number" placeholder="Post Code" name="postCode" class="border border-dark form-control" required></p>
        <p class="font-weight-bold">Division<input type="text" placeholder="Division"  name="division" class="border border-dark form-control" required></p>
    </div>
    <div class="tab">
      <h3 class="text-center text-primary font-weight-bold text-capitalize">Good Health Declaration:</h3>
      <p class=" text-justify">I hereby declare that, currently I am/ my family members insured under this policy are in Good Health and actively performing all day to day activities without any illness and disability. I am/ my family members insured under this policy are not receiving any treatment, have not treated or told to have any treatment for Cancer, Kidney, Stroke, Heart disease (Stenting/ Bypass Surgery), Liver Cirrhosis, Lung Disorder or HIV/AIDS related disease or any other physical impairment. I hereby certify that according to my best knowledge and belief all the above statements are true and that I have not withheld any relevant information. I agree that this declaration will be the basis on which the eligibility of policy shall be determined. I understand and agree that failure to disclose facts that affect the assessment of risk by the Insurance Company would render the coverage invalid.</p>
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="customSwitch1" required name="checkOne">
        <label class="custom-control-label" for="customSwitch1">I agree <a href="" class="text-link"> terms and condition</a></label>
      </div>
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="customSwitch2" required name="checkTwo">
        <label class="custom-control-label" for="customSwitch2">I Believe that given information is true , Complete and accurate.</label>
      </div>
    </div>
    <div style="overflow:hidden;">
        <div style="float:right;">
        <button type="submit" class="btn btn-outline-primary">Submit</button>
        </div>
    </div>
    </form>
</section>

<!-------------------------------------------------------------
--------------------------Footer Start here--------------------
--------------------------------------------------------------->

<?php include 'footer.php';?>

<!-------------------------------------------------------------
--------------------------Footer End here-----------------------
--------------------------------------------------------------->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Company Brand Slider -->
  <script src="js/brandSlider.js"></script>
    <!-- my custom JavaScript file -->
  <script type="text/javascript" src="js/custom.js"></script>

  <script>

function validateForm() {
  var package_id = document.forms["myForm"]["package_id"].value;
  var fullName = document.forms["myForm"]["fullName"].value;
  var relationShip = document.forms["myForm"]["relationShip"].value;
  var birthDate = document.forms["myForm"]["birthDate"].value;
  var mobileNumber = document.forms["myForm"]["mobileNumber"].value;
  var nidNumber = document.forms["myForm"]["nidNumber"].value;
  var email = document.forms["myForm"]["email"].value;
  var homeAddress = document.forms["myForm"]["homeAddress"].value;
  var postOfficeAddress = document.forms["myForm"]["postOfficeAddress"].value;
  var postStationAddress = document.forms["myForm"]["postStationAddress"].value;
  var district = document.forms["myForm"]["district"].value;
  var postCode = document.forms["myForm"]["postCode"].value;
  var division = document.forms["myForm"]["division"].value;
  var checkOne = document.forms["myForm"]["checkOne"].value;
  var checkTwo = document.forms["myForm"]["checkTwo"].value;

  email = email.toLowerCase();

  if (fullName == "") {
    alert("Name must be filled out");
    return false;
  }
  else if (package_id == "") {
    alert("Nominee Relationship must be filled out");
    return false;
  }
  else if (relationShip == "") {
    alert("Nominee Relationship must be filled out");
    return false;
  }
  else if (birthDate == "") {
    alert("Nominee BirthDate must be filled out");
    return false;
  }
  else if (mobileNumber == "") {
    alert("Nominee Mobile must be filled out");
    return false;
  }
  else if (nidNumber == "") {
    alert("Nominee NID number must be filled out");
    return false;
  }
  else if (email = "") {
    alert("Email must be filled out with ");
    return false;
  }
  else if (homeAddress == "") {
    alert("Nominee address must be filled out");
    return false;
  }
  else if (postOfficeAddress == "") {
    alert("Nominee sub-Office must be filled out");
    return false;
  }
  else if (postStationAddress == "") {
    alert("Nominee Thana must be filled out");
    return false;
  }
  else if (district == "") {
    alert("Nominee District must be filled out");
    return false;
  }
  else if (postCode == "") {
    alert("Post Code must be filled out");
    return false;
  }
  else if (division == "") {
    alert("Division must be filled out");
    return false;
  }
  else if (checkOne == "") {
    alert("Terms and conditions must be filled out");
    return false;
  }
  else if (checkTwo == "") {
    alert("Terms and conditions must be filled out");
    return false;
  }
  else{
    return true;
  }
}
</script>
  </body>

</html>