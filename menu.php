<?php
session_start();

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
            <h1 class="mb-2 bread">Specialties</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Menu <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>


		<section class="ftco-section">
    	<div class="container">
        <div class="ftco-search">
					<div class="row">
            <div class="col-md-12 nav-link-wrap">
	            <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	            <?php
	            $resultFoodType = mysqli_query($link, "select * from foodtype where status='active'");
	            while($rowType=mysqli_fetch_array($resultFoodType))
	            {
	            	$foodType = $rowType["name"];
	            	if($foodType == "All")
	            	{
	            		?>
	            		  <a class="nav-link ftco-animate active" id="v-pills-1-tab" data-toggle="pill" href="#<?php echo $foodType; ?>" role="tab" aria-controls="<?php echo $foodType; ?>" aria-selected="true"><?php echo $foodType; ?></a>
	            		<?php
	            	}
	            	else
	            	{
	            		?>
	            		  <a class="nav-link ftco-animate" id="v-pills-1-tab" data-toggle="pill" href="#<?php echo $foodType; ?>" role="tab" aria-controls="<?php echo $foodType; ?>" aria-selected="false"><?php echo $foodType; ?></a>
	            		<?php
	            	}
	         	}
	            ?>
	            </div>
	          </div>
	          <div class="col-md-12 tab-wrap">
	            
	            <div class="tab-content" id="v-pills-tabContent">
	            <?php
	            mysqli_data_seek($resultFoodType, 0);
	            $resultFoodType = mysqli_query($link, "select * from foodtype where status='active'");
	            while($rowType=mysqli_fetch_array($resultFoodType))
	            {
	            	$foodType = $rowType["name"];
	              	if($foodType == "All")
	              	{
	              		$resultFood = mysqli_query($link, "select * from food where status='active'");
	              		?>
	              		<div class="tab-pane fade show active" id="<?php echo $foodType; ?>" role="tabpanel" aria-labelledby="day-1-tab">
	              			<div class="row no-gutters d-flex align-items-stretch">
	              		<?php
	              	}
	              	else
	              	{
	              		$resultFood = mysqli_query($link, "select * from food where type = '$foodType' and status='active'");
	              		?>
	              		<div class="tab-pane fade" id="<?php echo $foodType; ?>" role="tabpanel" aria-labelledby="day-1-tab">
	              			<div class="row no-gutters d-flex align-items-stretch">
	              		<?php
	              	}
	              	while($rowFood=mysqli_fetch_array($resultFood))
	              	{
	              	?>
	              	
					        	<div class="col-md-12 col-lg-6 d-flex align-self-stretch">
					        		<div class="menus d-sm-flex ftco-animate align-items-stretch">
					              <div class="menu-img img" style="background-image: url(<?php echo $rowFood["image"]; ?>);"></div>
					              <div class="text d-flex align-items-center">
													<div>
						              	<div class="d-flex">
							                <div class="one-half">
							                  <h3><?php echo $rowFood["name"]; ?></h3>
							                </div>
							                <div class="one-forth">
							                  <span class="price">LKR <?php echo $rowFood["price"]; ?></span>
							                </div>
							              </div>
							              <p><span><?php echo $rowFood["short_des"]; ?></span></p>
							              <p><a href="product-single.php?id=<?php echo $rowFood["id"]; ?>" class="btn btn-primary">Order now</a></p>
						              </div>
					              </div>
					            </div>
					        	</div>
					        
					<?php
					}
					?>
					</div>
	              </div>

	             <?php
	         	}
	             ?>
	             
	            </div>
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