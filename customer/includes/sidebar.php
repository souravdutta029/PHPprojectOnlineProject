<div class="panel panel-default sidebar-menu"> <!--class="panel panel-default sidebar-menu" starts-->
	<div class="panel-heading"> <!--panel-heading starts-->

	<!-- Dynamic customer images code starts -->
		<?php
		
		
		$session_customer = $_SESSION['customer_email'];
		$get_cust = "SELECT * FROM customer WHERE customer_email = '$session_customer'";
		$run_cust = mysqli_query($conn, $get_cust) or die("$get_cust query failed");
		if(mysqli_num_rows($run_cust) > 0){
			while($row_cust = mysqli_fetch_assoc($run_cust)){
				$customer_id = $row_cust['customer_id'];
				$customer_name = $row_cust['customer_name'];
				$customer_image = $row_cust['customer_image'];

			}
		}
		
		?>

	<!-- Dynamic customer images code starts -->

		<center>
			<img src="customer_images/<?php echo $customer_image;?>" class="img-responsive">
		</center>	
		<br>
		<h3 align="center" class="panel-title">Name: <?php echo $customer_name;?></h3>
	</div>	 <!--panel-heading ends-->
	<div class="panel-body">
		<ul class="nav nav-pills nav-stacked">
			<li class="<?php if(isset($_GET['my_orders'])){echo 'active';} ?>">
				<a href="my_account.php?my_orders"><i class="fa fa-list"></i> My Orders</a>
			</li>	
			<li class="<?php if(isset($_GET['pay_offline'])){echo 'active';} ?>">
				<a href="my_account.php?pay_offline"><i class="fa fa-bolt"></i> Pay Offline</a>
			</li>
			
			<li class="<?php if(isset($_GET['edit_act'])){echo 'active';} ?>">
				<a href="my_account.php?edit_act"><i class="fa fa-pencil"></i> Edit Account</a>
			</li>
			<li class="<?php if(isset($_GET['change_pass'])){echo 'active';} ?>">
				<a href="my_account.php?change_pass"><i class="fa fa-user"></i> Change Password</a>
			</li>
			
			<li class="<?php if(isset($_GET['delete_act'])){echo 'active';} ?>">
				<a href="my_account.php?delete_act"><i class="fa fa-trash-o"></i> Delete Account</a>
			</li>
			<li class="<?php if(isset($_GET['logout'])){echo 'active';} ?>">
				<a href="my_account.php?logout"><i class="fa fa-sign-out"></i> Logout</a>
			</li>		
		</ul>		
	</div>
</div>  <!--class="panel panel-default sidebar-menu" ends-->