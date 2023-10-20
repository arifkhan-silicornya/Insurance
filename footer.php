<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v10.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution="setup_tool"
        page_id="101397862031034"
  logged_in_greeting="welcome to health Guardian! How can we help you?"
  logged_out_greeting="welcome to health Guardian! How can we help you?">
      </div>

<section class="mt-5" id="footer">
  <div class="container-fluid">
    <div class="row pb-5">
      <div class="col-md-4">
      <h4>Terms And Condition</h4>
      <div class="callCenter">
        <a href="#">
          <img src="img/phone.svg" alt="">
        </a>
      </div>
      <div class="callTime">
          <strong class="text-justify">01712945293</strong><br>
          <span class="text-justify">24/7 Hours</span>
        </div>
      </div>
      <div class="col-md-4 mx-auto">
        <h4 class="text-justify">For any query, please contact</h4>
        <p class="text-justify">Dhaka, Bangladesh – 1214 </p>
        <p class=" text-justify">arifkhanshanto123@gmail.com</p>
      </div>
      <div class="col-md-4">
        <h4>Follow Us On</h4>
        <ul>
          <li><a href="https://www.facebook.com/mdjahidforhadh"><i class="fab fa-facebook fa-2x"></i></a></li>
          <li><a href=""><i class="fab fa-twitter fa-2x"></i></a></li>
          <li><a href=""><i class="fab fa-instagram fa-2x"></i></a></li>
          <li><a href=""><i class="fab fa-youtube fa-2x"></i></a></li>
        </ul>
      </div>
    </div><hr class="bg-light">
    <div class="copyRight text-center mx-auto py-4">
      Copyright ©<span id="year"></span> All Rights Riserved by Arifkhan.
    </div>
</section>

<script >
  document.getElementById("year").innerHTML = new Date().getFullYear();
</script>