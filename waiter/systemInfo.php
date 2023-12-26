<?php
session_start();
if($_SESSION["waiter"]=="")
{
?>
<script type="text/javascript">
window.location="index.php";
</script>
<?php
}

$user = $_SESSION["waiter"];

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"resturant");

$res1= mysqli_query($link,"select * from waiter where id = $user");
$row1=mysqli_fetch_assoc($res1);  
$name= $row1["name"];
$decrypt_pwd = $row1["password"];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" href="../uploads/alimenta.jpeg">
        <title>ADMIN</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <script src="js/sweetalert.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php include("topbar.php"); ?>
        <div id="layoutSidenav">
            <?php include("sidebar.php"); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">User Authentication Settings</h1>

                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="row mb-3">
                                                <div class="col-md-6" style="margin-bottom: 10px;">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="uname" type="text" name="uname" value="<?php echo $name; ?>"/>
                                                        <label for="inputFirstName">User Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" style="margin-bottom: 10px;">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="cpwd" type="password" name="cpwd"/>
                                                        <label for="inputFirstName">Current Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" style="margin-bottom: 10px;">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="npwd" type="password" name="npwd"/>
                                                        <label for="inputFirstName">New Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" style="margin-bottom: 10px;">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="rpwd" type="password" name="rpwd"/>
                                                        <label for="inputFirstName">Re Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6"  style="margin-top: 10px;">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="btn btn-primary btn-block" style="background-color: green;" name="update_password" type="submit" value="Update Password" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                    </div>

                    </div>
                </main>
                <?php include("footer.php"); ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

        <?php

                        if(isset($_POST["update_password"]))
                        {

                            $verify = password_verify($_POST["cpwd"],$decrypt_pwd);

                            if($_POST["npwd"] == "" || $_POST["rpwd"] == "")
                            {
                                ?>
                                <script type="text/javascript">
                                    swal({
                                        title: "User Authentication Error",
                                        text: "Empty Fields!!!",
                                        icon: "error"
                                    });
                                </script>
                                <?php
                            }
                            else if($verify)
                            {
                                if($_POST["npwd"] != $_POST["rpwd"])
                                {
                                    ?>
                                    <script type="text/javascript">
                                        swal({
                                            title: "User Authentication Error",
                                            text: "Password not matched. Not able to update the password. Try again!!!",
                                            icon: "error"
                                        });
                                    </script>
                                    <?php
                                }
                                else
                                {
                                    $encrypt_pwd = password_hash($_POST["npwd"], PASSWORD_DEFAULT);
                                    $uname = $_POST["uname"];
                                    mysqli_query($link,"Update waiter set password='$encrypt_pwd', name ='$uname' where id=$user");
                    
                                    ?>
                                    <script type="text/javascript">
                                        swal({
                                                title: "User Authentication Error",
                                                text: "Username and Password updated successfully!!!",
                                                icon: "success"
                                            }).then(function() {
                                            window.location = "systemInfo.php";
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
                                        title: "User Authentication Error",
                                        text: "Invalid Password!!!",
                                        icon: "error"
                                    });
                                </script>
                                <?php
                            }
                        }
                        ?>

    </body>
</html>
