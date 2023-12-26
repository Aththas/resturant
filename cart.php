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
            <h1 class="mb-2 bread">Cart Page</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="menu.php">menu <i class="ion-ios-arrow-forward"></i></a></span> <span>cart page<i class="ion-ios-arrow-forward"></i></span></p>
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
                <?php
                $total = 0;
                if(isset($_SESSION['cart'])) {
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
                          foreach($_SESSION['cart'] as $productId => $quantity) {

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
                        <td class="border-0 align-middle"><a href="deleteCart.php?id=<?php echo $productId; ?>" class="text-dark"><i class="fa fa-trash"></i></a></td>
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
              <div class="col-lg-3">
                <!--<div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Coupon code</div>
                <div class="p-4">
                  <p class="mb-4">If you have a coupon code, please enter it in the box below</p>
                  <div class="input-group mb-4 border rounded-pill p-2">
                    <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3" class="form-control border-0">
                    <div class="input-group-append border-0">
                      <button id="button-addon3" type="button" class="btn btn-primary py-3 px-5 rounded-pill"><i class="fa fa-gift mr-2"></i>Apply coupon</button>
                    </div>
                  </div>
                </div>
                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller</div>
                <div class="p-4">
                  <p class="mb-4">If you have some information for the seller you can leave them in the box below</p>
                  <textarea name="" cols="30" rows="2" class="form-control"></textarea>
                </div>-->
              </div>
              <div class="col-lg-6">
                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
                <div class="p-4">
                  <p class="mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
                  <ul class="list-unstyled mb-4">
                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>LKR <?php echo number_format($total, 2); ?></strong></li>
                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Delivery Charge</strong><strong>
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
                            200.00
                          <?php
                        }
                      ?></strong></li>
                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Service Charge</strong><strong><?php echo number_format($total*0.05, 2); ?></strong></li>
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
                            <?php echo number_format($total+200+($total*0.05), 2); ?>
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
                        <a href="payment.php?tot=<?php echo $total+200+($total*0.05); ?>" class="btn btn-primary py-3 px-5 py-2 btn-block">Procceed to checkout</a>
                      <?php
                    }
                  ?>
                </div>
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