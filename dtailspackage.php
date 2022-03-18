<?php 
require_once('php/databaseConnect.php');
$packageID = $_REQUEST['packageID'];
if (isset($_REQUEST['packageID'])) {
    
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
            } else {
            }
        }
    }
}
else {
  header("location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Package</title>
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
  <link href="scssNew/style3.css" rel="stylesheet">

  <style>
    #singlePackage{
      max-width: 1100px;
      margin-top: -100px;
    }
  </style>
</head>

<body>
<!-------------------------------------------------------------
-------------Top navber Start Here for Full screen-------------
--------------------------------------------------------------->
<?php include 'topNav.php';?>
<!-------------------------------------------------------------
-------------Top navber End hera-------------------------------
--------------------------------------------------------------->
<section id="health-bg" class="bg-primary text-light py-5">
 <div class="container text-center my-5">
   <div class="row">
     <div class="col-md-12">
       <h4 class=""><?php echo $package_name; ?></h4>
       <p class="mt-3 mb-5"><?php echo $package_title; ?></p>
     </div>
   </div>
 </div>
 </section>

 <section id="singlePackage" class="bg-light mx-auto ">
 <div class="package1 container shadow ">
  <div class="row safety d-flex justify-content-between px-5 pt-5 pb-3 bg-secondary">
    <div class="col-md-4 text-primary"><h5>Premium - BDT <?php echo $premium;?></h5></div>
    <div class="col-md-4"><h5 class="bdt text-center ">Coverage up to <br><br> <span class="text-primary"> BDT <?php echo $coverage;?></h5></span></div>
  </div>

  <div class="row px-5 pt-5">
    <div class="col-md-7 d-flex flex-column">
    <div class="pt-2"></div>  
<?php 
$viewFacilities = "SELECT * FROM `facilities` where `package_id` = '$packageID' ";
$viewFacilitiesResult = mysqli_query($connect, $viewFacilities);
if ($viewFacilitiesResult == true) {
    while ($row = mysqli_fetch_array($viewFacilitiesResult)) {
      $facilities_id = $row['facilities_id'];
      $facilities_name = $row['facilities_name'];
      $facilities_price = $row['facilities_price'];
      $image = $row['image'];
      $package_id = $row['package_id'];
      $status = $row['status'];
      if ($status == 0) {
?>
      <div class="row mb-3">
        <span class="col-md-7"><?php echo $facilities_name;?></span>
        <span class="col-md-3 font-weight-bolder"><?php echo $facilities_price;?></span>
      </div>
      <hr style="width:100%;text-align:left;margin-left:0">
      <?php 
    }
  }
}
?>

    </div>
    <div class="col-md-5 small">
      <ul>
        <li class="pt-2">Number of insured persons – 2 (self & Spouse)</li>
        <li class="pt-2">Policy validity - 1 year from the date of registration</li>
        <li class="pt-2">Any Bangladeshi National</li>
        <li class="pt-2">Aged between 18 - 60 years</li>
        <li>Death (at any cause) of Primary Member – BDT 100,000* death due to any cause other than suicide/HIV-AIDS</li>
        <li class="pt-2">Hospitalization (in-patient service) for both persons - BDT 50,000 * an in-patient is someone who's been admitted to hospital at least for a night as per doctor's recommendation. </li>
        <li class="pt-2">In-patient services include - during hospitalization period Room rent, Hospital services, Surgical expenses, Consultation fees, Diagnostic bills, Medicine etc</li>
        <li class="pt-2">Maximum confinement benefit - BDT 5,000/day (maximum 10 days/year)</li>
        <li class="pt-2">Out-patient service for both persons - BDT 5,000</li>
        <li class="pt-2">Out-patient services include – diagnostic tests and related attending physician's visit</li>
        <li class="pt-2">Doctor's visit BDT 300/prescription</li>
        <li class="pt-2">Diagnosis bills (20% copayment – paid by patients)</li>
        

      </ul>
    </div>
  </div>
   
  <div class="col-md-12 my-3 p-5">
  <div id="excluson" style="display: none;">
    <p>No benefit shall be paid under this Contract for expenses or losses resulting from or incurred in connection with or in consequence of the following</p>
    <span class="font-weight-bolder text-success">Core Exclusions:</span>
    <ul>
      <li class="pt-2">15 days waiting period after registration will be applied for all types of claims</li>
      <li class="pt-2">90 days waiting period will be applied for maternity claims</li>
      <li class="pt-2">24 hours hospital waiting period after admission will be applied for Hospitalization (in-patient service) coverage
      </li>
      <li class="pt-2">Maximum 3-day coverage at a stretch will be considered as a single confinement for Hospitalization (in-patient service)</li>
      <li class="pt-2">Only MBBS or above qualified doctor's prescriptions will be valid for Out-patient service claims</li>
    </ul>
    <span class="font-weight-bolder text-success">General Exclusions:</span>
    <ul>
      <li class="pt-2">All pre-existing disease related to all types of coverage of the policy</li>
      <li class="pt-2">Death caused by self-inflicted injury or the commission of or attempted commission of an assault or any unlawful act, or being engaged in any illegal activity or felony</li>
      <li class="pt-2">By participating in any types of illegal activities</li>
      <li class="pt-2">Suicide while sane or insane</li>
      <li>The condition of Acquired Immune Deficiency Syndrome (AIDS), or any AIDS related illness or HIV  virus</li>
      <li class="pt-2">Any congenital infirmity</li>
      <li class="pt-2">Any minor surgery, daycare treatment</li>
      <li class="pt-2">Circumcision, prophylactic and immunization procedures</li>
      <li>Mental, emotional or psychiatric disorders, alcoholism or any other narcotic addiction</li>
      <li>Obesity i.e., treatment for, or required as a result of obesity, any cosmetic or plastic treatment/surgery, unless required as reconstructive surgery as a consequence of an injury due to accidents, burns</li>
      <li class="pt-2">Any procedures which is experimental or not generally accepted by the medical profession viz. acupuncture, herbal/ayurvedic/homeopathy treatment and any Alternative Medical Care (AMC) etc.</li>
      <li class="pt-2">Treatment or advice by a person or professional not registered under BMDC (Bangladesh Medical & Dental Council)</li>
      <li class="pt-2">Rest, convalescence or rejuvenation cures, thermal baths, physiotherapy or confinement for the purposes of slimming or beautification</li>
      <li class="pt-2">Fracture and trauma due to physical assault, injury arising due to accident while participating in any unlawful activities (e.g., driving a car without a license), attempted suicide, violation or attempted violation of the law, injuries willfully or intentionally self-inflicted or due to insanity or under the influence of a drug</li>
      <li class="pt-2">Assembly of artificial limbs & necessary treatment of the said artificial limbs (unless required due to accident)</li>
      <li class="pt-2">Routine examination of eye and ear, fitting or replacement of eyeglasses (including Intra-ocular lens or contact lenses) or hearing aids, health screening including routine physical examinations (health check-ups), malignant cancer, radiotherapy, chemotherapy, dialysis and any dental treatment unless require hospitalization for re-constructive surgery as a consequence of an accident</li>
      <li class="pt-2">Non-surgical care for tuberculosis, hepatitis B & C and any other vaccinations, epidemic/pandemic, all expenses incurred in connection with the donor for any treatment, AIDS and HIV diseases, lupus and other connective tissue and autoimmune disorders and costs of prostheses, corrective devices</li>
      <li class="pt-2">Sleep disorders i.e., treatment for insomnia, sleep apnea, snoring, or any other sleep related breathing problem</li>
      <li class="pt-2">IgE test, vitamin tests</li>
      <li class="pt-2">Participating in competitions, races, contest, matches, on land, air or sea; pot-holing, paragliding, bungee jumping, parachuting and/or scuba diving</li>
      <li class="pt-2">Treatment of family planning purposes including termination of pregnancy, sterility or treatment related to assisted reproduction, cost of contraception, cost of female hygiene product like sanitary pads, etc.</li>
      <li class="pt-2">Mental, emotional or psychiatric disorders, alcoholism or any other narcotic addiction</li>
      <li class="pt-2">Injury arising due to accident while participating in any unlawful activities (e.g., driving a car without a license), attempted suicide, violation or attempted violation of the law, injuries willfully or intentionally self-inflicted or due to insanity or under the influence of a drug</li>
    </ul>
  </div>
   <div class="text-center"> <button class="btn btn-outline-primary text-center pointer-event" onclick="exclusion();">SEE EXCLUSIONS <span><i></i></span> </button></div> 
  </div>

  <hr style="width:100%;text-align:left;margin-left:0">
  <div class="row px-5 d-flex justify-content-around my-3 py-3">
    <a href="buy.php?packID=<?php echo $package_id;?>" class="col-md-2 btn btn-outline-primary btn-lg buy_now">Buy Now <span class="buy_now_arrow">></span></a>
    <a href="" class="col-md-2 btn btn-outline-primary btn-lg disabled">Send as Gift ></a>
  </div>


 </div>
</section>
<?php 
$counter = 0;
$viewAllPackage2 = "SELECT * FROM `package` ";
$viewAllPackageResult2 = mysqli_query($connect, $viewAllPackage2);
if ($viewAllPackageResult2 == true) {
    while ($row3 = mysqli_fetch_array($viewAllPackageResult2)) {
        $package_delete3 = $row3['package_delete'];
        if ($counter <= 3) {
            if ($package_delete3 == 0) {
                $counter++;
            }
        }
    }
}
if ($counter == 2) {
  $align = 'around';
}else {
  $align = 'between';
}
?>
<section class="container mt-5">
  <h3 class="text-primary"> YOU MAY ALSO NEED</h3>
  <hr style="width:100%;text-align:left;margin-left:0">
  <div class="d-flex flex-row row justify-content-<?php echo $align;?> ">
<?php 
$counter = 0;
$viewAllPackage = "SELECT * FROM `package` ";
$viewAllPackageResult = mysqli_query($connect, $viewAllPackage);
if ($viewAllPackageResult == true) {
    while ($row2 = mysqli_fetch_array($viewAllPackageResult)) {
        $package_id2 = $row2['package_id'];
        $package_name2 = $row2['package_name'];
        $premium2 = $row2['premium'];
        $coverage2 = $row2['coverage'];
        $package_title2 = $row2['package_title'];
        $package_delete2 = $row2['package_delete'];
        if ($counter <= 3) {
            if ($package_delete2 == 0) {
              $counter++;
                ?>
  <div class="p-5 col-md-4 shadow mb-5 bg-white rounded border">
    <div class="">
      <a href=""><?php echo $package_name2; ?> <br><?php echo $package_title2; ?> </a><br>
    </div>
    <div class="my-5">Life & Health Coverage up to BDT <?php echo $coverage2; ?></div>
    <div>
      <div class="font-weight-bold">Premium</div>
      <div class="font-weight-bolder text-success bdt_front" style="font-size: x-large;">BDT <?php echo $premium2; ?></div>
    </div>
    <hr style="width:100%;text-align:left;margin-left:0">
    <div class="text-center w-100 my-4 custom_btn">
      <a href="dtailspackage.php?packageID=<?php echo $package_id2; ?>" class="custom_btn btn btn-outline-primary w-50 justify-content-center">Details ></a>
    </div>
  </div>
<?php
            }
        }
    }
}
?>
  
</div>
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
    
    function exclusion() {
      var x = document.getElementById("excluson");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
  </script>

</body>

</html>
