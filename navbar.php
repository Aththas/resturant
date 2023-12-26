   <div class="py-1 bg-black top">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 1235 2355 98</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">youremail@email.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
						    <p class="mb-0 register-link"><span>Open hours:</span> <span>Monday - Sunday</span> <span>8:00AM - 9:00PM</span></p>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Crystal Clear Cuisine</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	        	<li class="nav-item"><a href="menu.php" class="nav-link">Menu</a></li>
            	<li class="nav-item"><a href="service.php" class="nav-link">Service</a></li>
	          	<li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
	          	<li class="nav-item cta"><a href="reservation.php" class="nav-link">Book a table</a></li>
	          	<?php 
	          		if(isset($_SESSION["user"]))
	          		{
	          			?>
	          				<!-- <li class="nav-item"><a href="viewOrders.php" class="nav-link">Orders</a></li>
            				<li class="nav-item"><a href="viewBookings.php" class="nav-link">Booking</a></li> -->
	        				<li class="nav-item"><a href="profile.php" class="nav-link">Profile</a></li>
	          				<li class="nav-item"><a href="logout.php" class="nav-link">LogOut</a></li>
	          				<li class="nav-item cta"><a href="cart.php" class="nav-link">
	          			<?php
	          			if(isset($_SESSION['cart'])){
	          				echo count($_SESSION['cart']);
	          			}
	          			else{
	          				echo 0;
	          			}
	          			?>
	          				</a></li>
	          			<?php
	          		}
	          		else
	          		{
	          			?>
	          				<li class="nav-item"><a href="login.php" class="nav-link">LogIn</a></li>
	          			<?php
	          		}
	          	?>
	          	
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->