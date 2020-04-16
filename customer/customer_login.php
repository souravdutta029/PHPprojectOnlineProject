<div class="box">
	
	<div class="box-header">
		
		<center>
			
			<h2>Login</h2>
			<p class="lead">If Already Our Customer</p>

		</center>

	</div>

	<form action="checkout.php" method="post">

		<div class="form-group">
			<label for="">Email</label>
			<input type="email" name="c_email" class="form-control" required="">
		</div>

		<div class="form-group">
			<label for="">Password</label>
			<input type="password" name="c_password" class="form-control" required="">
		</div>

		<div class="text-center">
			<button type="submit" name="login" value="Login" class="btn btn-primary btn-lg">
				<i class="fa fa-sign-in"></i> Log In
				
			</button>
		</div>
		
	</form>
	<br>
	<br>
	<center>
		<a href="customer_registration.php">
			<small>New ? Register Now</small>
		</a>
	</center>

</div>

<?php

	if(isset($_POST['login'])){
		$customer_email = mysqli_real_escape_string($conn, $_POST['c_email']);
		$customer_password = mysqli_real_escape_string($conn, md5($_POST['c_password']));

		$select_customer = "SELECT * FROM customer WHERE customer_email = '$customer_email' AND 
							customer_password = '$customer_password'";

		$run_select = mysqli_query($conn, $select_customer) or die("QuErY Failed.");
		$check_customer = mysqli_num_rows($run_select);

		$get_ip = getUserIp();
		$select_cart = "SELECT * FROM cart WHERE ip_address = '$get_ip'";
		$run_cart = mysqli_query($conn, $select_cart) or die("QueRY failed");
		$check_cart = mysqli_num_rows($run_cart);

		if($check_customer == 0){
			echo "<script> alert('Password/Email Not Matched.')</script>";
			exit();
		}

		if($check_customer == 1 AND $check_cart == 0){
			$_SESSION['customer_email'] = $customer_email;
			echo "<script> alert('Login Successfull')</script>";
			echo "<script> window.open('customer/my_account.php', '_self')</script>";
		}else{
			$_SESSION['customer_email'] = $customer_email;
			echo "<script> alert('Login Successfull')</script>";
			echo "<script> window.open('checkout.php', '_self')</script>";
		}

	}

?>