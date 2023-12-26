<?php
session_start();
if($_SESSION["user"] == "")
{
?>
<script type="text/javascript">
window.location="login.php";
</script>
<?php
}
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"resturant");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Crystal Clear Cuisine - Free Bootstrap 4 Template by Colorlib</title>
    <?php include("header.php") ?>
  </head>
  <body>
    <?php include("navbar.php"); ?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center mb-4">
            <h1 class="mb-2 bread">Contact</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact us <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
			<div class="container">
				<div class="row d-flex align-items-stretch no-gutters">
					<div class="col-md-6 pt-5 px-2 pb-2 p-md-5 order-md-last">
						<h2 class="h4 mb-2 mb-md-5 font-weight-bold">Feedbacks are Welcome</h2>
						<form method="POST">
              <div class="form-group">
                <textarea cols="30" rows="7" name="message" id="message" class="form-control" placeholder="Feedback" maxlength="1000"></textarea>
                <div id="messageError" class="error-message"></div>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5" name="feedbackBtn">
              </div>
            </form>
					</div>
					<div class="col-md-6 d-flex align-items-stretch">
						<!-- <div id="map"></div> -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9543296953243!2d79.8552206749963!3d6.896066293103115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25bd8d483b85f%3A0x7875d4dad882e596!2sElite%20Indian%20Restaurant!5e0!3m2!1sen!2slk!4v1702796606393!5m2!1sen!2slk" width="600" height="800" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
			</div>
		</section>


		<section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h4 font-weight-bold">Contact Information</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-3 d-flex">
          	<div class="dbox">
	            <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
            </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="dbox">
	            <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
            </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="dbox">
	            <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
            </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="dbox">
	            <p><span>Website</span> <a href="#">yoursite.com</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>
		
    <!-- footer - start -->
    <?php include("footer.php") ?>
  <!-- footer - end -->
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>
<?php
if(isset($_POST["feedbackBtn"]))
{
  $userId = $_SESSION["user"];
  $feedback = $_POST["message"];

  if($feedback == "")
  {
    ?>
      <script type="text/javascript">
      swal({
              title: "Feedback Error",
              text: "Feedback is required!!!",
              icon: "error"
          });
      </script>
    <?php
  }
  else
  {
    mysqli_query($link, "insert into feedback values('','$feedback','$userId')");

    ?>
    <script type="text/javascript">
    swal({
            title: "Feedback Success",
            text: "Feedback has been sended successfully!!!",
            icon: "success"
        }).then(function() {
        window.location = "index.php";
    });
    </script>
    <?php
  }
}
?>