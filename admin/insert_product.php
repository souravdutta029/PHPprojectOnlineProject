<?php
	if(!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php','_self')</script>";
	}else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
    
</head>
<body>
 <div class="row"> <!--row starts-->
     <div class="col-md-12">  <!--col-md-12 starts-->
        <div class="breadcrumb">  <!--breadcrumb starts-->
            <li class="active">
                <i class="fa fa-dashboard"></i>
                Dashboard / Insert Product
            </li>
        </div>  <!--breadcrumb ends-->
     </div>  <!--col-md-12 ends-->
 </div>  <!--row ends-->
 
 <div class="col-lg-3">

 </div>
 
 <div class="row">  <!--row starts-->
     <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">  <!--panel-heading starts-->
                <h3 class="panel-title">
                    <i class="fa fa-money fa-w"></i> Insert Product
                </h3>
            </div>    <!--panel-heading ends-->
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Title</label>
                        <input type="text" name="product_title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Category</label>
                        <select name="product_cat" class="form-control">
                            <option value="">Select a Product category</option>
                            <?php
                                $get_p_cats = "SELECT * FROM product_category";
                                $result_get_p_cats = mysqli_query($conn, $get_p_cats) or die("Query Failed.");
                                if(mysqli_num_rows($result_get_p_cats) > 0){
                                    while($row = mysqli_fetch_assoc($result_get_p_cats)){
                                        $id = $row['p_cat_id'];
                                        $p_cat_title = $row['p_cat_title'];
                                        echo "<option value='$id'>$p_cat_title</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Category</label>
                        <select name="cat" class="form-control">
                            <option value="">Select Category</option>
                            <?php
                                $get_cat = "SELECT * FROM categories";
                                $result_get_cat = mysqli_query($conn, $get_cat) or die("Query Failed");
                                if(mysqli_num_rows($result_get_cat) > 0){
                                    while($row = mysqli_fetch_assoc($result_get_cat)){
                                        $id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];
                                        echo "<option value='$id'>$cat_title</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Image1</label>
                        <input type="file" name="product_img1" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Image2</label>
                        <input type="file" name="product_img2" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Image3</label>
                        <input type="file" name="product_img3" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Product price</label>
                        <input type="text" name="product_price" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Keywords</label>
                        <input type="text" name="product_keywords" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Description</label>
                        <textarea name="product_desc" class="form-control" cols="18" rows="6"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control">
                    </div>
                </form>
            </div>
        </div>
     </div>
 </div>  <!--row ends-->

 <div class="col-lg-3">

 </div>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        $product_title = $_POST['product_title'];
        $product_cat = $_POST['product_cat'];
        $cat = $_POST['cat'];
        $product_price = $_POST['product_price'];
        $product_keywords = $_POST['product_keywords'];
        $product_desc = $_POST['product_desc'];

        // for images
        
        $product_img1 = $_FILES['product_img1']['name'];
        $product_img2 = $_FILES['product_img2']['name'];
        $product_img3 = $_FILES['product_img3']['name'];

        $temp_name1 = $_FILES['product_img1']['tmp_name'];
        $temp_name2 = $_FILES['product_img2']['tmp_name'];
        $temp_name3 = $_FILES['product_img3']['tmp_name'];

        move_uploaded_file($temp_name1, "product_images/insert_images/$product_img1");
        move_uploaded_file($temp_name2, "product_images/insert_images/$product_img2");
        move_uploaded_file($temp_name3, "product_images/insert_images/$product_img3");

        $insert_products = "INSERT INTO products(p_cat_id, cat_id, date, product_title, product_img1, product_img2, product_img3, product_price, product_desc, product_keyword) 
        VALUES ('$product_cat', '$cat', NOW(), '$product_title', '$product_img1', '$product_img2', '$product_img3', '$product_price', '$product_desc', '$product_keywords')";
        // echo $insert_products;
        // die();
        $run_query = mysqli_query($conn, $insert_products);

        if($run_query){
            echo "<script>alert('Product Inserted Successfully')</script>";
            echo "<script>window.open('index.php?view_product')</script>";
        }

    }
?>
<?php } ?>