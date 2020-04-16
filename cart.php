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
						<li class="active">
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
				<li>Cart</li>
			</ul>
		</div>   <!--col-mdt7 ends-->

		<div class="col-md-9" id="cart"> <!--class="col-md-9" id="cart" starts-->
			<div class="box">
				<form action="cart.php" method="post" enctype="multipart/form-data">
					<h1>Shopping Cart</h1>
					<?php
						$ip_add = getUserIp();
						$select_cart = "SELECT * FROM cart WHERE ip_address = '$ip_add'";
						$run_cart = mysqli_query($conn, $select_cart) or die("query failed");
						$count = mysqli_num_rows($run_cart);
					?>
					<p class="text-muted">Currently you have <?php echo $count; ?> item(s) in your cart</p>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th colspan="2">Product</th>
									<th>Quantity</th>
									<th>Unit Price</th>
									<th>Size</th>
									<th colspan="1">Delete</th>
									<th colspan="1">Sub Total</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if($count > 0){
										$total = 0;
										while($row_cart = mysqli_fetch_assoc($run_cart)){
											$pro_id = $row_cart['cart_id'];
											$product_qty = $row_cart['qty'];
											$product_size = $row_cart['size'];

											$get_product ="SELECT * FROM products WHERE product_id = '$pro_id'";
											$run_get_product = mysqli_query($conn, $get_product) or die("product query failed.");

											
											while($row_get_product = mysqli_fetch_assoc($run_get_product)){

												$product_title = $row_get_product['product_title'];
												$product_img1 = $row_get_product['product_img1'];
												$product_price = $row_get_product['product_price'];
												$product_title = $row_get_product['product_title'];
												$sub_total = $row_get_product['product_price'] * $product_qty;
												$total = $total + $sub_total;


								?>
								<tr>
									<td><img src="admin/product_images/insert_images/<?php echo $product_img1; ?>"></td>
									<td><?php echo $product_title; ?></td>
									<td><?php echo $product_qty; ?></td>
									<td>INR <?php echo $product_price; ?></td>
									<td><?php echo $product_size; ?></td>
									<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
									<td>INR <?php echo $sub_total; ?></td>
								</tr>
								<?php

										}


									}
								}

								?>
							</tbody>
							<tfoot>
								<tr>
									<th colspan="6">Total</th>
									<th colspan="1">INR <?php echo $total; ?></th>
								</tr>
							</tfoot>							
						</table>
					</div>
					<div class="box-footer">
						<div class="pull-left">
							<a href="index.php" class="btn btn-default">
								<i class="fa fa-chevron-left"></i> Continue Shopping
							</a>							
						</div>
						<div class="pull-right">
							<button class="btn btn-default" type="submit" name="update" value="Update Cart"> 
								<i class="fa fa-refresh"> Update Cart</i>							
							</button>
							<a href="checkout.php" class="btn btn-primary">
								Proceed to checkout <i class="fa fa-chevron-right"></i>
							</a>							
						</div>						
					</div>
				</form>				
			</div>
			
			<?php
			function updateCart(){
				global $conn;
				if(isset($_POST['update'])){
					foreach ($_POST['remove'] as $remove_id) {
						$delete_product = "DELETE FROM cart WHERE cart_id = '$remove_id'";
						$run_delete = mysqli_query($conn, $delete_product) or die("Delete product query failed.");
						

						if($run_delete){
							
							echo "<script> window.open('cart.php', '_self')</script>";
						}
					}
				}
			}

			echo @$up_cart = updateCart();
			?>
			
			<div id="row" class="same-height-row">    <!--related images block starts-->
				<div class="col-md-3 col-sm-6">       <!--col-md-3 col-sm-6 starts-->
					<div class="box same-height headline">  <!--box same-height headline starts-->
						<h3 class="text-center">Customer also liked these products</h3>
					</div>    <!--box same-height headline ends-->
				</div>  <!--col-md-3 col-sm-6 ends-->
				<div class="center-responsive col-md-3">   <!--center-responsive col-md-3 starts-->
					<div class="product same-height">
						<a href="">
							<img src="admin/product_images/product7.jpg" class="img-responsive">
						</a>
						<div class="text">
							<h3><a href="details.php">Mardaz earphones pair of two.</a></h3>						
							<p class="price">INR 550</p>
						</div>
					</div>
				</div>    <!--center-responsive col-md-3 ends-->

				<div class="center-responsive col-md-3">   <!--center-responsive col-md-3 starts-->
					<div class="product same-height">
						<a href="">
							<img src="admin/product_images/product8.jpg" class="img-responsive">
						</a>
						<div class="text">
							<h3><a href="details.php">Mardaz earphones pair of two.</a></h3>						
							<p class="price">INR 550</p>
						</div>
					</div>
				</div>    <!--center-responsive col-md-3 ends-->

				<div class="center-responsive col-md-3">   <!--center-responsive col-md-3 starts-->
					<div class="product same-height">
						<a href="">
							<img src="admin/product_images/product9.jpg" class="img-responsive">
						</a>
						<div class="text">
							<h3><a href="details.php">Mardaz earphones pair of two.</a></h3>						
							<p class="price">INR 550</p>
						</div>
					</div>
				</div>    <!--center-responsive col-md-3 ends-->

			</div>   <!--related images block ends-->		
		</div>  <!--class="col-md-9" id="cart" ends-->

	<div class="col-md-3">  <!--class="col-md-3" starts-->
		<div class="box" id="order-summary">
			<div class="box-header">
				<h3>Order Summary</h3>				
			</div>	
			<p class="text-muted">
				Shipping and Additional costs are calculated based on the values you have entered.
			</p>
			<div class="table-responsive">
				<table class="table">
					<tbody>
						<tr>
							<td>Order Sub total</td>
							<th>INR <?php echo $total; ?></th>
						</tr>
						<tr>
							<td>Shipping and Handling Charges</td>
							<td>INR 0</td>
						</tr>
						<tr>
							<td>Tax</td>
							<td>INR 0</td>
						</tr>
						<tr class="total">
							<td>Total</td>
							<td>INR <?php echo $total; ?></td>
						</tr>
					</tbody>
			 	</table>	
			</div>	
		</div>
	</div>  <!--class="col-md-3" ends-->



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