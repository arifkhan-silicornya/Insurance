
<?php

require_once("php/databaseConnect.php");
$sql2="SELECT * FROM `admin` ";
$Result2=mysqli_query($connect,$sql2);

while($row=mysqli_fetch_array($Result2))
    { 
    $name =$row['name'];
    $profile_pic=$row['profile_pic'];

    }
?>

<aside class="py-2 px-3 my-1 mr-1 border border-primary float-left" style="width: 300px; height: auto; " id="left_side">
    <div class="user-profile-image mx-auto d-flex justify-content-center" >
        <img class="rounded-circle mx-auto" src="image/<?php  echo $profile_pic;?>.jpg" alt="user-profile" style="height: 118px;width:118px;border:5px solid #17a2b8!important;">
    </div>
    <div class="text-center font-weight-bold d-block mt-5 text-capitalize">
        <?php  echo $name;?>
    </div><br><br>
    <div><a href="profilePictureChange.php" class=" w-100 btn btn-outline-primary d-block px-4 mx-2 my-1">Profile Picture Change </a>  </div>
    <div><a href="viewInsuranceList.php" class="w-100 btn btn-outline-primary d-block px-4 mx-2 my-1">View Insurance List</a>  </div>
    <div><a href="viewPackageList.php" class="w-100 btn btn-outline-primary d-block px-4 mx-2 my-1">View Package List</a>  </div>
    <div><a href="viewFacilitiesList.php" class="w-100 btn btn-outline-primary d-block px-4 mx-2 my-1 ">View Facilities List</a>  </div>
    <div><a href="viewUser.php" class=" w-100 btn btn-outline-primary d-block px-4 mx-2 my-1">View User</a>  </div>
    <div><a href="viewOrder.php" class=" w-100 btn btn-outline-primary d-block px-4 mx-2 my-1">View Order</a>  </div>
    <div><a href="viewClaim.php" class=" w-100 btn btn-outline-primary d-block px-4 mx-2 my-1">View Claim</a>  </div>


</aside>