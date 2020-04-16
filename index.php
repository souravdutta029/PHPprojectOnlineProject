<?php 
	include ('includes/config.php');
	include ('functions/functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Online Shop</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="styles/style.css">
</head>
<body>
	<div id="top">  <!--top bar starts -->
		<div class="container"> <!--container starts -->
			<div class="col-md-6 offer"> <!--col-md-6 offer starts -->
				<?php
					dispName();
				?>
				<!-- <a href="#" class="btn btn-success btn-sm">Wlecome Guest</a> -->
				<a href="#">Shopping Cart Total Price: INR <?php totalPrice(); ?>, <?php itemCount(); ?> Item(s) In Cart</a>
				
			</div> <!--col-md-6 offer ends -->
			<div class="col-md-6">
				<ul class="menu">
					<!-- <li><a href="customer_registration.php">Register</a></li> -->
					
						<?php
						
							if(isset($_SESSION['customer_email'])){
								
							}else{
								echo "<li><a href='customer_registration.php'>Register</a></li>";
							}
						
						?>
					
					<!-- <li><a href="customer/my_account.php">My Account</a></li> starts -->
					<li>
					
					<?php

						if(!isset($_SESSION['customer_email'])){
							echo "<a href='checkout.php'>My Account</a>";
						}else{
							echo "<a href='customer/my_account.php?my_orders'>My Account</a>";
						}

					
					?>
					
					</li>

					<!-- <li><a href="customer/my_account.php">My Account</a></li> ends --> 
					<li><a href="cart.php">Goto Cart</a></li>
					<?php

					if(!isset($_SESSION['customer_email'])){
						echo "<li><a href='checkout.php'>Login</a></li>";
					}else{
						echo "<li><a href='logout.php'>Logout</a></li>";
					}

					?>
					
					
				</ul>
				
			</div>
		</div> <!--container ends -->
	</div> <!--top bar ends -->

	<div class="navbar navbar-default" id="navbar"> <!--navbar navbar-default starts -->
		<div class="container">  <!--container starts -->
			<div class="navbar-header"> <!--navbar header starts -->
				<a class = "navbar-brand home" href="index.php">
					<img src="images/logo1.png" alt="" class="hidden-xs">
					<img src="images/logoS.png" alt="" class="visible-xs">
				</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
					<span class="sr-only">Toggle Navigation</span>
					<i class="fa fa-align-justify"></i>
				</button>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
					<span class="sr-only"></span>
					<i class="fa fa-search"></i>
				</button>
			</div> <!--navbar header ends -->
			
			<div class="navbar-collapse collapse" id="navigation"> <!--navbar-collapse collapse starts -->
				<div class="padding-nav">  <!--padding-nav starts -->
					<ul class="nav navbar-nav navbar-left">
						<li class="active">
							<a href="index.php">Home</a>
						</li>
						<li>
							<a href="shop.php">Shop</a>
						</li>
						<li>
						<?php

							if(!isset($_SESSION['customer_email'])){
								echo "<a href='checkout.php'>My Account</a>";
							}else{
								echo "<a href='customer/my_account.php?my_orders'>My Account</a>";
							}

					
					    ?>
						</li>
						<li>
							<a href="cart.php">Shopping Cart</a>
						</li>
						
						<li>
							<a href="contact.php">Contact US</a>
						</li>
					</ul>
				</div> <!--padding-nav ends -->
				<a href="cart.php" class="btn btn-primary navbar-btn right">
					<i class="fa fa-shopping-cart"></i>
					<span><?php itemCount(); ?> Item(s) In Cart</span>
				</a>
				<div class="navbar-collapse collapse right"> <!--navbar-collapse collapse-right starts -->
					<button class="btn-navbar btn btn-primary" type="button" data-toggle ="collapse" data-target="#search">
						<span class="sr-only">Toggle Search</span>
						<i class="fa fa-search"></i>
					</button>
					
				</div> <!--navbar-collapse collapse-right ends -->

				<div class="collapse clearfix" id="search">
					
					<form action="result.php" class="navbar-form" method="get">
						<div class="input-group">
							<input type="text" name="user_query" placeholder="Search" class="form-control" required="">
							<span class="input-group-btn">
							<button type="submit" value="Search" name="search" class="btn btn-primary">
								<i class="fa fa-search"></i>
							</button>
							</span>
						</div>
					</form>
				</div>
			
			</div>   <!--navbar-collapse collapse ends -->
		
		</div> <!--container ends -->
	</div> <!--navbar navbar-default ends -->

<!-- slider section -->	
	<div class="container" id="slider">
		<div class="col-md-12">
			<div class="carousel slide" id="myCarousel" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="myCarousel" data-slide-to="1"></li>
					<li data-target="myCarousel" data-slide-to="2"></li>
					<li data-target="myCarousel" data-slide-to="3"></li>
				</ol>
				<div class="carousel-inner">
					<?php
						$get_slider = "SELECT * FROM slider LIMIT 0,1";
						$result_slider = mysqli_query($conn, $get_slider);
						if(mysqli_num_rows($result_slider) > 0){
							while($row = mysqli_fetch_assoc($result_slider)){
								$slider_name = $row['slider_name'];
								$slider_image = $row['slider_image'];
								echo "<div class= 'item active'>
								<img src='admin/slider_images/$slider_image'/>
								</div>";
							}
						}
					?>
					
					<?php
						$get_slider = "SELECT * FROM slider LIMIT 1,3";
						$result_slider = mysqli_query($conn, $get_slider);
						if(mysqli_num_rows($result_slider) > 0){
							while($row = mysqli_fetch_assoc($result_slider)){
								$slider_name = $row['slider_name'];
								$slider_image = $row['slider_image'];
								echo "<div class='item'>
								<img src='admin/slider_images/$slider_image'/>
								</div>";
							}
						}
					?>

				</div>
				<a href="#myCarousel" class="left carousel-control" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a href="#myCarousel" class="right carousel-control" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div> <!-- slider section ends -->

	<div id="advantage">  <!-- advantage starts -->
		<div class="container">   <!-- container starts -->
			<div class="same-height-row"> <!-- same-height-row starts -->
				<div class="col-sm-4">   <!-- col-sm-4 starts -->
					<div class="box same-height"> <!-- box same-height starts -->
						<div class="icon">   <!-- icon starts -->
							<i class="fa fa-heart"></i>
						</div>   <!-- icon ends -->
						<h3><a href="#">BEST PRICES</a></h3>
						<p>You can check on all other sites about the price and than compare with us.</p>
					</div>  <!-- box same-height ends -->
				</div>  <!-- col-sm-4 ends -->
				<div class="col-sm-4">   <!-- col-sm-4 starts -->
					<div class="box same-height"> <!-- box same-height starts -->
						<div class="icon">   <!-- icon starts -->
							<i class="fa fa-heart"></i>
						</div>   <!-- icon ends -->
						<h3><a href="#">100% SATISFACTION GUARANTEED FROM US</a></h3>
						<p>Every products can be returned for free if not upto the marks.</p>
					</div>  <!-- box same-height ends -->
				</div>  <!-- col-sm-4 ends -->
				<div class="col-sm-4">   <!-- col-sm-4 starts -->
					<div class="box same-height"> <!-- box same-height starts -->
						<div class="icon">   <!-- icon starts -->
							<i class="fa fa-heart"></i>
						</div>   <!-- icon ends -->
						<h3><a href="#">WE LOVE OUR CUSTOMERS</a></h3>
						<p>We are known to provide best services ever known.</p>
					</div>  <!-- box same-height ends -->
				</div>  <!-- col-sm-4 ends -->
			</div>  <!-- same-height-row ends -->
		</div>  <!-- container ends -->
	</div>   <!-- advantage ends -->

	<div id="hotbox">   <!-- hotbox starts -->
		<div class="box"> <!-- box starts -->
			<div class="container">  <!-- container starts -->
				<div class="col-md-12"> <!-- col-md-12 starts -->
					<h2>Latest this week</h2>
				</div> <!-- col-md-12 ends -->
			</div>	<!-- container ends -->		
		</div>	 <!-- box ends -->	
	</div>  <!-- hotbox ends -->

<!-- Product section ends -->
	<div id="content" class="container">  <!-- container starts -->
		<div class="row">  <!-- row start -->
			<?php
				getPro();
			?>
		</div>	  <!-- row ends -->	
	</div>	 <!-- container ends -->

<!-- footer starts -->
<?php
	include ('includes/footer.php');
?>
<!-- footer ends -->

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>