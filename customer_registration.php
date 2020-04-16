<?php 
  
	include ('includes/config.php');
	include ('functions/functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Online Shop</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/style.css">
</head>
<body>
  <div id="top">  <!--top bar starts -->
    <div class="container"> <!--container starts -->
      <div class="col-md-6 offer"> <!--col-md-6 offer starts -->
        <?php
          dispName();
        ?>
        <!-- <a href="#" class="btn btn-success btn-sm">Wlecome Guest</a> -->
        <a href="#">Shopping Cart Total Price: INR <?php totalPrice(); ?>, <?php itemCount(); ?> Item(s) In Cart</a>
        
      </div> <!--col-md-6 offer ends -->
      <div class="col-md-6">
        <ul class="menu">
          <!-- <li><a href="../customer_registration.php">Register</a></li> -->
          <?php
						
							if(isset($_SESSION['customer_email'])){
								
							}else{
								echo "<li><a href='customer_registration.php'>Register</a></li>";
							}
						
						?>
          <!-- <li><a href="customer/my_account.php">My Account</a></li> -->
          <li>
            <?php

              if(!isset($_SESSION['customer_email'])){
                echo "<a href='checkout.php'>My Account</a>";
              }else{
                echo "<a href='customer/my_account.php?my_orders'>My Account</a>";
              }

          
          ?>
          </li>
          <li><a href="../cart.php">Goto Cart</a></li>
          <?php

          if(!isset($_SESSION['customer_email'])){
            echo "<li><a href='checkout.php'>Login</a></li>";
          }else{
            echo "<li><a href='logout.php'>Logout</a></li>";
          }

          ?>
          
        </ul>
        
      </div>
    </div> <!--container ends -->
  </div> <!--top bar ends -->

  <div class="navbar navbar-default" id="navbar"> <!--navbar navbar-default starts -->
    <div class="container">  <!--container starts -->
      <div class="navbar-header"> <!--navbar header starts -->
        <a class = "navbar-brand home" href="index.php">
          <img src="images/logo1.png" alt="" class="hidden-xs">
          <img src="images/logoS.png" alt="" class="visible-xs">
        </a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
          <span class="sr-only">Toggle Navigation</span>
          <i class="fa fa-align-justify"></i>
        </button>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
          <span class="sr-only"></span>
          <i class="fa fa-search"></i>
        </button>
      </div> <!--navbar header ends -->
      
      <div class="navbar-collapse collapse" id="navigation"> <!--navbar-collapse collapse starts -->
        <div class="padding-nav">  <!--padding-nav starts -->
          <ul class="nav navbar-nav navbar-left">
            <li class="active">
              <a href="index.php">Home</a>
            </li>
            <li>
              <a href="shop.php">Shop</a>
            </li>
            <li>
            <?php

              if(!isset($_SESSION['customer_email'])){
                echo "<a href='checkout.php'>My Account</a>";
              }else{
                echo "<a href='customer/my_account.php?my_orders'>My Account</a>";
              }

          
           ?>
            </li>
            <li>
              <a href="cart.php">Shopping Cart</a>
            </li>
            
            <li>
              <a href="contact.php">Contact US</a>
            </li>
          </ul>
        </div> <!--padding-nav ends -->
        <a href="cart.php" class="btn btn-primary navbar-btn right">
          <i class="fa fa-shopping-cart"></i>
          <span><?php itemCount(); ?> Item(s) In Cart</span>
        </a>
        <div class="navbar-collapse collapse right"> <!--navbar-collapse collapse-right starts -->
          <button class="btn-navbar btn btn-primary" type="button" data-toggle ="collapse" data-target="#search">
            <span class="sr-only">Toggle Search</span>
            <i class="fa fa-search"></i>
          </button>
          
        </div> <!--navbar-collapse collapse-right ends -->

        <div class="collapse clearfix" id="search">
          
          <form action="result.php" class="navbar-form" method="get">
            <div class="input-group">
              <input type="text" name="user_query" placeholder="Search" class="form-control" required="">
              <span class="input-group-btn">
              <button type="submit" value="Search" name="search" class="btn btn-primary">
                <i class="fa fa-search"></i>
              </button>
              </span>
            </div>
          </form>
        </div>
      
      </div>   <!--navbar-collapse collapse ends -->
    
    </div> <!--container ends -->
  </div> <!--navbar navbar-default ends -->

<div id="content">  <!--content starts-->
  <div class="container">  <!--container starts-->
    <div class="col-mdt7">  <!--col-mdt7 starts-->
      <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Registration</li>
      </ul>
    </div>   <!--col-mdt7 ends-->

    <div class="col-md-3"> <!--col-md-3 starts-->
      <?php include ('includes/sidebar.php');?>
    </div>  <!--col-md-3 ends-->

  <div class="col-md-9"> <!--class="col-md-9" starts-->
  		<div class="box"> <!--box starts-->
  			<div class="box-header"> <!--box-header starts-->
  				<center>
  					<h2>Customer Registration</h2>
  				</center>
  			</div>  <!--box-header starts-->
  			<form action="customer_registration.php" method="post" enctype="multipart/form-data">
  				<div class="form-group">
  					<label for="">Customer Name</label>
  					<input type="text" name="c_name" required="" class="form-control">
  				</div>
  				<div class="form-group">
  					<label for="">Customer Email</label>
  					<input type="email" name="c_email" required="" class="form-control">
  				</div>
  				<div class="form-group">
  					<label for="">Password</label>
  					<input type="password" name="c_password" required="" class="form-control">
  				</div>
          <div class="form-group">
            <label for="">Country</label>
            <input type="text" name="c_country" required="" class="form-control">
          </div>
          <div class="form-group">
            <label for="">City</label>
            <input type="text" name="c_city" required="" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Contact Number</label>
            <input type="text" name="c_contact" required="" class="form-control">
          </div>
  				<div class="form-group">
            <label for="">Address</label>
            <input type="text" name="c_address" required="" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Image</label>
            <input type="file" name="c_image" required="" class="form-control">
          </div>
  				<div class="text-center">
  					<button type="submit" name="submit" class="btn btn-primary">
  						<i class="fa fa-user-md"></i> Register
  					</button>
  				</div>
  			</form>
  		</div>	  <!--box starts-->  	
  </div>   <!--class="col-md-9" starts-->


</div>	  <!-- row ends -->	
</div>	 <!-- container ends -->

<!-- footer starts -->
<?php
	include ('includes/footer.php');
?>
<!-- footer ends -->

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>



<?php

if(isset($_POST['submit'])){

  $c_name = mysqli_real_escape_string($conn, $_POST['c_name']);
  $c_email = mysqli_real_escape_string($conn, $_POST['c_email']);
  $c_password = mysqli_real_escape_string($conn,md5($_POST['c_password']));
  $c_country = mysqli_real_escape_string($conn, $_POST['c_country']);
  $c_city = mysqli_real_escape_string($conn, $_POST['c_city']);
  $c_contact = mysqli_real_escape_string($conn, $_POST['c_contact']);
  $c_address = mysqli_real_escape_string($conn, $_POST['c_address']);

  $c_image = $_FILES['c_image']['name'];
  $tmp = $_FILES['c_image']['tmp_name'];

  $c_ip = getUserIp();

  move_uploaded_file($tmp, "customer/customer_images/$c_image");

  $insert_cus = "INSERT INTO customer(customer_name, customer_email, customer_password, customer_country,  
                 customer_city, customer_number, customer_address, customer_image, customer_ip)
                 VALUES('$c_name', '$c_email', '$c_password', '$c_country', '$c_city', '$c_contact', '$c_address', 
                 '$c_image', '$c_ip')";

  $run_insert = mysqli_query($conn, $insert_cus) or die ("insert cus query failed");

  $select_cart = "SELECT * FROM cart WHERE cart_id = 'c_ip'";
  $run_select = mysqli_query($conn, $select_cart) or die("Second query failed");
  $check_cart = mysqli_num_rows($run_select);
  if($check_cart > 0){
    $_SESSION['customer_email'] = $c_email;
    echo "<script> alert('You have been registerd successfully')</script>";
    echo "<script>window.open('checkout.php', '_self')</script>";
  }else{
    $_SESSION['customer_email'] = $c_email;
    $_SESSION['customer_name'] = $c_name;
    echo "<script> alert('You have been registerd successfully')</script>";
    echo "<script>window.open('index.php', '_self')</script>";
  }

  
  

}

?>