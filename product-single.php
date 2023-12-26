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
$foodId = $_GET["id"];
$result = mysqli_query($link, "SELECT * FROM food WHERE id = '$foodId'");
$row = mysqli_fetch_assoc($result);
$foodName = $row['name'];
$foodImage = $row['image'];
$foodPrice = $row['price'];
$foodShortDes = $row['short_des'];
$foodLongDes = $row['long_des'];

//cart
// Check if the cart session variable is not set, initialize it as an empty array
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Function to add an item to the cart
function addToCart($productId, $quantity) {
    // Check if the product is already in the cart
    if (array_key_exists($productId, $_SESSION['cart'])) {
        // If it is, update the quantity
        $_SESSION['cart'][$productId] += $quantity;
    } else {
        // If not, add a new entry
        $_SESSION['cart'][$productId] = $quantity;
    }
}


// Check if the "Add to Cart" button is clicked
if (isset($_POST['cartBtn'])) {
    // Get the product ID and quantity from the form
    $productQty = $_POST['qty'];

    // Add the product to the cart
    addToCart($foodId, $productQty);
}
//cart end



//table
// Check if the table session variable is not set, initialize it as an empty array
if (!isset($_SESSION['table'])) {
    $_SESSION['table'] = array();
}

// Function to add an item to the table
function addToTable($productId, $quantity) {
    // Check if the product is already in the table
    if (array_key_exists($productId, $_SESSION['table'])) {
        // If it is, update the quantity
        $_SESSION['table'][$productId] += $quantity;
    } else {
        // If not, add a new entry
        $_SESSION['table'][$productId] = $quantity;
    }
}


// Check if the "Add to Table" button is clicked
if (isset($_POST['tableBtn'])) {
    // Get the product ID and quantity from the form
    $productQty = $_POST['qty'];

    // Add the product to the table
    addToTable($foodId, $productQty);
}
//table end

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
            <h1 class="mb-2 bread">#<?php echo $foodId; ?> <?php echo $foodName; ?></h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="menu.php">Menu <i class="ion-ios-arrow-forward"></i></a></span> <span><?php echo $foodName; ?><i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <img src="<?php echo $foodImage; ?>" width="100%" id="MainImg">
        </div>

        <div class="single-pro-details">
            <h6><?php echo $foodShortDes; ?></h6>
            <h4><?php echo $foodName; ?></h4>
            <h2>LKR <?php echo $foodPrice; ?></h2>   
            <form method="POST">
              <input type="number" value="1" name="qty" min="1">
              <input type="submit" value="Add to Cart" class="normal" name="cartBtn" style="width: 100px;">or <input type="submit" value="Add to Table" class="normal" name="tableBtn" style="width: 110px;">
            </form>     
            <h4>Product Details</h4>
            <span><?php echo $foodLongDes; ?></span>
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