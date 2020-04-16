<?php
    $conn = mysqli_connect("localhost","root","","onlineshop");

    function getPro(){
        global $conn;
        $get_all_products = "SELECT * FROM products ORDER BY 1 DESC LIMIT 0, 6";
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
?>