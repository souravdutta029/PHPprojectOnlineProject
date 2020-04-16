<div id="footer"> <!--footer section starts-->
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6"> <!--col-md-3 col-sm-6 starts -->
				<h4>Pages</h4>
				<ul>
					<li><a href="../cart.php">Shopping Cart</a></li>
					<li><a href="../contact.php">Contact Us</a></li>
					<li><a href="../shop.php">Shop</a></li>
					<li><a href="my_account.php">My Account</a></li>
				</ul>
				<hr>
				<h4>Users Section</h4>
				<ul>
					<li><a href="../checkout.php">Login</a></li>
					<li><a href="../customer_registration.php">Register</a></li>
				</ul>
				<hr class="hidden-md hidden-lg hiddem-sm">	
			</div>  <!--col-md-3 col-sm-6 ends -->

			<div class="col-md-3 col-sm-6"> <!--col-md-3 col-sm-6 starts -->
				<h4>Top Product Categories</h4>
				<ul>
				<?php
						$get_cat = "SELECT * FROM product_category";
						$run_query = mysqli_query($conn, $get_cat) or die("Get cat query failed");
						if(mysqli_num_rows($run_query) > 0){
							while($row_cat = mysqli_fetch_assoc($run_query)){
								$p_cat_id = $row_cat['p_cat_id'];
								$p_cat_title = $row_cat['p_cat_title'];
								echo "<li><a href='../shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>";
							}
						}
					?>
				</ul>
				<hr class="hidden-md hidden-lg">
			</div>   <!--col-md-3 col-sm-6 ends -->

			<div class="col-md-3 col-sm-6"> <!--col-md-3 col-sm-6 starts -->
				<h4>Where to find us</h4>
				<p>
					<strong>shiuliKart.com</strong>
					<br>Kalighat
					<br>Kolkata
					<br>West Bengal
					<br>shiuliKart@gmail.com
					<br>+917980204716
				</p>
				<a href="contact.php">Goto Contact Us page</a>
				<hr class="hidden-md hidden-lg">
			</div>  <!--col-md-3 col-sm-6 ends -->

			<div class="col-md-3 col-sm-6"> <!--col-md-3 col-sm-6 starts -->
				<h4>Get the news</h4>
				<p class="text-muted">
					subscribe here to get news from shiuliKart Kolakta
				</p>
				<form action="" method="post">
					<div class="input-group">
						<input type="text" name="email" class="form-control">
						<span class="input-group-btn">
							<input type="submit" class="btn btn-default" value="Subscribe">
						</span>
					</div>
				</form>
				<hr>
				<h4>Stay in Touch</h4>
				<p class="social">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-google-plus"></i></a>
					<a href="#"><i class="fa fa-envelope"></i></a>
				</p>
			</div>  <!--col-md-3 col-sm-6 ends -->

		</div>
	</div>
</div>      <!--footer section ends-->


 <!--copyright section starts-->

<div id="copyright">
	<div class="container">
		<div class="col-md-6">
			<p class="pull-left">
				&copy; 2020 shiuliKart.com
			</p>
		</div>
		<div class="col-md-6">
			<p class="pull-right">
				Template By: <a href="www.shiuliKart.com">shiuliKart.com</a>
			</p>
		</div>
	</div>
</div>

<!--copyright section ends-->
