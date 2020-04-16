<?php
    $conn = mysqli_connect("localhost","root","","onlineshop");

    
    
    // function to get the ip address STARTS
    function getUserIp(){
        switch(true){
            case (!empty($_SERVER['HTTP_X_REAL_IP'])): 
                return $_SERVER['HTTP_X_REAL_IP'];
                break;
            
            case (!empty($_SERVER['HTTP_CLIENT_IP'])): 
                return $_SERVER['HTTP_CLIENT_IP'];
                break;
            
            case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])): 
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
                break;
            
            default : 
                return $_SERVER['REMOTE_ADDR'];
        }
    }   // function to get the ip address ENDS

    // Function for Add To Cart
    function addCart(){
        global $conn;
        if(isset($_GET['add_cart'])){
            
            $ip_add = getUserIp();
            $p_id = $_GET['add_cart'];
            $product_qty = $_POST['product_qty'];
            $product_size = $_POST['product_size'];

            $check_product = "SELECT * FROM cart WHERE ip_address = '$ip_add' AND cart_id = '$p_id'";
            $run_check = mysqli_query($conn, $check_product) or die("check_product query failed");

            if(mysqli_num_rows($run_check) > 0){
                echo "<script> alert('This Product is already added in cart.')</script>";
                echo "<script>window.open('details.php?pro_id=$p_id', '_self')</script>";
            }else{
                // Inserting
                $insert_query = "INSERT INTO cart(cart_id, ip_address, qty, size)
                                VALUES ('{$p_id}', '{$ip_add}', '{$product_qty}', '{$product_size}')";
                
                $run_insert_query = mysqli_query($conn, $insert_query) or die("Cart insertion query failed.");

                echo "<script> window.open('details.php?pro_id=$p_id', '_self')</script>";
            }

        }
    }


    // cart item count function starts
    function itemCount(){

        global $conn;

        $ip_add = getUserIp();
        $item_count = "SELECT * FROM cart WHERE ip_address = '$ip_add'";
        $run_count = mysqli_query($conn, $item_count) or die("item_count query failed");
        $count = mysqli_num_rows($run_count);

        if($count > 0){
            echo $count;
        }else{
            echo "0";
        }       
    }

    // cart item count function ends.


    // Cart total price function starts.

    function totalPrice(){
        
        global $conn;

         $ip_add = getUserIp();
         $total = 0;

         $select_cart = "SELECT * FROM cart WHERE ip_address = '$ip_add'";
         $run_select_cart = mysqli_query($conn, $select_cart) or die("Total Price Query Failed");
         while($row_select_cart = mysqli_fetch_assoc($run_select_cart)){
            $pro_id = $row_select_cart['cart_id'];
            $product_qty = $row_select_cart['qty'];

            $get_price = "SELECT * FROM products WHERE product_id = '$pro_id'";
            $run_get_price = mysqli_query($conn, $get_price);
            while($row_get_price = mysqli_fetch_assoc($run_get_price)){
                $price_qty = $row_get_price['product_price'] * $product_qty;

                $total = $total + $price_qty;                
            }
         }

         echo $total; 
    }

    // Cart total price function ends.


    // displaying customername at header
    function dispName(){
        if(isset($_SESSION['customer_email'])){
            echo "<a href='#'' class='btn btn-success btn-sm'>Wlecome ".($_SESSION['customer_email'])."</a>";
        }else{
            echo "<a href='#' class='btn btn-success btn-sm'>Wlecome Guest</a>";
        }
    }

    
    
    function getPro(){
        global $conn;
        $get_all_products = "SELECT * FROM products ORDER BY product_id DESC LIMIT 0, 6";
        $run_query = mysqli_query($conn, $get_all_products) or die ("Get all products query failed");
        if(mysqli_num_rows($run_query) > 0){
            while($row_product = mysqli_fetch_assoc($run_query)){
                $product_id = $row_product['product_id'];
                $product_title = $row_product['product_title'];
                $product_price = $row_product['product_price'];
                $product_img1 = $row_product['product_img1'];
                                
                echo    "<div class='col-md-4 col-sm-6'>
                        <div class='product'>
                            <a href='details.php?pro_id=$product_id'>
                                <img src='admin/product_images/insert_images/$product_img1' class='img-responsive'>
                            </a>
                            <div class='text'>
                                <h3><a href='details.php?pro_id=$product_id'>$product_title</a></h3>
                                <p class='price'> INR $product_price</p>
                                <p class='buttons'>
                                    <a href='details.php?pro_id=$product_id' class='btn btn-default'>
                                        View Details
                                    </a>
                                    <a href='details.php?pro_id=$product_id' class='btn btn-primary'>
                                        <i class='fa fa-shopping-cart'></i> add to cart
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>";
            }
        }

    }

// product categories
function getProductCat(){
    global $conn;
    $get_product_cat = "SELECT * FROM product_category";
    $run_query = mysqli_query($conn, $get_product_cat) or die("GET product cat query failed");
    if(mysqli_num_rows($run_query) > 0){
        while($row_product_cat = mysqli_fetch_assoc($run_query)){
            $p_cat_id = $row_product_cat['p_cat_id'];
            $p_cat_title = $row_product_cat['p_cat_title'];
            
            echo "<li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>" ;
        }
    }
}

// categories
function getCategories(){
    global $conn;
    $get_cat = "SELECT * FROM categories";
    $run_query = mysqli_query($conn, $get_cat) or die("GET cat query failed");
    if(mysqli_num_rows($run_query) > 0){
        while($row_product_cat = mysqli_fetch_assoc($run_query)){
            $cat_id = $row_product_cat['cat_id'];
            $cat_title = $row_product_cat['cat_title'];
            
            echo "<li><a href='shop.php?cat_id=$cat_id'>$cat_title</a></li>" ;
        }
    }
}


// product catergory page for shop.php page
function getpCatPro(){
    global $conn;
    if(isset($_GET['p_cat'])){
        $p_cat_id = $_GET['p_cat'];
        
        $get_p_cat = "SELECT * FROM product_category WHERE p_cat_id = $p_cat_id";
        $run_p_cat = mysqli_query($conn, $get_p_cat) or die("pCatPro query failed");
        $row_p_cat = mysqli_fetch_assoc($run_p_cat);

        $p_cat_title = $row_p_cat['p_cat_title'];
        $p_cat_desc = $row_p_cat['p_cat_desc'];

        $get_products = "SELECT * FROM products WHERE p_cat_id = $p_cat_id";
        $run_get_products = mysqli_query($conn, $get_products) or die("get_products query failed.");
        $count = mysqli_num_rows($run_get_products);
        
        if($count == 0){
            echo "<div class='box'>
                    <h1>No Products Found In This Category.</h1>
                 </div>";
        }else{
            echo "<div class='box'>
                    <h1 align='center'>$p_cat_title</h1>
                    <p>$p_cat_desc</p>
                </div>";
        }

        while($row = mysqli_fetch_assoc($run_get_products)){
            
            $product_id = $row['product_id'];
			$product_title = $row['product_title'];
			$product_price = $row['product_price'];
            $product_img1 = $row['product_img1'];
            
            echo "<div class='col-md-4 col-sm-6 center-responsive'>
            <div class='product'>
                <a href='details.php?pro_id=$product_id'>
                <img src='admin/product_images/insert_images/$product_img1' class='img-responsive'>
                </a>
                <div class='text'>
                    <h3><a href='details.php?pro_id=$product_id'>$product_title</a></h3>
                    <p class='price'>INR $product_price</p>
                    <p class='buttons'>
                        <a href='details.php?pro_id=$product_id' class='btn btn-default'> View Details</a>
                        <a href='details.php?pro_id=$product_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add To Cart</a>
                    </p>
                </div>
            </div>
        </div>";
        }
    }        
}

// Getting Products according to categories
function getCatPro(){
    global $conn;
    if(isset($_GET['cat_id'])){
        $cat_id = $_GET['cat_id'];

        $get_cat_pro = "SELECT * FROM categories WHERE cat_id = $cat_id";
        $run_get_cat_pro = mysqli_query($conn, $get_cat_pro) or die("getCatPro query failed");
        $row_get_cat_pro = mysqli_fetch_assoc($run_get_cat_pro);

        $cat_title = $row_get_cat_pro['cat_title'];
        $cat_desc = $row_get_cat_pro['cat_desc'];

        $cat_products = "SELECT * FROM products WHERE cat_id = $cat_id";
        $run_cat_products = mysqli_query($conn, $cat_products) or die("cat_products query failed");
        $count = mysqli_num_rows($run_cat_products);

        if($count == 0){
            echo "<div class='box'>
                    <h3>No Products Found In This Category.</h3>
                </div>";
        }else{
            echo "<div class='box'>
                    <h1 align='center' style='color:#286090;'>$cat_title</h1>
                    <p>$cat_desc</p>
                </div>";
        }

        while($row_get_product = mysqli_fetch_assoc($run_cat_products)){
            
            $pro_id = $row_get_product['product_id'];
			$pro_title = $row_get_product['product_title'];
			$pro_price = $row_get_product['product_price'];
            $pro_img1 = $row_get_product['product_img1'];

            echo "<div class='col-md-4 col-sm-6 center-responsive'>
            <div class='product'>
                <a href='details.php?pro_id=$pro_id'>
                <img src='admin/product_images/insert_images/$pro_img1' class='img-responsive'>
                </a>
                <div class='text'>
                    <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                    <p class='price'>INR $pro_price</p>
                    <p class='buttons'>
                        <a href='details.php?pro_id=$pro_id' class='btn btn-default'> View Details</a>
                        <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add To Cart</a>
                    </p>
                </div>
            </div>
        </div>";
        }

    }
}
?>


