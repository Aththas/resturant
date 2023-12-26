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
  <?php include("header.php") ?>
</head>

<body>
  <?php include("navbar.php"); ?>

  <!-- Header section 1- start -->
  <section class="home-slider owl-carousel js-fullheight">
    <div class="slider-item js-fullheight" style="background-image: url(images/bg_5.jpg);">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text js-fullheight justify-content-center align-items-center"
          data-scrollax-parent="true">

          <div class="col-md-12 col-sm-12 text-center ftco-animate">
            <span class="subheading">Crystal Clear Cuisine</span>
            <h1 class="mb-4">Best Restaurant</h1>
          </div>

        </div>
      </div>
    </div>

    <div class="slider-item js-fullheight" style="background-image: url(images/bg_4.jpg);">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text js-fullheight justify-content-center align-items-center"
          data-scrollax-parent="true">

          <div class="col-md-12 col-sm-12 text-center ftco-animate">
            <span class="subheading">Crystal Clear Cuisine</span>
            <h1 class="mb-4">Nutritious &amp; Tasty</h1>
          </div>

        </div>
      </div>
    </div>

    <div class="slider-item js-fullheight" style="background-image: url(images/bg_3.jpg);">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-12 col-sm-12 text-center ftco-animate">
            <span class="subheading">Crystal Clear Cuisine</span>
            <h1 class="mb-4">Delicious Specialties</h1>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- Header section 1- start -->

  <!-- Service Start -->
    <?php include("serviceSection.php") ?>
  <!-- Service End -->

  <!-- about section - start -->
    <?php include("aboutSection.php") ?>
  <!-- about section - end -->

  <!-- YEARS OF EXPERIENCED section - start -->
    <?php include("experienceSection.php") ?>
  <!-- YEARS OF EXPERIENCED section - end -->

  <!-- Catering Services section - start -->
    <?php include("catering.php") ?>
  <!-- Catering Services section - end -->

  <!-- Specialties Our Menu section - start -->
  <section class="ftco-section">
    <div class="container">
      <div class="row no-gutters justify-content-center mb-5 pb-2">
        <div class="col-md-12 text-center heading-section ftco-animate">
          <span class="subheading">Specialties</span>
          <h2 class="mb-4">Our Menu</h2>
        </div>
      </div>
      <div class="row no-gutters d-flex align-items-stretch">
        <?php 
          $foodResult = mysqli_query($link,"select * from food where status='active' order by id limit 10");
          while($row=mysqli_fetch_array($foodResult))
          {
        ?>
        <div class="col-md-12 col-lg-6 d-flex align-self-stretch">
          <div class="menus d-sm-flex ftco-animate align-items-stretch">
            <div class="menu-img img" style="background-image: url(<?php echo $row["image"]; ?>);"></div>
            <div class="text d-flex align-items-center">
              <div>
                <div class="d-flex">
                  <div class="one-half">
                    <h3><?php echo $row["name"]; ?></h3>
                  </div>
                  <div class="one-forth">
                    <span class="price">LKR <?php echo $row["price"]; ?></span>
                  </div>
                </div>
                <p><span><?php echo $row["short_des"]; ?></span></p>
                <p><a href="product-single.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Order now</a></p>
              </div>
            </div>
          </div>
        </div>
        <?php
          }
        ?>

      </div>
    </div>
  </section>
  <!-- Specialties Our Menu section - end -->

  <!-- Our Master Chef section - start -->
    <?php include("chefDetails.php") ?>
  <!-- Our Master Chef section - end -->

  <!-- Book a table section - start -->
  <!--<section class="ftco-section img" style="background-image: url(images/bg_3.jpg)" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row d-flex">
        <div class="col-md-7 ftco-animate makereservation p-4 px-md-5 pb-md-5">
          <div class="heading-section ftco-animate mb-5 text-center">
            <span class="subheading">Book a table</span>
            <h2 class="mb-4">Make Reservation</h2>
          </div>
          <form action="#" onsubmit="validateForm(event)">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" class="form-control" placeholder="Your Name" id="name" name="name" required>
                  <div id="nameError" class="error-message"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" class="form-control" placeholder="Your Email" id="email" name="email" required>
                  <div id="emailError" class="error-message"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Phone</label>
                  <input type="tel" class="form-control" placeholder="Phone" id="phone" name="phone" required>
                  <div id="phoneError" class="error-message"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Date</label>
                  <input type="date" class="form-control" placeholder="Date" id="date" name="date"
                    min="<?php echo date('Y-m-d'); ?>" required>
                  <div id="dateError" class="error-message"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Time</label>
                  <input type="time" class="form-control" placeholder="Time" id="time" name="time"
                    value="<?php echo date('H:i'); ?>" required>
                  <div id="timeError" class="error-message"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Person</label>
                  <div class="select-wrap one-third">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="" id="" class="form-control">
                      <option value="">Person</option>
                      <option value="">1</option>
                      <option value="">2</option>
                      <option value="">3</option>
                      <option value="">4+</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-12 mt-3">
                <div class="form-group text-center">
                  <input type="submit" value="Make a Reservation" class="btn btn-primary py-3 px-5">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>-->
  <!-- Book a table section - end -->

  <!-- Happy Customer section - start -->
    <?php include("testimonySection.php") ?>
  <!-- Happy Customer section - end -->

  <!-- Recent Posts section - start -->
    <?php include("blogSection.php") ?>
  <!-- Recent Posts section - end -->


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

</body>

</html>