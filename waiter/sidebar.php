<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">WAITER</div>
                            <a class="nav-link" href="booking.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Bookings
                            </a>
                            <a class="nav-link" href="systemInfo.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Settings
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as: WAITER</div>
                        <?php/*
                            $user = $_SESSION["admin"];
                            $resz= mysqli_query($link,"select username from users where id =$user ");
                            $rowz=mysqli_fetch_row($resz);  
                            $admin_name= $rowz[0];

                            echo $admin_name;*/
                        ?>
                    </div>
                </nav>
            </div>