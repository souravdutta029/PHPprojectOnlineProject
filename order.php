<?php 
	include ('includes/config.php');
	include ('functions/functions.php');
?>

<?php
	if(isset($_GET['c_id'])){
		$customer_id = $_GET['c_id'];
	}
		
	$customer_ip = getUserIp();
	$status = "pending";
	$invoice_no = mt_rand();

	$select_cart = "SELECT * FROM cart WHERE ip_address = '$customer_ip'";
	$run_cart = mysqli_query($conn, $select_cart) or die("select_cart query failed.");
	while($row_cart = mysqli_fetch_assoc($run_cart)){
		$product_id = $row_cart['cart_id'];
		$product_qty = $row_cart['qty'];
		$product_size = $row_cart['size'];

		$get_product = "SELECT * FROM products WHERE product_id = '$product_id'";
		$run_product = mysqli_query($conn, $get_product);
		
		while($row_product=mysqli_fetch_assoc($run_product)){
			$sub_total = $row_product['product_price'] * $product_qty;

			$insert_customer_order = "INSERT INTO customer_order(customer_id, product_id ,due_amount, invoice_no, qty, size, order_date, order_status)
			VALUES ('$customer_id', '$product_id' ,'$sub_total', '$invoice_no', '$product_qty', '$product_size', Now(), '$status')";
			
			$run_customer_order = mysqli_query($conn, $insert_customer_order) or die("Query2 Failed");

			// $insert_pending_order = "INSERT INTO pending_order(customer_id, invoice_no, product_id, qty, size, order_status)
			// VALUES ('$customer_id', '$invoice_no', '$product_id', '$product_qty', '$product_size', '$status')";

			// $run_pending_order = mysqli_query($conn, $insert_pending_order) or die("Query3 Failed");

			$delete_cart = "DELETE FROM cart WHERE ip_address = '$customer_ip'";
			$run_delete_cart = mysqli_query($conn, $delete_cart) or die("Delete Query Failed.");

			echo "<script>alert('Your order has been submitted, Thank You!!!')</script>";
			echo "<script>window.open('customer/my_account.php?my_orders', '_self')</script>";
			
		}

	}

	
?>