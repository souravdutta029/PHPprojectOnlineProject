<?php
	session_start();
	include ('includes/config.php');
	if(!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php','_self')</script>";
	}else{
?>
<?php
	$admin_session = $_SESSION['admin_email'];
	$select_admin = "SELECT * FROM admins WHERE admin_email = '$admin_session'";
	$run_q = mysqli_query($conn, $select_admin) or die("first");
	if(mysqli_num_rows($run_q) > 0){
		$row_admin = mysqli_fetch_assoc($run_q);
		$admin_id = $row_admin['admin_id'];
		$admin_name = $row_admin['admin_name'];
		$admin_email = $row_admin['admin_email'];
		$admin_image = $row_admin['admin_image'];
		$admin_country = $row_admin['admin_country'];
		$admin_job = $row_admin['admin_job'];
		$admin_contact = $row_admin['admin_contact'];
		$admin_about = $row_admin['admin_about'];
	}

	$get_products = "SELECT * FROM products";
	$run_pro = mysqli_query($conn, $get_products) or die("Second");
	$count_pro = mysqli_num_rows($run_pro);

	$get_cust = "SELECT * FROM customer";
	$run_cust = mysqli_query($conn, $get_cust) or die("Third");
	$count_cust = mysqli_num_rows($run_cust);

	$get_pro_cat = "SELECT * FROM product_category";
	$run_cat = mysqli_query($conn, $get_pro_cat) or die("Fourth");
	$count_pro_cat = mysqli_num_rows($run_cat);

	$get_order = "SELECT * FROM customer_order";
	$run_order = mysqli_query($conn, $get_order) or die("Fifth");
	$count_order = mysqli_num_rows($run_order);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Panel</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	
</head>
<body>
<div id="wrapper">
    <?php include('includes/sidebar.php');?>
    <div id="page-wrapper">
        <div  class="container"> 
			<?php
				if(isset($_GET['dashboard'])){
					include 'dashboard.php';
				}

				if(isset($_GET['insert_product'])){
					include 'insert_product.php';
				}
			?>
        </div>
    </div>
</div>



 <!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>   
</body>
</html>
<?php
}
?>