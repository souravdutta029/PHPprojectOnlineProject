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
					<!-- <li><a href="customer/my_account.php">My Account</a></li> -->
					<li>
					<?php

						if(!isset($_SESSION['customer_email'])){
							echo "<a href='checkout.php'>My Account</a>";
						}else{
							echo "<a href='customer/my_account.php?my_orders'>My Account</a>";
						}

					
					?>
					</li>
					<li><a href="cart.php">Goto Cart</a></li>
					<?php

					if(!isset($_SESSION['customer_email'])){
						echo "<li><a href='checkout.php'>Login</a></li>";
					}else{
						echo "<li><a href='Logout.php'>Logout</a></li>";
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
						<li >
							<a href="index.php">Home</a>
						</li>
						<li class="active">
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

<div id="content">  <!--content starts-->
	<div class="container">  <!--container starts-->
		<div class="col-mdt7">  <!--col-mdt7 starts-->
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li>Shop</li>
			</ul>
		</div>   <!--col-mdt7 ends-->

		<div class="col-md-3"> <!--col-md-3 starts-->
			<?php include ('includes/sidebar.php');?>
		</div>  <!--col-md-3 ends-->


		<div class="col-md-9"> <!--col-md-9 starts-->
			<?php
				if(! isset($_GET['p_cat'])){
					if(! isset($_GET['cat_id'])){
						
						echo"<center><div class='box'>
							<h1>Shop</h1>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
						</div></center>";
					}
				}
			?>

			<div class="row">   <!--row starts-->
				<?php
					if(!isset($_GET['p_cat']) && !isset($_GET['cat_id'])){
						
						$per_page = 6;
						if(isset($_GET['page'])){
							$page = $_GET['page'];
						}else{
							$page = 1;
						}

						$start_from = ($page - 1) * $per_page;
						$get_product = "SELECT * FROM products ORDER BY product_id DESC LIMIT $start_from, $per_page";
						$run_query = mysqli_query($conn, $get_product) or die("Query Failed");
						if(mysqli_num_rows($run_query) > 0){
							while($row = mysqli_fetch_assoc($run_query)){
								$product_id = $row['product_id'];
								$product_title = $row['product_title'];
								$product_price = $row['product_price'];
								$product_img1 = $row['product_img1'];

								echo "<div class='col-md-4 col-sm-6 center-responsive'>
								<div class='product'>
									<a href='details.php?pro_id=$product_id'>
										<img src='admin/product_images/insert_images/$product_img1' class='img-responsive'>
									</a>
									<div class='text'>
										<h3><a href='details.php?pro_id=$product_id'>$product_title</a></h3>
										<p class='price'> INR $product_price</p>
										<p class='buttons'>
											<a href='details.php?pro_id=$product_id' class='btn btn-default'> View Details</a>
											<a href='details.php?pro_id=$product_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add To Cart</a>
										</p>
									</div>
								</div>
						   </div>"; 
							}	

						}
					?>
					

				
			</div>  <!--row ends-->

			<!-- Pagination -->
			<center>
				<ul class="pagination">
					<?php

						$query = "SELECT * FROM products";
						$result_query = mysqli_query($conn, $query) or die("Query Failed");
						$total_record = mysqli_num_rows($result_query);
						$total_pages = ceil($total_record / $per_page);

						if($page > 1){
							echo "<li><a href='shop.php?page=".($page - 1)."'><i class='fa fa-chevron-left'></i> Prev</a></li>";
						}
						if($total_record > $per_page){
							for($i = 1; $i <= $total_pages; $i++){
								if($i == $page){
									$cls ='btn-primary active';
								}else{
									$cls ='btn-primary';
								}
								echo "<li><a href='shop.php?page=".$i."' class='$cls'>$i</a></li>";
							}
						}
						if($total_pages > $page){
							echo "<li><a href='shop.php?page=".($page + 1)."'>Next <i class='fa fa-chevron-right'></i></a></li>";
						}

						}
					?>
				</ul>
			</center>
			
			<?php
				getpCatPro();
				getCatPro();
			?>
			
		</div>    <!--col-md-9 ends-->

	</div>   <!--container ends-->
</div>  <!--content ends-->



<?php include('includes/footer.php');?>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>