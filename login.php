<?php
session_start();
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"resturant");
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

  <!------------------------------ other web site link - start ------------------------->
  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="css/stylelogin.css" rel="stylesheet"> 

  <script src="js/sweetalert.min.js"></script>
  <style type="text/css">
    .btn{
      background-color: #7A89B5;
      color: white;
    }

    .btn:hover{
      color: white;
    }
  </style>

  <!------------------------------ other web site link - end --------------------------->
</head>

<body style="background-image: url(images/bg_4.jpg); background-size: cover;">
  
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form method="POST">
                <h1>Create Account</h1>
                <input type="text" placeholder="User Name" name="uname"/>
                <input type="email" placeholder="Email" name="email"/>
                <input type="password" placeholder="Password" name="pwd"/>
                <input type="password" placeholder="Re-Enter Password" name="rpwd"/>
                <input type="submit" name="reg" value="sign up" class="btn"/>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form method="POST">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <input type="email" placeholder="Email" name="email"/>
                <input type="password" placeholder="Password" name="pwd"/>
                <a href="#">Forgot your password?</a>
                <input type="submit" name="log" value="sign in" class="btn"/>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>


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
  <script src="js/login.js"></script>

</body>

</html>
<?php

if(isset($_POST["reg"]))
{
    $name = $_POST["uname"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $rpwd = $_POST["rpwd"];

    //check for existing username
    $existName = mysqli_query($link, "select * from user where username = '$name'");

    //check for existing email
    $existEmail = mysqli_query($link, "select * from user where email = '$email'"); 

    if($name == "" || $email == "" || $pwd == "" || $rpwd == "")//check for empty fields
    {
        ?>
        <script type="text/javascript">
        swal({
                title: "Registration Failed",
                text: "Fields Can't be empty!!!",
                icon: "error"
            });
        </script>
        <?php
    }
    else if(mysqli_num_rows($existName) != 0)//check username existance
    {
        ?>
        <script type="text/javascript">
        swal({
                title: "Registration Failed",
                text: "Username already exist!!!",
                icon: "error"
            });
        </script>
        <?php
    }
    else if(mysqli_num_rows($existEmail) != 0)//check email existance
    {
        ?>
        <script type="text/javascript">
        swal({
                title: "Registration Failed",
                text: "Email already exist!!!",
                icon: "error"
            });
        </script>
        <?php
    }
    else if($pwd != $rpwd)//check for password match
    {
        ?>
        <script type="text/javascript">
        swal({
                title: "Registration Failed",
                text: "Password mismatch!!!",
                icon: "error"
            });
        </script>
        <?php
    }
    else
    {
        $encrypt_pwd = password_hash($pwd, PASSWORD_DEFAULT);//encrypt password
        mysqli_query($link,"insert into user values('','$name','$email','$encrypt_pwd')");

        ?>
        <script type="text/javascript">
        swal({
                title: "Registration Success",
                text: "Registration has been done successfully!!!",
                icon: "success"
            }).then(function() {
            window.location = "login.php";
        });
        </script>
        <?php
    }                                          
}

if(isset($_POST["log"]))
{
  $email = $_POST["email"];
  $pwd = $_POST["pwd"];

  $result = mysqli_query($link, "select * from user where email = '$email'");

  if($email == "" || $pwd == "")//check empty fields
  {
    ?>
      <script type="text/javascript">
      swal({
              title: "Login Error",
              text: "Fields Can't be empty!!!",
              icon: "error"
          });
      </script>
    <?php
  }
  else if(mysqli_num_rows($result) != 0)//check the username existance
  {
    $row = mysqli_fetch_assoc($result);//fetch data
    $password = $row['password'];//fetch password

    $verify = password_verify($pwd, $password);//verify with encrypted password
    if($verify)
    {
      $_SESSION["user"] = $row["id"];//create user session
      ?>
        <script type="text/javascript">
          window.location="index.php";
        </script>
      <?php
    }
    else
    {
      ?>
        <script type="text/javascript">
        swal({
                title: "Login Error",
                text: "Email or password error!!!",
                icon: "error"
            });
        </script>
      <?php
    } 
  }
  else
  {
    ?>
      <script type="text/javascript">
      swal({
              title: "Login Error",
              text: "Email or password error!!!",
              icon: "error"
          });
      </script>
    <?php
  }
}
    
?>