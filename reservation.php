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
            <h1 class="mb-2 bread">Book a Table</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Reservation <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section ftco-no-pt ftco-no-pb">
			<div class="container-fluid px-0">
				<div class="row d-flex no-gutters">
          <div class="col-md-6 order-md-last ftco-animate makereservation p-4 p-md-5 pt-5">
          	<div class="py-md-5">
	          	<div class="heading-section ftco-animate mb-5">
		          	<span class="subheading">Book a table</span>
		            <h2 class="mb-4">Make Reservation</h2>
		          </div>
	            <form method="POST">
	              <div class="row">
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="">Name</label>
	                    <input type="text" class="form-control" placeholder="Your Name" name="name">
	                  </div>
	                </div>
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="">Email</label>
	                    <input type="text" class="form-control" placeholder="Your Email" name="email">
	                  </div>
	                </div>
	                <div class="col-md-6">
	                  <div class="form-group">
	                    <label for="">Phone</label>
	                    <input type="text" class="form-control" placeholder="Phone" name="phone" maxlength="10" onkeypress="return validation(event)">
	                  </div>
	                </div>
	                <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Person</label>
                      <div class="select-wrap one-third">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="person" id="" class="form-control">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4+">4+</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <?php $tmrw = date("Y-m-d", strtotime("+1 day")); ?>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Date <span style="color: gray;">(Book one day before)</span></label>
                      <input type="text" class="form-control" id="book_date" placeholder="Date" name="date" min="<?php echo $tmrw; ?>">
                    </div>
                  </div>
	                <div class="col-md-4">
	                  <div class="form-group">
	                    <label for="">Time</label>
	                    <input type="text" class="form-control" id="book_time" placeholder="" name="time">
	                  </div>
	                </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Table No</label>
                      <div class="select-wrap one-third">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="table" id="" class="form-control">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                        </select>
                      </div>
                    </div>
                  </div>
	                <div class="col-md-12">
	   <div class="px-4 px-lg-0">      
        <div class="pb-5">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                                                      <script type="text/javascript">
                                                        function validation(evt) {
                                                              
                                                            var ASCII = (evt.which) ? evt.which : evt.keyCode
                                                            if (ASCII > 31 && (ASCII < 48 || ASCII > 57) )
                                                                return false;
                                                            return true;
                                                        }
                                                    </script>
      
                <!-- Shopping table -->
                <?php
                $total = 0;
                if(isset($_SESSION['table'])) {
                ?>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col" class="border-0 bg-light">
                          <div class="p-2 px-3 text-uppercase">Product</div>
                        </th>
                        <th scope="col" class="border-0 bg-light">
                          <div class="py-2 text-uppercase">Price</div>
                        </th>
                        <th scope="col" class="border-0 bg-light">
                          <div class="py-2 text-uppercase">Quantity</div>
                        </th>
                        <th scope="col" class="border-0 bg-light">
                          <div class="py-2 text-uppercase">Remove</div>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                          foreach($_SESSION['table'] as $productId => $quantity) {

                          $result = mysqli_query($link, "SELECT * FROM food WHERE id = '$productId'");
                          $row = mysqli_fetch_assoc($result);
                          $foodName = $row['name'];
                          $foodImage = $row['image'];
                          $foodPrice = $row['price'];
                          $foodType = $row['type'];
                          //$foodShortDes = $row['short_des'];
                          //$foodLongDes = $row['long_des'];

                          $total = $total + doubleval($quantity * $foodPrice);
                      ?>
                      <tr>
                        <th scope="row" class="border-0">
                          <div class="p-2">
                            <img src="<?php echo $foodImage; ?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                            <div class="ml-3 d-inline-block align-middle">
                              <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle"><?php echo $foodName; ?></a></h5><span class="text-muted font-weight-normal font-italic d-block">Category: <?php echo $foodType; ?></span>
                            </div>
                          </div>
                        </th>
                        <td class="border-0 align-middle"><strong>LKR <?php echo $foodPrice; ?></strong></td>
                        <td class="border-0 align-middle"><strong><?php echo $quantity; ?></strong></td>
                        <td class="border-0 align-middle"><a href="deleteTable.php?id=<?php echo $productId; ?>" class="text-dark"><i class="fa fa-trash"></i></a></td>
                      </tr>
                      <?php
                          }
                      ?>
                    </tbody>
                  </table>
                </div>
                <?php
                }
                ?>
                <!-- End -->
              </div>
            </div>
            <div class="row py-5 p-4 bg-white rounded shadow-sm">
              <div class="col-lg-12">
                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
                <div class="p-4">
                  <p class="mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
                  <ul class="list-unstyled mb-4">
                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>LKR <?php echo number_format($total, 2); ?></strong></li>
                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Service Charge</strong><strong><?php echo number_format($total*0.1, 2); ?></strong></li>
                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                      <h5 class="font-weight-bold">LKR 
                      <?php
                        if($total == 0)
                        {
                          ?>
                            0.00
                          <?php
                        }
                        else
                        {
                          ?>
                            <?php echo number_format($total+($total*0.1), 2); ?>
                          <?php
                        }
                      ?>
                      </h5>
                    </li>
                  </ul>
                  <?php
                    if($total != 0)
                    {
                      ?>
                        <input type="submit" class="btn btn-primary py-3 px-5 py-2 btn-block" name="resBtn" value="Make a Reservation">
                      <?php
                    }
                  ?>
                </div>
              </div>
            </div>
      
          </div>
        </div>
      </div>
	                </div>
	                <!--<div class="col-md-12 mt-3">
	                  <div class="form-group">
	                    <input type="submit" value="Make a Reservation" class="btn btn-primary py-3 px-5">
	                  </div>
	                </div>-->
	              </div>
	            </form>
	          </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch pb-5 pb-md-0">
						<div id="map"></div>
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

if(isset($_POST["resBtn"]))
{
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $person = $_POST["person"];
  $date = $_POST["date"];
  $time = $_POST["time"];
  $table = $_POST["table"];
  $finalTotal = $total+($total*0.1);
  $v=rand(1,9);

  if($name == "" || $email == "" || $phone == "" || $person == "" || $date == "" || $time == "" || $table == "")
  {
    ?>
      <script type="text/javascript">
      swal({
              title: "Reservation Error",
              text: "All the fields are required for the Reservation!!!",
              icon: "error"
          });
      </script>
    <?php
  }
  else if($v == $table)
  {
    ?>
      <script type="text/javascript">
      swal({
              title: "Reservation Error",
              text: "Table No <?php echo $table; ?> has been already booked!!!",
              icon: "error"
          });
      </script>
    <?php
  }
  else
  {

    // Get the current date and time
        $orderDate = date("Y-m-d");
        $userId = $_SESSION["user"];

        mysqli_query($link, "insert into tbl_reservation values('','$userId','$name','$email','$phone','$person','$orderDate','$date','$time','$table','$finalTotal' )");
        $resId = mysqli_insert_id($link);

        if(isset($_SESSION['table']) && !empty($_SESSION['table'])) {
            foreach($_SESSION['table'] as $productId => $quantity) {

            $result = mysqli_query($link, "SELECT * FROM food WHERE id = '$productId'");
            $row = mysqli_fetch_assoc($result);

            $foodPrice = $row['price'];


            $subtotal = doubleval($quantity * $foodPrice);

            mysqli_query($link, "insert into reservation_product values('$resId','$productId','$foodPrice','$quantity','$subtotal')");
            }
            // Clear the table after adding the items to the reservation_product table
            unset($_SESSION['table']);
        }

    ?>
      <script type="text/javascript">
        window.location = "paymentTable.php?tot=<?php echo $finalTotal; ?>"
      </script>
    <?php
  }
}

?>