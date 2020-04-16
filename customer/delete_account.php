<div class="box">
	<center>
		<h3>Do you really want to delete your account ??</h3>
	
	<form action="" method="post">
		<input type="submit" name="yes" value="Yes, I Want To Delete" class="btn btn-danger">
		<input type="submit" name="no" value="No , I Dont Want" class="btn btn-primary">
	</form>
	</center>
</div>

<?php

	$customer_session = $_SESSION['customer_email'];
	if(isset($_POST['yes'])){

		$delete_query = "DELETE FROM customer WHERE customer_email = '$customer_session'";
		$run_delete_query = mysqli_query($conn, $delete_query) or die("Delete Query Failed.");

		if($run_delete_query){
			session_unset();
			session_destroy();

			echo "<script>alert(Your account has been deleted)</script>";
			echo "<script>window.open('../index.php','_self')</script>";
		}
	}

?>