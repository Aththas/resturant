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

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"resturant");

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
    </head>
    <body class="sb-nav-fixed">
        <?php include("topbar.php"); ?>
        <div id="layoutSidenav">
            <?php include("sidebar.php"); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Orders</h1>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Orders
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Ordered Date</th>
                                            <th>Reserved Date</th>
                                            <th>Reserved Time</th>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Table</th>
                                            <th>Total</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Ordered Date</th>
                                            <th>Reserved Date</th>
                                            <th>Reserved Time</th>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Table</th>
                                            <th>Total</th>
                                            <th>View</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            if($_SESSION["waiter"] == 1){
                                                $query = "SELECT * FROM tbl_reservation where tableNo in(1,2,3) order by resId desc";  
                                            }
                                            else if($_SESSION["waiter"] == 2){
                                                $query = "SELECT * FROM tbl_reservation where tableNo in(4,5,6) order by resId desc";  
                                            }
                                            else if($_SESSION["waiter"] == 3){
                                                $query = "SELECT * FROM tbl_reservation where tableNo in(7,8,9) order by resId desc";  
                                            }
                                               
                                            $rs_result = mysqli_query ($link, $query); 
                                            while($row=mysqli_fetch_array($rs_result))
                                            {
                                            echo "<tr>";
                                            echo "<td>"; echo $row["resId"]; echo "</td>";
                                            echo "<td>"; echo $row["orderedDate"]; echo "</td>";
                                            echo "<td>"; echo $row["reservedDate"]; echo "</td>";
                                            echo "<td>"; echo $row["time"]; echo "</td>";
                                            echo "<td>"; echo $row["name"]; echo "</td>";
                                            echo "<td>"; echo $row["email"]; echo "</td>";
                                            echo "<td>"; echo $row["phone"]; echo "</td>";
                                            echo "<td>"; echo $row["tableNo"]; echo "</td>";
                                            echo "<td>"; echo $row["total"]; echo "</td>";
                                            echo "<td>"; ?> 
                                                <a href="viewBooking.php?id=<?php echo $row['resId']; ?>"> <i class="far fa-eye" style="color: green; font-size: 18px;"></i> </a>
                                            <?php echo "</td>";
                                            echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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
    </body>
</html>
