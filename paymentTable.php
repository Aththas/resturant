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
$tot = $_GET["tot"];
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
            <h1 class="mb-2 bread">Payment Page</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="reservation.php.php">Reservation <i class="ion-ios-arrow-forward"></i></a></span> <span>payment page<i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <div class="container">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            Payment method
                        </div>
                        <div class="ibox-content">
                            <div class="panel-group payments-method" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="pull-right">
                                            <i class="fa fa-cc-amex text-success"></i>
                                            <i class="fa fa-cc-mastercard text-warning"></i>
                                            <i class="fa fa-cc-discover text-danger"></i>
                                        </div>
                                        <h5 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Card Payment</a>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <h2>Summary</h2>
                                                    <strong>Total Bill:</strong>: <span class="text-navy">LKR <?php echo number_format($tot, 2); ?></span>
                                                    <p class="m-t">
                                                        We assure you that all payment information will be handled with the utmost confidentiality and will only be used for the specific transaction at hand. We do not store any credit card information on our servers, and all payment processing is conducted through secure and trusted third-party payment gateways.
                                                    </p>
                                                    <p>
                                                        Additionally, cancellations may be subject to certain fees or conditions. It is the responsibility of the user to carefully review and understand our refund and cancellation policy before proceeding with any payment
                                                    </p>
                                                </div>
                                                <div class="col-md-7">
                                                    <form role="form" id="payment-form" method="POST">
                                                        <div class="row">
                                                            <div class="col-xs-12">
                                                                <div class="form-group">
                                                                    <label>CARD NUMBER</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" name="Number" placeholder="Valid Card Number" required="" style="width: 30rem;" maxlength="16" onkeypress="return validation(event)">
                                                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-7 ">
                                                                <div class="form-group">
                                                                    <label>EXPIRATION DATE</label>
                                                                    <input type="text" class="form-control" name="Expiry" placeholder="MM/YY" required="" maxlength="5">
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-5 col-md-5 pull-right">
                                                                <div class="form-group">
                                                                    <label>CV CODE</label>
                                                                    <input type="text" class="form-control" name="CVC" placeholder="CVC" required="" maxlength="3" onkeypress="return validation(event)">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-12">
                                                                <div class="form-group">
                                                                    <label>NAME OF CARD</label>
                                                                    <input type="text" class="form-control" name="nameCard" placeholder="NAME AND SURNAME" style="width: 30rem;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-12">
                                                                <input class="btn btn-primary" type="submit" name="cardPay" value="Make Payment">
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <script type="text/javascript">
                                                        function validation(evt) {
                                                              
                                                            var ASCII = (evt.which) ? evt.which : evt.keyCode
                                                            if (ASCII > 31 && (ASCII < 48 || ASCII > 57) )
                                                                return false;
                                                            return true;
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

<?php
if(isset($_POST["cardPay"]))
{

    if($_POST["Number"] == "" || $_POST["Expiry"] == "" || $_POST["CVC"] == "" || $_POST["nameCard"] == "")
    {
        ?>
      <script type="text/javascript">
      swal({
              title: "Payment Error",
              text: "Card details are required!!!",
              icon: "error"
          });
      </script>
    <?php
    }
    else
    {
        ?>
        <script type="text/javascript">
        swal({
                title: "Reservation Success",
                text: "Table has been reserved successfully!!!",
                icon: "success"
            }).then(function() {
            window.location = "viewBookings.php";
        });
        </script>
        <?php
    }
}
?>