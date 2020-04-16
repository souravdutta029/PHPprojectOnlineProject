<div class="box">

	<?php

		$session_email = $_SESSION['customer_email'];

		$select_customer = "SELECT * FROM customer WHERE customer_email = '$session_email'";
		$run_select_customer = mysqli_query($conn, $select_customer) or die("select_customer query failed.");
		$row_customer = mysqli_fetch_assoc($run_select_customer);
		$customer_id = $row_customer['customer_id'];


	?>

	<h2 class="text-center">Payment Options</h2>
	<p class="lead text-center">
		<a href="order.php?c_id=<?php echo $customer_id; ?>">Pay Offline</a>
	</p>
	<center>
		<p class="lead">
			<a href="#">Pay with paypal
				<img src="images/paypal.png" width='300', height="170" class="img-responsive">
			</a>
		</p>
	</center>
	
</div>