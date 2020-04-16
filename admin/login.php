<?php
    session_start();
    include ('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <form action="" class="form-login" method="post">
            <h2 class="form-login-heading">Admin Login</h2>
            <input type="text" class="form-control" name="admin_email" placeholder="Email Address" required>
            <input type="password" class="form-control" name="admin_password" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login"> Log In</button>
            <h4 class="forgot-password">
                <a href="forgot_password.php">Lost your password? Forgot password</a>
            </h4>
        </form>
    </div>

 <!-- Latest compiled JavaScript -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>   
</body>
</html>

<?php
    if(isset($_POST['admin_login'])){
        $admin_email = mysqli_real_escape_string($conn, $_POST['admin_email']);
        $admin_password = mysqli_real_escape_string($conn, $_POST['admin_password']);

        $get_admin = "SELECT * FROM admins WHERE admin_email = '$admin_email' AND admin_password = '$admin_password'";
        $run_admin = mysqli_query($conn, $get_admin) or die ("GET admin Query Failed");
        if(mysqli_num_rows($run_admin) > 0){
            $_SESSION['admin_email'] = $admin_email;
            echo "<script>alert('You are logged in')</script>";
            echo "<script>window.open('index.php?dashboard', '_self')</script>";
        }else{
            echo "<script>alert('email/password incorrect')</script>";
        }
    }
?>