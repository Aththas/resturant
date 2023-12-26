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

    <style type="text/css">
      .normal{
        background: #7e92c8;
        color: #fff;
        border: none;
        height: 45px;
      }
    </style>
    
  </head>
  <body>
    <?php include("navbar.php"); ?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center mb-4">
            <h1 class="mb-2 bread">Ordered List Details</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="menu.html">menu <i class="ion-ios-arrow-forward"></i></a></span> <span>order list<i class="ion-ios-arrow-forward"></i></span></p>
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
                          <div class="p-2 px-3 text-uppercase">Order ID</div>
                        </th>
                        <th scope="col" class="border-0 bg-light">
                          <div class="py-2 text-uppercase">Order Date</div>
                        </th>
                        <th scope="col" class="border-0 bg-light">
                          <div class="py-2 text-uppercase">Total</div>
                        </th>
                        <th scope="col" class="border-0 bg-light">
                          <div class="py-2 text-uppercase">Payment Method</div>
                        </th>
                        <th scope="col" class="border-0 bg-light">
                          <div class="py-2 text-uppercase">Order Status</div>
                        </th>
                        <th scope="col" class="border-0 bg-light">
                          <div class="py-2 text-uppercase">View Order Details</div>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $uid = $_SESSION["user"];
                      $rsOrders = mysqli_query($link, "select * from tbl_order where userId = '$uid'");
                      while($row=mysqli_fetch_array($rsOrders))
                      {
                      ?>
                      <tr>
                        <td class="border-0 align-middle"><strong><?php echo $row["orderId"]; ?></strong></td>
                        <td class="border-0 align-middle"><?php echo $row["orderDate"]; ?></td>
                        <td class="border-0 align-middle"><?php echo $row["total"]; ?></td>
                        <td class="border-0 align-middle"><?php echo $row["paymentMethod"]; ?></td>
                        <?php
                        if($row["orderStatus"] == "success")
                        {
                          ?>
                          <td class="border-0 align-middle" style="color: green; text-transform: uppercase;"><strong><?php echo $row["orderStatus"]; ?></strong></td>
                          <?php
                        }
                        else if($row["orderStatus"] == "pending")
                        {
                          ?>
                          <td class="border-0 align-middle" style="color: orange; text-transform: uppercase;"><strong><?php echo $row["orderStatus"]; ?></strong></td>
                          <?php
                        }
                        else
                        {
                          ?>
                          <td class="border-0 align-middle" style="color: red; text-transform: uppercase;"><strong><?php echo $row["orderStatus"]; ?></strong></td>
                          <?php
                        }
                        $oid =$row["orderId"];
                        ?>
                        
                        <td class="border-0 align-middle"><a href="orderDetails.php?id=<?php echo $oid; ?>"><button class="normal" style="width: 100%;">VIEW</button></a></td>
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