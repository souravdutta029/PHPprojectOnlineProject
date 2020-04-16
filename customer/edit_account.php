
<?php
	// session is already started in my_account.php page
	$customer_session = $_SESSION['customer_email'];
	$get_customer = "SELECT * FROM customer WHERE customer_email = '$customer_session'";
	$run = mysqli_query($conn, $get_customer) or die("get_customer query failed.");
	$row_cust = mysqli_fetch_assoc($run);

	$customer_id = $row_cust['customer_id'];
	$customer_name = $row_cust['customer_name'];
	$customer_email = $row_cust['customer_email'];
	$customer_country = $row_cust['customer_country'];
	$customer_city = $row_cust['customer_city'];
	$customer_number = $row_cust['customer_number'];
	$customer_address = $row_cust['customer_address'];
	$customer_image = $row_cust['customer_image'];
?>

<div class="box">
	<center>
	<h1>Edit Your Account</h1>
	</center>
	<form action="my_account.php?edit_act" method="post", enctype="multipart/form-data">
	<div class="form-group">
		<label for="">Customer Name</label>
		<input type="text" name="c_name" class="form-control" required="" value="<?php echo $customer_name;?>">
	</div>

	<div class="form-group">
		<label for="">Customer Email</label>
		<input type="email" name="c_email" class="form-control" required="" value="<?php echo $customer_email;?>">
	</div>

	<div class="form-group">
		<label for="">Country</label>
		<input type="text" name="c_country" class="form-control" required="" value="<?php echo $customer_country;?>">
	</div>

	<div class="form-group">
		<label for="">City</label>
		<input type="text" name="c_city" class="form-control" required="" value="<?php echo $customer_city;?>">
	</div>

	<div class="form-group">
		<label for="">Contact Number</label>
		<input type="text" name="c_number" class="form-control" required="" value="<?php echo $customer_number;?>">
	</div>

	<div class="form-group">
		<label for="">Customer Address</label>
		<input type="text" name="c_address" class="form-control" required="" value="<?php echo $customer_address;?>">
	</div>

	<div class="form-group">
		<label for="">Customer Image</label>
		<input type="file" name="c_image" class="form-control" required="">
		<img src="customer_images/<?php echo $customer_image;?>" class="img-responsive" height="100" width="100">
	</div>	

	<div class="text-center">
		<button class="btn btn-primary" name="update" type="submit">
			Update			
		</button>
	</div>
	</form>
<?php

if(isset($_POST['update'])){

	$update_id = $customer_id;
	$c_name = $_POST['c_name'];
	$c_email = $_POST['c_email'];
	$c_country = $_POST['c_country'];
	$c_city = $_POST['c_city'];
	$c_number = $_POST['c_number'];
	$c_address = $_POST['c_address'];
	$c_image = $_FILES['c_image']['name'];
	$c_image_tmp = $_FILES['c_image']['tmp_name'];

	move_uploaded_file($c_image_tmp, "customer_images/$c_image");

	$update_cust = "UPDATE customer SET customer_name = '$c_name', customer_email = '$c_email',
	customer_country = '$c_country', customer_city = '$c_city', customer_number = '$c_number',
	customer_address = '$c_address', customer_image = '$c_image' WHERE customer_id = '$update_id'";

	$run_update_cust = mysqli_query($conn, $update_cust) or die("Update Customer Query Failed.");

	if($run_update_cust){

		echo "<script>alert('Your Account Updated Successfully')</script>";
		echo "<script>window.open('my_account.php?edit_act','_self')</script>";
	}
}

?>


</div>