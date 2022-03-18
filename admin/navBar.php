
<style>
.logout_btn{
    position:absolute;
    right: 2%;
    top: 50px;
}
#navbar {
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
</style>
 <!-------------------------------------------------------------
----------------Navber Start Here for Full screen---------------
--------------------------------------------------------------->
<section id="navbar" class="container-fluid ">
<nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
    <a href="index.php"><img class="img-fluid mr-auto" src="../img/logof.png" alt="image" height="80" width="140"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">

        <button class="btn btn-outline-primary my-2 my-sm-0 ml-auto" type="button"  onclick="logout();">Admin</button>
    </div>
</nav>

<a href="php/logout.php" id="logout" class="logout_btn btn btn-primary my-2 my-sm-0 ml-auto" style="display:none;">Logout</a>

</section>

<script>

// Logout show hide

function logout() {
  var x = document.getElementById("logout");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>