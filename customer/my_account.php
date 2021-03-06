<?php
	session_start();
	if(!isset($_SESSION['customer_email'])){
		echo "<script>window.open('../checkout.php','_self')</script>";
	}else{
	include ('includes/config.php');
	include ('../functions/functions.php');
	
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
				<!-- <a href="#" class="btn btn-success btn-sm">Wlecome Guest</a> -->
				<?php
				
				dispName();

				?>
				<a href="#">Shopping Cart Total Price: INR <?php totalPrice(); ?>, Total <?php echo itemCount();?> Item(s) In Cart</a>
				
			</div> <!--col-md-6 offer ends -->
			<div class="col-md-6">
				<ul class="menu">
					<!-- <li><a href="../customer_registration.php">Register</a></li> -->
					<?php
						
							if(isset($_SESSION['customer_email'])){
								
							}else{
								echo "<li><a href='../customer_registration.php'>Register</a></li>";
							}
						
						?>
					<!-- <li><a href="my_account.php">My Account</a></li> -->
					<li>
						<?php

						if(!isset($_SESSION['customer_email'])){
							echo "<a href='checkout.php'>My Account</a>";
						}else{
							echo "<a href='my_account.php?my_orders'>My Account</a>";
						}

					
					?>
					</li>
					<li><a href="../cart.php">Goto Cart</a></li>
					<!-- <li><a href="../login.php">Login</a></li> -->
					<?php

					if(!isset($_SESSION['customer_email'])){
						echo "<li><a href='checkout.php'>Login</a></li>";
					}else{
						echo "<li><a href='../logout.php'>Logout</a></li>";
					}

					?>
					
				</ul>
				
			</div>
		</div> <!--container ends -->
	</div> <!--top bar ends -->

	<div class="navbar navbar-default" id="navbar"> <!--navbar navbar-default starts -->
		<div class="container">  <!--container starts -->
			<div class="navbar-header"> <!--navbar header starts -->
				<a class = "navbar-brand home" href="../index.php">
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
							<a href="../index.php">Home</a>
						</li>
						<li>
							<a href="../shop.php">Shop</a>
						</li>
						<li class="active">
						<?php

							if(!isset($_SESSION['customer_email'])){
								echo "<a href='checkout.php'>My Account</a>";
							}else{
								echo "<a href='my_account.php?my_orders'>My Account</a>";
							}

					
						?>
						</li>
						<li>
							<a href="../cart.php">Shopping Cart</a>
						</li>
						
						<li>
							<a href="../contact.php">Contact US</a>
						</li>
					</ul>
				</div> <!--padding-nav ends -->
				<a href="../cart.php" class="btn btn-primary navbar-btn right">
					<i class="fa fa-shopping-cart"></i>
					<span><?php echo itemCount();?> Item(s) In Cart</span>
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
				<li>My Account</li>
			</ul>
		</div>   <!--col-mdt7 ends-->

		<div class="col-md-3"> <!--col-md-3 starts-->
			<?php include ('includes/sidebar.php');?>
		</div>  <!--col-md-3 ends-->

		<div class="col-md-9">
			<!--including orders.php page starts-->
			<?php
				if(isset($_GET['my_orders'])){
				include 'my_orders.php';
			}
			?>
			<!--including orders.php page ends-->	

			<!--including pay_offline.php page starts-->
			<?php
				if(isset($_GET['pay_offline'])){
				include 'pay_offline.php';
			}
			?>
			<!--including pay_offline.php page ends-->

			<!--including edit_account.php page starts-->
			<?php
				if(isset($_GET['edit_act'])){
				include 'edit_account.php';
			}
			?>
			<!--including edit_account.php page ends-->	

			<!--including change_pass.php page starts-->
			<?php
				if(isset($_GET['change_pass'])){
				include 'change_password.php';
			}
			?>
			<!--including change_pass.php page ends-->

			<!--including delete_account.php page starts-->
			<?php
				if(isset($_GET['delete_act'])){
				include 'delete_account.php';
			}
			?>
			<!--including delete_account.php page ends-->	
			
			<!--including logout.php page starts-->
			<?php
				if(isset($_GET['logout'])){
				include ('logout.php');
			}
			?>
			<!--including logout.php page ends-->	

		</div>





</div>   <!--container ends-->
</div>  <!--content ends-->



<?php include('includes/footer.php');?>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php
	}
?>