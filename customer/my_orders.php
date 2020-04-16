<div class="box">
<center>
	<h1>My Orders</h1>
	<p>If you have any queries, feel free to <a href="../contact.php">contact us</a>. Our Customer execuitives are working 24x7 to help our trusted customers.</p>
</center>
<hr>
<div class="table-responsive">
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>Sr.No</th>
				<th>Due Amount</th>
				<th>Invoice Number</th>
				<th>Quantity</th>
				<th>Size</th>
				<th>Order Date</th>
				<th>Paid/Unpaid</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php
			
				$customer_session = $_SESSION['customer_email'];
				// get the customer with the session email
				$get_customer = "SELECT * FROM customer WHERE customer_email = '$customer_session'";
				$run_get_customer = mysqli_query($conn, $get_customer) or die("get_customer query failed");
				$row_get_customer = mysqli_fetch_assoc($run_get_customer);
				// take the customer id
				$customer_id = $row_get_customer['customer_id'];

				// get the orders from the customer order table using the customer id
				$get_order = "SELECT * FROM customer_order WHERE customer_id = '$customer_id'";
				$run_get_order = mysqli_query($conn, $get_order) or die ("get_order query failed.");
				$i = 0;
				while($row_get_order = mysqli_fetch_assoc($run_get_order)){
					// Now take the required fields
					$order_id = $row_get_order['order_id'];
					$order_due_amount = $row_get_order['due_amount'];
					$order_invoice_no = $row_get_order['invoice_no'];
					$order_qty = $row_get_order['qty'];
					$order_size = $row_get_order['size'];
					$order_date = substr($row_get_order['order_date'], 0,11);
					$order_status = $row_get_order['order_status'];
					$i++;

					if($order_status == 'pending'){
						$order_status = 'Unpaid';
					}else{
						$order_status = 'Paid';
					}
				
				
			
			?>
			<tr>
				<td><?php echo $i;?></td>
				<td>INR <?php echo $order_due_amount;?></td>
				<td><?php echo $order_invoice_no;?></td>
				<td><?php echo $order_qty;?></td>
				<td><?php echo $order_size;?></td>
				<td><?php echo $order_date;?></td>
				<td><?php echo $order_status;?></td>
				<td><a href="confirm.php?order_id=<?php echo $order_id;?>" class="btn btn-primary btn-sm">Confirm If Paid</a></td>
			</tr>
			<?php
				}
			?>
		</tbody>		
	</table>	
</div>
</div>