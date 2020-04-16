<?php 
	include ('includes/config.php');
	include ('functions/functions.php');
?>

<?php
	if(isset($_GET['pro_id'])){
		$pro_id = $_GET['pro_id'];
		
		$get_product = "SELECT * FROM products WHERE product_id = '$pro_id'";
		$run_query = mysqli_query($conn, $get_product) or die("get_product");
		$row_product = mysqli_fetch_assoc($run_query);

		$p_cat_id = $row_product['p_cat_id'];
		$p_title = $row_product['product_title'];
		$p_price = $row_product['product_price'];
		$p_desc = $row_product['product_desc'];
		$p_img1 = $row_product['product_img1'];
		$p_img2 = $row_product['product_img2'];
		$p_img3 = $row_product['product_img2'];

		$get_p_cat = "SELECT * FROM product_category WHERE p_cat_id = '$p_cat_id'";
		$run_p_cat = mysqli_query($conn, $get_p_cat) or die("get_p_cat query failed.");
		$row_p_cat = mysqli_fetch_assoc($run_p_cat);

		$p_cat_id = $row_p_cat['p_cat_id'];
		$p_cat_title = $row_p_cat['p_cat_title'];
	
	}
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
						<li >
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

<div id="content">  <!--content starts-->
	<div class="container">  <!--container starts-->
		<div class="col-mdt7">  <!--col-mdt7 starts-->
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li>Shop</li>
				<li><a href='shop.php?p_cat=<?php echo $p_cat_id;?>'><?php echo $p_cat_title;?></a></li>
				<li><?php echo $p_title;?></li>
			</ul>
		</div>   <!--col-mdt7 ends-->

		<div class="col-md-3"> <!--col-md-3 starts-->
			<?php include ('includes/sidebar.php');?>
		</div>  <!--col-md-3 ends-->

		<div class="col-md-9"> <!--col-md-9 starts-->
			<div class="row" id="productmain">  <!--class row and id productmain starts-->
				<div class="col-sm-6">  <!--col-sm-6 slider starts-->
					<div id="mainimage">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="myCarousel" data-slide-to="0" class="active"></li>
								<li data-target="myCarousel" data-slide-to="1"></li>
								<li data-target="myCarousel" data-slide-to="2"></li>	
							</ol>
							<div class="carousel-inner">
								<div class="item active">
									<center>
										<img src="admin/product_images/insert_images/<?php echo $p_img1;?>" class="img-responsive">
									</center>
								</div>

								<div class="item">
									<center>
										<img src="admin/product_images/insert_images/<?php echo $p_img2;?>"  class="img-responsive">
									</center>
								</div>

								<div class="item">
									<center>
										<img src="admin/product_images/insert_images/<?php echo $p_img3;?>"  class="img-responsive">
									</center>
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
					</div>					
				</div>	<!--col-sm-6 slider ends-->

				<div class="col-sm-6">
					<div class="box">  <!--box starts-->
						<h1 class="text-center"><?php echo $p_title;?></h1>

						<?php addCart(); ?>

						<form action="details.php?add_cart=<?php echo $pro_id;?>" method="post" class="form-horizontal">
							<div class="form-group">  <!--form-group starts-->
								<label class="col-md-5 control-label">Product Quantity</label>
								<div class="col-md-7">  <!--col-md-7 starts-->
									<select name="product_qty" class="form-control">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>									
								</div>	<!--col-md-7 ends-->							
							</div>   <!--form-group ends-->

							<div class="form-group">
								<label class="col-md-5 control-label">Product Size</label>	
								<div class="col-md-7">
									<select name="product_size" class="form-control">
										<option value="">Select a Size</option>
										<option value="S">Small</option>
										<option value="M">Medium</option>
										<option value="XL">Large</option>
										<option value="XXL">Extra Large</option>
									</select>
								</div>							
							</div>

							<p class="price"><?php echo 'INR'.' '.$p_price;?></p>
							<p class="text-center buttons">
								<button class="btn btn-primary" type="submit">
									<i class="fa fa-shopping-cart"> Add to Cart</i>
								</button>
							</p>

						</form>						
					</div>    <!--box ends-->
					
					<div class="col-xs-4">
					<a href="#" class="thumb">
						<img src="admin/product_images/insert_images/<?php echo $p_img1;?>" class="img-responsive">
					</a>
					</div>

					<div class="col-xs-4">
					<a href="#" class="thumb">
						<img src="admin/product_images/insert_images/<?php echo $p_img2;?>" class="img-responsive">
					</a>
					</div>

					<div class="col-xs-4">
					<a href="#" class="thumb">
						<img src="admin/product_images/insert_images/<?php echo $p_img3;?>" class="img-responsive">
					</a>
					</div>					
				</div>

			</div>	<!--class row and id productmain ends-->	

			<div class="box" id="details">  <!--class box and id details starts-->
				<h4>Product Details</h4>
				<p><?php echo $p_desc;?></p>	
				<h4>size</h4>
				<ul>
					<li>Small</li>
					<li>Medium</li>
					<li>Large</li>
					<li>Extra Large</li>
				</ul>							
			</div>   <!--class box and id details ends-->

			<div id="row" class="same-height-row">    <!--related images block starts-->
				<div class="col-md-3 col-sm-6">       <!--col-md-3 col-sm-6 starts-->
					<div class="box same-height headline">  <!--box same-height headline starts-->
						<h3 class="text-center">Customer also liked these products</h3>
					</div>    <!--box same-height headline ends-->
				</div>  <!--col-md-3 col-sm-6 ends-->
				
				<!-- <div class="center-responsive col-md-3">  
					<div class="product same-height">
						<a href="">
							<img src="admin/product_images/product7.jpg" class="img-responsive">
						</a>
						<div class="text">
							<h3><a href="details.php">Mardaz earphones pair of two.</a></h3>						
							<p class="price">INR 550</p>
						</div>
					</div>
				</div>     -->
				
				<?php
					$get_product = "SELECT * FROM products ORDER BY product_id LIMIT 0, 3";
					$result = mysqli_query($conn, $get_product) or die("get_product query failed.");
					if(mysqli_num_rows($result) > 0){
						while($row = mysqli_fetch_assoc($result)){
							$pro_id = $row['product_id'];
							$product_title = $row['product_title'];
							$product_price = $row['product_price'];
							$product_img1 = $row['product_img1'];

							echo "<div class='col-md-3 col-sm-6 center-responsive'>
							<div class='product same-height'>
								<a href='details.php?pro_id=$pro_id'>
									<img src='admin/product_images/insert_images/$product_img1' class='img-responsive'>
								</a>
								<div class='text'>
									<h3><a href='details.php?pro_id=$pro_id'>$product_title</a></h3>
									<p class='price'>INR $product_price</p>
								</div>
							</div>							
						</div>";

						}
					}
				?>
				

			</div>   <!--related images block ends-->

		</div>  <!--col-md-9 ends-->


	</div>   <!--container ends-->
</div>  <!--content ends-->



<?php include('includes/footer.php');?>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>