<?php 
session_start();
require_once("php/databaseConnect.php");

if(isset($_COOKIE['usercookie'])){
  $emailId = $_COOKIE['usercookie'];
  
  $SELECTuSER = "SELECT * FROM `user` WHERE `email` = '$emailId' AND `status`= '0' ";
  $runquery = mysqli_query($connect, $SELECTuSER);
  if ($runquery == true) {
    while($row=mysqli_fetch_array($runquery))
    { 
      $name=$row['name'];
      $profile_picture=$row['profile_picture'];
    }
  }  
}


?>
<!-------------------------------------------------------------
-------------Top navber Start Here for Full screen-------------
--------------------------------------------------------------->
<style>
#topNav {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  font-size: 20px;
  z-index: 99999999;
}
.navShadow{
        box-shadow: 0px 3px 7px 1px rgba(67,64,64,0.86);
        -webkit-box-shadow: 0px 3px 7px 1px rgba(67,64,64,0.86);
        -moz-box-shadow: 0px 3px 7px 1px rgba(67,64,64,0.86);
    }
#smallPan{
  display: block;
  position: fixed;
  z-index: 1000000;
  right: 4%;
  top: 10%;

}
</style> 
<section id="topNav" class="bg-light">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-4">
          <a href="index.php"><img style="margin-top: 18px;" class="img-fullScreen img-responsive center-block" src="img/logof.png" alt=""></a>
          <a href="index.php"><img class="img-smallScreen img-responsive center-block" src="img/logof.png" alt=""></a>
        </div>

        <ul class="col-md-3 text-center list-unstyled d-flex justify-content-around align-items-center px-5 pt-4">
          <li><a href="https://web.facebook.com/Health-Guardian-101397862031034"><button class="btn btn-outline-primary"><i class="fab fa-facebook"></i></button></a></li>
          <li><a href="#"><button class="btn btn-outline-primary"><i class="fab fa-twitter"></i></button></a></li>
          <li><a href="#"><button class="btn btn-outline-primary"><i class="fab fa-instagram"></i></button></a></li>
          <li><a href="#"><button class="btn btn-outline-primary"><i class="fab fa-youtube"></i></button></a></li>
        </ul>

        <div class="col-md-5 resisterButton">
            <?php if(isset($_COOKIE['usercookie'])){?>
          <ul class="pt-4">
         <!--  <li><button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalRegisterForm">RESISTER</button></li> -->
          <li><a href="claim.php" type="button" style="border-radius: 30px; width: 140px" class="font-weight-bold btn btn-outline-primary py-2">Claim</a></li>
          <li>
            <button onclick="showPane();" type="button" style="border-radius: 30px;" class="font-weight-bold btn btn-outline-primary">
              <div class="d-flex justify-content-center">
                <div class="mr-3 d-flex align-items-center text-capitalize"><?php echo $name;?></div>
                <div>
                  <img src="img\user\profile\<?php echo $profile_picture;?>.jpg" alt="img" height="30" width="30" class="d-flex img-fluid img-thumbnail  card-img-64 rounded-circle circle float-left">
                </div>
              </div>
            </button>
            <!-- small pan -->
            <div class="bg-light p-3 border border-primary" style="display: none;" id="smallPan">
              <h6><a  href="php/logout.php">Logout</a></h6> <hr>
              <h6><a  href="dashboard.php">Dashboard</a></h6>
            </div>
          </li>
          
          </ul>
          <?php }?>
          <?php if(!isset($_COOKIE['usercookie'])){?>
          <ul class="pt-4">
         <!--  <li><button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalRegisterForm">RESISTER</button></li> -->
          <li>
              <a href="login.php" type="button" style="border-radius: 30px; width: 140px" class="font-weight-bold btn btn-outline-primary py-2">Login</a>
          </li>
          </ul>
          <?php }?>
        </div>
        
      </div>
    </div>
</section>

<script>
  function showPane() {
    var x = document.getElementById("smallPan");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
</script>