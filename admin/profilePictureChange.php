<?php
session_start();
require_once("php/databaseConnect.php");


if(!isset($_SESSION['username']))
{
	header("location: index.php");
}

?>
<!DOCTYPE html>
<html>

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
    <link href="../css/style.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/styles.min.css?h=1f8afc18ec3ce05d9a2e38380bd93365">

    <style>
        .user-profile-image{
            height: 100px;
            width: 100px;   
        }
        .shadow_top_btn{
            color: #003399;
            background-color: #fff;
            
        }
        .shadow_top_btn:hover{
            color: #fff;
            background-color: #003399;
        }
        #topBtn{
            position: fixed;
            bottom: 1%;
            right: 1%;
            box-shadow: #003399!important;
        }
        #topBtn:hover{
            box-shadow: #fff!important;
        }
        body{
            position: relative;
        }
    </style>
</head>

<body data-spy="scroll" data-target="#left_side" data-offset="10">
<!-- ......................header file included..................... -->
<?php include 'navBar.php';?>
<?php



    
?>

<div class="container-fluid d-flex">
<!-- ===================left side Start ======================  -->
<?php include 'sidebar.php';?>

<!-- ======================================================= left side end ===================================== -->
<div class="clearfix"></div>
<!-- ===================================== Right Side Start =========================================
     ================================================================================================
     =================================================================================================== -->

     
<div class="py-2 pl-3 border border-primary my-1 mx-auto w-100 d-flex " style="height: auto;">
            <!-- ============ User Picture Update Start ============ -->

<div class="custom-file w-75 mt-5 " id="profile_picture" style="display: block;">
    <form action="php/profilePictureChange.php" method="post" enctype="multipart/form-data">
        <div class="font-weight-bold text-primary">Change Picture</div><br>
        <div class="input-group mb-3">
            <div class="custom-file ">
                <input type="file" class="custom-file-input " required name="avatar_file">
                <label class="custom-file-label border border-primary" for="inputGroupFile01">Choose file</label>
            </div>
        </div>
        <button type="submit" name="pic_file" onclick="return confirm('Are You sure ?')" class="w-50 btn btn-outline-primary mt-5">Save Profile Picture</button>
    </form>
</div>
<!-- =================================  User Picture Update End ================================================== -->




    </div>
</div>



<!-- ......................footer file included..................... -->
<?php include 'footer.php'; ?>

<button class="btn float-right shadow_top_btn " onclick="topFunction()" id="topBtn" title="Go to top">
  <i class="fas fa-arrow-circle-up"></i>
</button>
    <!-- End: Bootstrap Cards v2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.min.js?h=43583f9c06d57d8535a11a9e2f5a6a7c"></script>
    <script >
    //Get the button
    var mybutton = document.getElementById("topBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 10) {
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

</body>

</html>

