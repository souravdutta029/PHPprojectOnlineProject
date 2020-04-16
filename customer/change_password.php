<div class="box">
	<center>
		<h3>Change Your Password</h3>
	</center>
	<form action="" method="post">	
	<div class="form-group">
		<label for="">Enter Current Password</label>
		<input type="password" name="old_password" class="form-control">		
	</div>

	<div class="form-group">
		<label for="">Enter New Password</label>
		<input type="password" name="new_password" class="form-control">		
	</div>

	<div class="form-group">
		<label for="">Confirm New Password</label>
		<input type="password" name="cnf_password" class="form-control">		
	</div>

	<div class="text-center">
		<button type="submit" class="btn btn-primary btn-lg" name="submit">
			Update Now
		</button>		
	</div>
	</form>
</div>

<?php
if(isset($_POST['submit'])){
	$customer_session = $_SESSION['customer_email'];
	$old_password = mysqli_real_escape_string($conn, md5($_POST['old_password']));
	$new_password = mysqli_real_escape_string($conn, md5($_POST['new_password']));
	$cnf_password = mysqli_real_escape_string($conn, md5($_POST['cnf_password']));

	$get_cust = "SELECT * FROM customer WHERE customer_email = '$customer_session' AND customer_password = '$old_password'";

	$run_get_cust = mysqli_query($conn, $get_cust) or die("1");
	if(mysqli_num_rows($run_get_cust) == 0){
		echo "<script>alert('Password is not valid. Try again.')</script>";
		exit();
	}
	if($new_password != $cnf_password){
		echo "<script>alert('New Password and Confirm Password not matched.')</script>";
		exit();
	}

	$update_pass = "UPDATE customer SET customer_password = '$new_password' WHERE customer_email = '$customer_session'";

	$run_update_pass =mysqli_query($conn, $update_pass) or die("2");
	echo "<script>alert('Your Password Updated Successfully')</script>";
	echo "<script>window.open('my_account.php?my_orders','_self')</script>";
}
?>