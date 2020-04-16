<?php 
	session_start();
	if(!isset($_SESSION['customer_email'])){
		echo "<script>window.open('../checkout.php','_self')</script>";
	}else{
	include ('includes/config.php');
	include ('../functions/functions.php');

	if(isset($_GET['order_id'])){
		$order_id = $_GET['order_id'];
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
				<a href="#" class="btn btn-success btn-sm">Wlecome <?php dispName();?></a>
				<a href="#">Shopping Cart Total Price: INR <?php totalPrice(); ?>, Total <?php itemCount();?> Items In Cart</a>
				
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
					<li><a href="my_account.php">My Account</a></li>
					<li><a href="../cart.php">Goto Cart</a></li>
					<li><a href="../login.php">Login</a></li>
					
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
							<a href="../index.php">Home</a>
						</li>
						<li>
							<a href="../shop.php">Shop</a>
						</li>
						<li class="active">
							<a href="my_account.php">My Account</a>
						</li>
						<li>
							<a href="../cart.php">Shopping Cart</a>
						</li>
						<li>
							<a href="../about.php">About Us</a>
						</li>
						<li>
							<a href="../services.php">Services</a>
						</li>
						<li>
							<a href="../contact.php">Contact US</a>
						</li>
					</ul>
				</div> <!--padding-nav ends -->
				<a href="cart.php" class="btn btn-primary navbar-btn right">
					<i class="fa fa-shopping-cart"></i>
					<span><?php itemCount();?> Items In Cart</span>
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
			<div class="box">
				<h1 align="center">Please Confirm Your Payment</h1>
				<form action="confirm.php?update_id=<?php echo $order_id;?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Invoice Number</label>
						<input type="text" name="invoice_number" class="form-control" required="">
					</div>

					<div class="form-group">
						<label for="">Amount</label>
						<input type="text" name="amount" class="form-control" required="">
					</div>

					<div class="form-group">
						<label for="">Select Payment Mode</label>
						<select name="payment_mode" class="form-control">
							<option value="Net Banking">Net Banking</option>
							<option value="Paypal">Paypal</option>
							<option value="PayuMoney">PayuMoney</option>
							<option value="Paytm">Paytm</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Transaction Number</label>
						<input type="text" name="trfr_number" class="form-control" required="">
					</div>
					<div class="form-group">
						<label for="">Payment Date</label>
						<input type="date" name="date" class="form-control" required="">
					</div>
					<div class="text-center">
						<button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">
							Confirm Payment
						</button>						
					</div>				
				</form>
				<?php
				
				if(isset($_POST['confirm_payment'])){
					$update_id = $_GET['update_id'];
					$invoice_number = $_POST['invoice_number'];
					$amount = $_POST['amount'];
					$payment_mode = $_POST['payment_mode'];
					$transaction_number = $_POST['trfr_number'];
					$date = $_POST['date'];
					$complete = "complete";

					$insert = "INSERT INTO payments(invoice_id, amount, payment_mode, ref_no, payment_date)
							   VALUES ('$invoice_number', '$amount', '$payment_mode', '$transaction_number', '$date')";
					
					$run_insert = mysqli_query($conn, $insert) or die("insert query failed.");

					$update_q = "UPDATE customer_order SET order_status = '$complete' WHERE order_id = '$update_id'";
					$run_update_q = mysqli_query($conn, $update_q) or die("Update Query Failed.");

					// $update_pen = "UPDATE pending_order SET order_status = '$complete' WHERE order_id = '$update_id'";
					// $run_update_pen = mysqli_query($conn, $update_pen) or die("Update Query Failed.");

					echo "<script>alert('Your order has been received. Thank You.')</script>";
					echo "<script>window.open('my_account.php?my_orders','_self')</script>";
				}
				
				?>
			</div>			
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