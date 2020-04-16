<?php
	if(!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php','_self')</script>";
	}else{
?>

<div class="row">  <!--row1 starts-->
	<div class="col-lg-12">
		<h1 class="page-header">Dashboard</h1>
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i>	Dashboard			
			</li>			
		</ol>
	</div>
</div>   <!--row1 ends-->

<div class="row">  <!--row2 starts-->
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-tasks fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $count_pro; ?></div>
						<div>Products</div>
					</div>
				</div>
			</div>
			<a href="index.php?view_product">
			<div class="panel-footer">
				<span class="pull-left">View Details</span>
				<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
				<div class="clearfix"></div>
			</div>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-md-6">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-comments fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $count_cust; ?></div>
						<div>Customers</div>
					</div>
				</div>
			</div>
			<a href="index.php?view_customer">
			<div class="panel-footer">
				<span class="pull-left">View Details</span>
				<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
				<div class="clearfix"></div>
			</div>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-md-6">
		<div class="panel panel-yellow">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-shopping-cart fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $count_pro_cat; ?></div>
						<div>Product Categories</div>
					</div>
				</div>
			</div>
			<a href="index.php?view_product_cat">
			<div class="panel-footer">
				<span class="pull-left">View Details</span>
				<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
				<div class="clearfix"></div>
			</div>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-md-6">
		<div class="panel panel-red">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-support fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $count_order; ?></div>
						<div>Orders</div>
					</div>
				</div>
			</div>
			<a href="index.php?view_order">
			<div class="panel-footer">
				<span class="pull-left">View Details</span>
				<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
				<div class="clearfix"></div>
			</div>
			</a>
		</div>
	</div>

</div>    <!--row2 ends-->

<div class="row"> <!--row 3 starts-->
		<div class="col-lg-8">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-money fa-fw"></i> New Orders
					</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th>Order No:</th>
									<th>Customer Email:</th>
									<th>Invoice No:</th>
									<th>Product id</th>
									<th>Quantity:</th>
									<th>Size:</th>
									<th>Status:</th>
								</tr>
							</thead>
							<tbody>
								<?php
								
									$i = 0;
									$get_oder = "SELECT * FROM customer_order ORDER BY 1 DESC LIMIT 0, 5";
									$run_order = mysqli_query($conn, $get_oder) or die("get order query failed");
									if(mysqli_num_rows($run_order) > 0){
										while($row_order = mysqli_fetch_assoc($run_order)){
											$order_id = $row_order['order_id'];
											$customer_id = $row_order['customer_id'];
											$product_id = $row_order['product_id'];
											$invoice_no = $row_order['invoice_no'];
											$qty = $row_order['qty'];
											$size = $row_order['size'];
											$status = $row_order['order_status'];
											$i++;											
										
								
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td>
										<?php
											$get_customer = "select * from customer where customer_id = '$customer_id'";
											$run_g_cust = mysqli_query($conn, $get_customer) or die("g_cust");
											$row_g_cust = mysqli_fetch_assoc($run_g_cust);
											$customer_email = $row_g_cust['customer_email'];

											echo $customer_email;
										?>
									</td>
									<td><?php echo $invoice_no; ?></td>
									<td><?php echo $product_id; ?></td>
									<td><?php echo $qty; ?></td>
									<td><?php echo $size; ?></td>
									<td><?php echo $status; ?></td>
								</tr>
								<?php
								
										}
									}
								
								?>
							</tbody>
						</table>
					</div>
					<div class="text-right">
						<a href="index.php?view_orders"> View All Orders
							<i class="fa fa-arrow-circle-right"></i>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="panel">
				<div class="panel-body">
					<div class="thumb-info mb-md">
						<img src="admin_images/<?php echo $admin_image; ?>" class="rounded img-responsive" width="220px" height="auto"><br>
						<div class="thumb-info-title">
							<span class="thumb-info-inner">Admin Name: <strong><?php echo $admin_name; ?></strong></span>
							<p><span class="thumb-info-type">Admin Job: <strong><?php echo $admin_job; ?></strong></span></p>
						</div>
					</div>
					<div class="widget-content-expanded">
						<i class="fa fa-user"></i><span> Email: </span> <?php echo $admin_email; ?> <br>
						<i class="fa fa-user"></i><span> Country: </span> <?php echo $admin_country; ?> <br>
						<i class="fa fa-user"></i><span> Contact: </span> <?php echo $admin_contact; ?> <br>
					</div>
					<hr class="dotted short">
					<h5 class="text-muted">About</h5>
					<p>
					<?php echo $admin_about; ?>
					</p>
				</div>
			</div>
		</div>

</div>  <!--row 3 ends-->

</div>
<?php } ?>