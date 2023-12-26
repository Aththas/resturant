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
$id = $_SESSION["user"];
$result = mysqli_query($link, "SELECT * FROM user WHERE id = '$id'");
$row = mysqli_fetch_assoc($result);
$name = $row['username'];
$email = $row['email'];
$pwd = $row["password"];
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
            <h1 class="mb-2 bread">Profile Page</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="profile.php">Profile <i class="ion-ios-arrow-forward"></i></a></span></p>
          </div>
        </div>
      </div>
    </section>


    <section style="background-color: #eee;">
        <div class="container py-5">
          <div class="row">
            <div class="col-lg-4">
              <div class="card mb-4">
                <div class="card-body text-center">
                  <img src="images/user.jpg" alt="avatar"
                    class="rounded-circle img-fluid" style="width: 150px;">
                  <h5 class="my-3"><?php echo $name; ?></h5>
                  <p class="text-muted mb-1">Full Stack Developer</p>
                  <p class="text-muted mb-4"><?php echo $email; ?></p>
                  <div class="d-flex justify-content-center mb-2">
                    <button type="button" class="btn btn-primary">Follow</button>
                    <button type="button" class="btn btn-outline-primary ms-1">Edit Profile</button>
                  </div>
                </div>
              </div>
              <!--<div class="card mb-4 mb-lg-0">
                <div class="card-body p-0">
                  <ul class="list-group list-group-flush rounded-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fas fa-globe fa-lg text-warning"></i>
                      <p class="mb-0">https://mdbootstrap.com</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                      <p class="mb-0">mdbootstrap</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                      <p class="mb-0">@mdbootstrap</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                      <p class="mb-0">mdbootstrap</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                      <p class="mb-0">mdbootstrap</p>
                    </li>
                  </ul>
                </div>
              </div>-->
            </div>
            <div class="col-lg-8">
              <div class="card mb-4">
                <div class="card-body">
                  <form method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="User Name" value="<?php echo $name; ?>">
                            <div id="nameError" class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="User Email" value="<?php echo $email; ?>">
                            <div id="emailError" class="error-message"></div>
                        </div>
                        <label style="color: gray;">(Leave the Current Password Field Blank If Your Don't Want Reset The Password)</label>
                        <div class="form-group">
                            <input type="password" class="form-control" name="current-password" id="current-password" placeholder="Current Password">
                            <div id="CurrentPasswordError" class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="new-password" id="new-password" placeholder="New Password">
                            <div id="NewPasswordError" class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="confirm-password" id="confirm-password" placeholder="Re Enter Password">
                            <div id="confirmPasswordError" class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Update Details" class="btn btn-primary py-3 px-5" name="updateProfile">
                        </div>
                    </form>
                </div>
              </div>
              <!--<div class="row">
                <div class="col-md-6">
                  <div class="card mb-4 mb-md-0">
                    <div class="card-body">
                      <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                      </p>
                      <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                      <div class="progress rounded" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                      <div class="progress rounded" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                      <div class="progress rounded" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                      <div class="progress rounded" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                      <div class="progress rounded mb-2" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card mb-4 mb-md-0">
                    <div class="card-body">
                      <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                      </p>
                      <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                      <div class="progress rounded" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                      <div class="progress rounded" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                      <div class="progress rounded" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                      <div class="progress rounded" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                      <div class="progress rounded mb-2" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>-->
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

if(isset($_POST["updateProfile"]))
{
  $name = $_POST["name"];
  $email = $_POST["email"];
  $cpwd = $_POST["current-password"];
  $npwd = $_POST["new-password"];
  $rpwd = $_POST["confirm-password"];

  if($cpwd == "")
  {
    if($name == "" || $email == "")
    {
      ?>
      <script type="text/javascript">
      swal({
              title: "Profile update Error",
              text: "Fields Can't be empty!!!",
              icon: "error"
          });
      </script>
      <?php
    }
    else
    {
      mysqli_query($link, "update user set username='$name', email='$email' where id = '$id'");

      ?>
      <script type="text/javascript">
      swal({
              title: "Profile update success",
              text: "Profile has been updated!!!",
              icon: "success"
          }).then(function() {
            window.location = "profile.php";
        });
      </script>
      <?php
    }
  }
  else
  {

    if($name == "" || $email == "" || $cpwd == "" || $npwd == "" || $rpwd == "")
    {
      ?>
      <script type="text/javascript">
      swal({
              title: "Profile update Error",
              text: "Fields Can't be empty!!!",
              icon: "error"
          });
      </script>
      <?php
    }
    else 
    {
      $verify = password_verify($cpwd, $pwd);

      if($verify)
      {
        if($npwd == $rpwd)
        {
          $encrypt_pwd = password_hash($npwd, PASSWORD_DEFAULT);
          mysqli_query($link, "update user set username='$name', email='$email', password='$encrypt_pwd' where id = '$id'");

          ?>
          <script type="text/javascript">
          swal({
                  title: "Profile update success",
                  text: "Profile and Password has been updated!!!",
                  icon: "success"
              }).then(function() {
                window.location = "profile.php";
            });
          </script>
          <?php
        }
        else
        {
          ?>
          <script type="text/javascript">
          swal({
                  title: "Password Reset Error",
                  text: "Password Not Matched!!!",
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
                title: "Password Reset Error",
                text: "Password is Wrong!!!",
                icon: "error"
            });
        </script>
        <?php
      }
    }
  }
}

?>