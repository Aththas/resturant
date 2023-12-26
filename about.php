<?php
session_start();

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"resturant");

$userCount = mysqli_num_rows(mysqli_query($link, "select * from user"));
$foodCount = mysqli_num_rows(mysqli_query($link, "select * from food"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Crystal Clear Cuisine - Free Bootstrap 4 Template by Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/ionicons.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">


  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/style1.css">

  <script src="js/modernizr-2.6.2.min.js"></script>
</head>

<body>
  <?php include("navbar.php"); ?>

  <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate text-center mb-4">
          <h1 class="mb-2 bread">About</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i
                  class="ion-ios-arrow-forward"></i></a></span> <span>About <i class="ion-ios-arrow-forward"></i></span>
          </p>
        </div>
      </div>
    </div>
  </section>


  <!-- about section - start -->
    <?php include("aboutSection.php") ?>
  <!-- about section - end -->

  <!-- YEARS OF EXPERIENCED section - start -->
    <?php include("experienceSection.php") ?>
  <!-- YEARS OF EXPERIENCED section - end -->

  <!-- Catering Services section - start -->
    <?php include("catering.php") ?>
  <!-- Catering Services section - end -->

<!-- Our Master Chef section - start -->
    <?php include("chefDetails.php") ?>
  <!-- Our Master Chef section - end -->


  <!-- our experience - start -->
  <div id="fh5co-timeline">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-md-offset-0">
          <ul class="timeline animate-box">
            <li class="timeline-heading text-center animate-box">
              <div>
                <h3>Our Experience</h3>
              </div>
            </li>
            <li class="animate-box timeline-unverted">
              <div class="timeline-badge"><i class="icon-genius"></i></div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h3 class="timeline-title" style="color: #7e92c8;">The Founders Meet</h3>

                </div>
                <div class="timeline-body">
                  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                    the blind texts.</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted animate-box">
              <div class="timeline-badge"><i class="icon-genius"></i></div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h3 class="timeline-title" style="color: #7e92c8;">Create A Restaurant</h3>
                </div>
                <div class="timeline-body">
                  <p>Far far away, behind the word mountains, they live in Bookmarksgrove right at the coast of the
                    Semantics, a large language ocean.</p>
                </div>
              </div>
            </li>
            <li class="animate-box timeline-unverted">
              <div class="timeline-badge"><i class="icon-genius"></i></div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h3 class="timeline-title" style="color: #7e92c8;">Added 200+ Employees</h3>
                </div>
                <div class="timeline-body">
                  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                    the blind texts.</p>
                </div>
              </div>
            </li>

            <br>
            <li class="timeline-heading text-center animate-box">
              <div>
                <h3>More Restaurants Outlet</h3>
              </div>
            </li>
            <li class="timeline-inverted animate-box">
              <div class="timeline-badge"><i class="icon-genius"></i></div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h3 class="timeline-title" style="color: #7e92c8;">Stablished Restaurant in Europe</h3>
                </div>
                <div class="timeline-body">
                  <p>Far far away, behind the word mountains, they live in Bookmarksgrove right at the coast of the
                    Semantics, a large language ocean.</p>
                </div>
              </div>
            </li>
            <li class="animate-box timeline-unverted">
              <div class="timeline-badge"><i class="icon-genius"></i></div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h3 class="timeline-title" style="color: #7e92c8;">Franchise Restaurants Brooklyn</h3>
                </div>
                <div class="timeline-body">
                  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                    the blind texts.</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted animate-box">
              <div class="timeline-badge"><i class="icon-genius"></i></div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h3 class="timeline-title" style="color: #7e92c8;">Added 100K More Employees</h3>
                </div>
                <div class="timeline-body">
                  <p>Far far away, behind the word mountains, they live in Bookmarksgrove right at the coast of the
                    Semantics, a large language ocean.</p>
                </div>
              </div>
            </li>
            <li class="animate-box timeline-unverted">
              <div class="timeline-badge"><i class="icon-genius"></i></div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h3 class="timeline-title" style="color: #7e92c8;">Stablished Marketing</h3>
                </div>
                <div class="timeline-body">
                  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                    the blind texts.</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- our experience - end -->





  <!-- Happy Customer section - start -->
    <?php include("testimonySection.php") ?>
  <!-- Happy Customer section - end -->

  <!-- footer - start -->
    <?php include("footer.php") ?>
  <!-- footer - end -->


  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#F96D00" />
    </svg></div>


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
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  <!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
  <script src="js/main2.js"></script>

</body>

</html>