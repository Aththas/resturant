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
$orderId = $_GET["id"];
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
            <h1 class="mb-2 bread">Ordered List Details</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="viewOrders.php">view orders <i class="ion-ios-arrow-forward"></i></a></span> <span>order # <?php echo $orderId; ?><i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <div class="px-4 px-lg-0">      
        <div class="pb-5">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
      
                <!-- Shopping cart table -->
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
                          <div class="py-2 text-uppercase">Sub Total</div>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $rsOrderDetails = mysqli_query($link, "select * from order_product where orderId = '$orderId'");
                      while($row=mysqli_fetch_array($rsOrderDetails))
                      {
                        $productId = $row["foodId"];
                        $result = mysqli_query($link, "SELECT * FROM food WHERE id = '$productId'");
                        $rowFood = mysqli_fetch_assoc($result);
                        $foodName = $rowFood['name'];
                        $foodImage = $rowFood['image'];
                        $foodType = $rowFood['type'];
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
                        <td class="border-0 align-middle"><strong>LKR <?php echo $row["foodPrice"]; ?></strong></td>
                        <td class="border-0 align-middle"><strong><?php echo $row["qty"]; ?></strong></td>
                        <td class="border-0 align-middle"><strong>LKR <?php echo $row["subTotal"]; ?></strong></td>
                      </tr>
                      <?php
                      }
                      ?>
                      
                    </tbody>
                  </table>
                </div>
                <!-- End -->
              </div>
            </div>
      
          </div>
        </div>
      </div>
		
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