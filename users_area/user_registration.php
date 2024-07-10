<?php
include("../includes/connect.php");
include("../functions/common_function.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>

<!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <div class="container-fluid">
        <h2 class="text-center my-3">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="lg-12 col-xl-6">
                <form action="" method="post">
                    <!-- username field -->
                    <div class="form-outline mb-4"> 
                        <label for="user_username" class="form-lable">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter Username" autocomplete="off" required="required" name="user_username">
                    </div>
                    <!-- Email field -->
                    <div class="form-outline mb-4"> 
                        <label for="user_email" class="form-lable">Email</label>
                        <input type="text" id="user_email" class="form-control" placeholder="Enter Email Address" autocomplete="off" required="required" name="user_email">
                    </div>
                    <!-- password field -->
                    <div class="form-outline mb-4"> 
                        <label for="user_password" class="form-lable">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter password" autocomplete="off" required="required" name="user_password">
                    </div>
                    <!-- confirm password field -->
                    <div class="form-outline mb-4"> 
                        <label for="conf_user_password" class="form-lable">Password</label>
                        <input type="password" id="conf_user_password" class="form-control" placeholder="confirm password" autocomplete="off" required="required" name="conf_user_password">
                    </div>
                    <!-- mobile field -->
                    <div class="form-outline mb-4"> 
                        <label for="user_mobile" class="form-lable">Phone Number</label>
                        <input type="text" id="user_mobile" class="form-control" placeholder="Enter Phone Number" autocomplete="off" required="required" name="user_mobile">
                    </div>
                    <!-- register button -->
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class='btn btn-secondary' name="user_register">
                        <p class="mt-2 pt-1 mb-0"> Already have an account? <a href="user_login.php" >Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- php code -->

<?php
if(isset($_POST['user_register'])){
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_mobile = $_POST['user_mobile'];
    $user_ip = getIPAddress();

    // select query
    $select_query = "SELECT * from user_table where username = '$user_username'";
    $result = mysqli_query($con,$select_query);
    $rows_count = mysqli_num_rows($result);
if ( $rows_count > 0 ) {
    echo "<script>alert('Username already taken')</script>";}
    elseif($user_password!=$conf_user_password) {
        echo "<script>alert('Passwords Don\\'t match')</script>";}
    else {
    // insert query
        $insert_query = "INSERT into `user_table` (username,user_email,user_password,user_ip,user_mobile) values ('$user_username','$user_email','$hash_password','$user_ip','$user_mobile')";
        $sql_execute = mysqli_query($con,$insert_query);
        if ($sql_execute) {
        echo "<script>alert('Data inserted succesfully')</script>";
    }
        else{
            die(mysqli_error($con));
        }
    }
    // select cart items
    $select_cart_items = "SELECT * from `cart_details` where ip_address ='$user_ip'";
    $result_cart = mysqli_query($con,$select_cart_items);
    $rows_count = mysqli_num_rows($result_cart);
    if ( $rows_count > 0 ) {
        $_SESSION['username'] = $user_username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }else {
            echo "<script>window.open('../index.php','_self')</script>";
        }

}

?>