<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
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

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
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
<body class="container  bg-light">
  <div class="mb-5 mt-3 row">
    <div style="background: #fff; padding: 25px; border-radius: 10px; box-shadow: 6px 6px 10px 0px #003399!important; max-width: 550px ; margin: auto;" class="col-6 border border-primary">
    <h3 class="text-center text-primary mb-5">Register</h3>
      <form action="php/register.php" method="POST" name="myForm" onsubmit="return validateForm()">
        <div class="form-group ">
          <input class="form-control border border-primary" type="text" placeholder="Full Name" name="fullName" required autocomplete="off" required>
        </div>
        <div class="form-group row d-flex justify-content-between">
          <input class="ml-3 form-control border border-primary col-5" type="number" placeholder="Enter your NID Number" name="NID" min="99999999" required autocomplete="off" >
          <input class="mr-3 form-control border border-primary col-5" type="number" placeholder="Mobile Number" name="number" required autocomplete="off">
        </div>
        <div class="d-flex text-primary mb-3 border border-primary rounded py-2 px-3">
          <div class="mr-3">Gender :</div>
          <div class="custom-control custom-switch mr-5 ">
              <input type="radio" class="custom-control-input border border-dark" id="customSwitch2" name="gender" value="male" required>
              <label class="custom-control-label" for="customSwitch2">Male</label>
          </div>
          <div class="custom-control custom-switch">
              <input type="radio" class="custom-control-input border border-dark" id="customSwitch1" name="gender" value="female" required>
              <label class="custom-control-label" for="customSwitch1">Female</label>
          </div>    
        </div>
        <div class="form-group ">
          <input class="form-control border border-primary" type="email" placeholder="E-mail" name="email" required autocomplete="off">
        </div>
        <div class="form-group ">
          <input class="form-control border border-primary" type="password" placeholder="Enter Password" name="PassW" required autocomplete="off" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
        </div>
        <small id="message" style="background: #fff; padding: 10px; border-radius: 10px; height:auto;max-width: 500px ; " class="my-3 row col-12">
          <span class="col-6" ><small><b>Password must contain the following:</b></small></span> <br>
          <span class="ml-5 col-6" > <small id="letter" class="invalid">A <b>lowercase</b> letter</small></span> 
          <span class="ml-5 col-6"> <small id="capital" class="invalid">A <b>capital (uppercase)</b> letter</small></span> <br/>
          <span class="ml-5 mr-4 col-6" > <small id="number" class="invalid">A <b> number</b></small></span> 
          <span class="ml-5 col-6"> <small id="length" class="ml-2 invalid"> Minimum <b>8 characters</b></small></span> 
        </small>
        <div class="form-group ">
          <input class="form-control border border-primary" type="password" placeholder="Re-type Password" name="RetypePass" required autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
        </div>
        <div class="form-group">
          <button class="btn btn-outline-primary w-100 font-weight-bolder" type="submit" name="submit"><i class="fas fa-registered mr-2"></i>Submit</button>
        </div>
      </form>
        <span>Have Account? <a href="index.php" class="link">Login Now</a> </span>
    </div>
    
  </div>

<script>
function validateForm() {
  var fullName = document.forms["myForm"]["fullName"].value;
  var nid = document.forms["myForm"]["NID"].value;
  var email = document.forms["myForm"]["email"].value;
  email = email.toLowerCase();
  var number = document.forms["myForm"]["number"].value;
  var PassW = document.forms["myForm"]["psw"].value;
  var RetypePass = document.forms["myForm"]["RetypePass"].value;

  if (fullName == "") {
    alert("Full Name must be filled out");
    return false;
  }
  else if (nid == "") {
    alert("NID must be filled out");
    return false;
  }
  else if (email == ""){
    alert("Email must be filled out ");
    return false;
  }
  else if (number == "") {
    alert("Mobile Number must be filled out");
    return false;
  }
  else if (PassW == "") {
    alert("Password must be filled out");
    return false;
  }
  else if (RetypePass == "") {
    alert("Retype Password must be filled out");
    return false;
  }
  else{
    return true;
  }
}


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