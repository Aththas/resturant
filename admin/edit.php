<?php
session_start();
if($_SESSION["admin"]=="")
{
?>
<script type="text/javascript">
window.location="index.php";
</script>
<?php
}

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"resturant");

$id = $_GET["id"];
$res= mysqli_query($link,"select * from food where id=$id");
$row=mysqli_fetch_assoc($res);

    $p_name= $row["name"];
    $price= $row["price"];
    $product_image= $row["image"];
    $short_des= $row["short_des"]; 
    $long_des= $row["long_des"]; 
    $category= $row["type"];

    

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
        <title>ALIMENTA - ADMIN</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <script src="js/sweetalert.min.js"></script>
        <style type="text/css">
            .nav-profile-img {
        position: relative;
        width: 100%;
        height: 200px; }
        .nav-profile-img img {
          width: 100%;
          height: 200px; }
              input, button{   
        height: 34px;   
    } 
        </style>
    </head>
    <body class="sb-nav-fixed">
        <?php include("topbar.php"); ?>
        <div id="layoutSidenav">
            <?php include("sidebar.php"); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Product #<?php echo $id; ?></h1>

                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <div class="col-md-10">
                                            <div class="row mb-3">
                                                <div class="col-md-12" style="margin-bottom: 10px;">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="name" type="text" name="name" value="<?php echo $p_name; ?>"/>
                                                        <label for="inputFirstName">Product Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="margin-bottom: 10px;">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="price" name="price" type="text" value="<?php echo $price; ?> " onkeypress="return validation(event)"/>
                                                        <label for="inputLastName">Product Price</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="margin-bottom: 10px;">
                                                    <div class="form-floating">
                                                        <select name="pcategory" class="form-control">
                                                            <option selected><?php echo $category; ?></option> 
                                                            <?php 
                                                            $r = mysqli_query($link,"select distinct * from foodtype");

                                                            while ($rw=mysqli_fetch_array($r)) {
                                    
                                                                echo "<option>".$rw["name"]."</option>"; 
                                                            }

                                                            ?> 
                                                        </select>
                                                        <label for="inputLastName">Product Category</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="margin-bottom: 10px;">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <textarea class="form-control" name="short_des" rows="4" ><?php echo $short_des; ?></textarea>
                                                        <label for="inputFirstName">Short Description</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="margin-bottom: 10px;">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <textarea class="form-control" name="long_des" rows="4" ><?php echo $long_des; ?></textarea>
                                                        <label for="inputFirstName">Long Description</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating">
                                                        <div class="nav-profile-img">
                                                            <a href="../<?php echo $product_image; ?>"><img src="../<?php echo $product_image; ?>" /></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="pimage" type="file" style="padding-top: 35px;" />
                                                        <label for="inputLastName">Product Image</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6"  style="margin-top: -20px;">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="btn btn-primary btn-block" style="background-color: green;" name="update_product" type="submit" value="Update Product" />
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                    </div>

<script type="text/javascript">
    <script type="text/javascript">
    function validation(evt) {
          
        var ASCII = (evt.which) ? evt.which : evt.keyCode
        if (ASCII > 31 && (ASCII < 48 || ASCII > 57) )
            return false;
        return true;
    }
</script>
</script>

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
                        if(isset($_POST["update_product"]))
                        {

                            $fnm=$_FILES["pimage"]["name"];
                            $Q1 = $_POST["price"];
                            $intQ1 = (int)$Q1;

                            if($_POST["name"] == "" || $_POST["price"] == "" || $_POST["short_des"] == "" || $_POST["long_des"] == "" || $_POST["pcategory"] == "")
                            {
                                ?>
                                <script type="text/javascript">
                                    swal({
                                        title: "Food Update Failure",
                                        text: "Food details Cannot be Empty!!!",
                                        icon: "error"
                                    });
                                </script>
                                <?php
                            }
                            else if($intQ1 < 1)
                            {
                                ?>
                                <script type="text/javascript">
                                    swal({
                                        title: "Food Update Failure",
                                        text: "Invalid Price!!!",
                                        icon: "error"
                                    });
                                </script>
                                <?php
                            }
                            else
                            {
                                if($fnm=="")
                                {
                                    mysqli_query($link,"Update food set name='$_POST[name]',price='$_POST[price]',type='$_POST[pcategory]', short_des='$_POST[short_des]', long_des='$_POST[long_des]' where id=$id");
                    
                                }
                                else
                                {
                                    //product image
                                    $v1=rand(1,9);
                                    $v2=rand(1,9);
   
                                    $v3=$v1.$v2;
   
                                    $fnm=$_FILES["pimage"]["name"];
                                    $dst="../images/".$v3.$fnm;
                                    $dst1="images/".$v3.$fnm;
                                    move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);
                                    //end product image
                
                
                                    mysqli_query($link,"Update food set name='$_POST[name]',price='$_POST[price]',type='$_POST[pcategory]', short_des='$_POST[short_des]', long_des='$_POST[long_des]', image='$dst1' where id=$id");
        
                                }
                                ?>
                                <script type="text/javascript">
                                    swal({
                                        title: "Food Update Success",
                                        text: "Food # <?php echo $id; ?> has been Updated Successfully!!!",
                                        icon: "success"
                                    }).then(function() {
                                        window.location = "product.php";
                                    });
                                </script>

                                <?php
                            }
                        }
                        ?>

    </body>
</html>
