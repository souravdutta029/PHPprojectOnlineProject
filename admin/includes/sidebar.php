<?php
	if(!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php','_self')</script>";
	}else{
?>

<nav class="navbar navbar-inverse navbar-fixed-top" style="background: black">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
        </button>
        <a href="index.php?dashboard" class="navbar-brand"> Admin Panel</a>
    </div>
    <ul class="nav navbar-right top-nav"> <!--nav navbar-right top-nav starts-->
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-target="">
                <i class="fa fa-user"></i> Hello !! <?php echo $admin_name; ?>
            </a>

            <ul class="dropdown-menu">
        <li>
            <a href="index.php?user_profile?id=<?php echo $admin_id; ?>">
                <i class="fa fa-fw fa-user"></i> Profile
            </a>
        </li>
        <li>
            <a href="index.php?view_product">
                <i class="fa fa-fw fa-envelope"></i> Products
                <span class="badge"><?php echo $count_pro; ?></span>
            </a>
        </li>
        <li>
            <a href="index.php?view_customer">
                <i class="fa fa-fw fa-user"></i> Customer
                <span class="badge"><?php echo $count_cust; ?></span>
            </a>
        </li>
        <li>
            <a href="index.php?pro_cat">
                <i class="fa fa-fw fa-gear"></i> Product Categories
                <span class="badge"><?php echo $count_pro_cat; ?></span>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="logout.php">Logout 
                <i class="fa fa-fw fa-power-off"></i>
            </a>
        </li>
    </ul>
</li>
</ul>   <!--nav navbar-right top-nav ends-->


<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href="index.php?dashboard">
                <i class="fa fa-fw fa-dashboard"></i> Dashboard
            </a>
        </li>

        <li> <!-- product start here-->
            <a href="#" data-toggle="collapse" data-target="#products">
                <i class="fa fa-fw fa-table"></i> Products</a>
                <!-- <i class="fa fa-fw fa-caret-down"></i> -->
        
        	<ul id="products" class="collapse">
	    		<li>
	    			<a href="index.php?insert_product">Insert Product</a>
	    		</li>
	    		<li>
	    			<a href="index.php?view_product">View Product</a>
	    		</li>
        	</ul>
        </li>  <!-- product ends here-->

		<li> <!-- productcategories start here-->
            <a href="#" data-toggle="collapse" data-target="#product_cat">
                <i class="fa fa-fw fa-table"></i> Product Categories</a>
                <!-- <i class="fa fa-fw fa-caret-down"></i> -->
        
        <ul id="product_cat" class="collapse">
    		<li>
    			<a href="index.php?insert_product_cat">Insert Product Categories</a>
    		</li>
    		<li>
    			<a href="index.php?view_product_cat">View Product Categories</a>
    		</li>
        </ul>
        </li>  <!-- product categories ends here-->

        <li> <!-- product start here-->
            <a href="#" data-toggle="collapse" data-target="#category">
                <i class="fa fa-fw fa-table"></i> Categories</a>
                <!-- <i class="fa fa-fw fa-caret-down"></i> -->
        
        <ul id="category" class="collapse">
    		<li>
    			<a href="index.php?insert_categories">Insert Categories</a>
    		</li>
    		<li>
    			<a href="index.php?view_categories">View categories</a>
    		</li>
        </ul>
        </li>  <!-- product ends here-->

        <li> <!-- product start here-->
            <a href="#" data-toggle="collapse" data-target="#slider">
                <i class="fa fa-fw fa-table"></i> Slider</a>
                <!-- <i class="fa fa-fw fa-caret-down"></i> -->
        
        <ul id="slider" class="collapse">
    		<li>
    			<a href="index.php?insert_slider">Insert Slider</a>
    		</li>
    		<li>
    			<a href="index.php?view_slider">View Slider</a>
    		</li>
        </ul>
        </li>  <!-- product ends here-->

        <li>
        	<a href="index.php?view_customer">
        	<i class="fa fa-fw fa-edit"></i> View Customer</a>
        </li>

        <li>
        	<a href="index.php?view_order">
        	<i class="fa fa-fw fa-list"></i> View Order</a>
        </li>

        <li>
        	<a href="index.php?view_payment">
        	<i class="fa fa-fw fa-pencil"></i> View Payments</a>
        </li>

        <li> <!-- product start here-->
            <a href="#" data-toggle="collapse" data-target="#users">
                <i class="fa fa-fw fa-user"></i> Users</a>
                <!-- <i class="fa fa-fw fa-caret-down"></i> -->
        
        <ul id="users" class="collapse">
    		<li>
    			<a href="index.php?insert_user">Insert User</a>
    		</li>
    		<li>
    			<a href="index.php?view_user">View User</a>
    		</li>
    		<li>
    			<a href="index.php?user_profile?id=<?php echo $admin_id; ?>">Edit Profile</a>
    		</li>
        </ul>
        </li>  <!-- product ends here-->

    </ul>
</div>

</nav>

<?php } ?>