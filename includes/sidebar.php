<div class="panel panel-default sidebar-menu">  <!--panel panel-default sidebar-menu starts-->
	<div class="panel-heading">   <!--panel-heading starts-->
		<h3 class="panel-title">Product Categories</h3>
	</div>    <!--panel-heading ends-->
	<div class="panel-body">   <!--panel-body starts-->
		<ul class="nav nav-pills nav-stacked category-menu">
			<?php
			 getProductCat();
			?>
			<!-- <li><a href="shop.php">Jackets</a></li>
			<li><a href="shop.php">Accessories</a></li>
			<li><a href="shop.php">Shoes</a></li>
			<li><a href="shop.php">Coats</a></li>
			<li><a href="shop.php">T-Shirts</a></li> -->
		</ul>
	</div>  <!--panel-body ends-->
</div>  <!--panel panel-default sidebar-menu ends-->

<div class="panel panel-default sidebar-menu">  <!--panel panel-default sidebar-menu starts-->
	<div class="panel-heading">   <!--panel-heading starts-->
		<h3 class="panel-title">Categories</h3>
	</div>    <!--panel-heading ends-->
	<div class="panel-body">   <!--panel-body starts-->
		<ul class="nav nav-pills nav-stacked category-menu">

		<?php
			 getCategories();
			?>
			<!-- <li><a href="shop.php">Men</a></li>
			<li><a href="shop.php">Women</a></li>
			<li><a href="shop.php">Kids</a></li>
			<li><a href="shop.php">Others</a></li> -->
		</ul>
	</div>  <!--panel-body ends-->
</div>  <!--panel panel-default sidebar-menu ends-->