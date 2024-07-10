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
        <h2 class="text-center my-3"> User Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="lg-12 col-xl-6">
                <form action="" method="post">
                    <!-- username field -->
                    <div class="form-outline mb-4"> 
                        <label for="user_username" class="form-lable">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter Username" autocomplete="off" required="required" name="user_username">
                    </div>
                    <!-- password field -->
                    <div class="form-outline mb-4"> 
                        <label for="user_password" class="form-lable">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter password" autocomplete="off" required="required" name="user_password">
                    </div>
                    <!-- login button -->
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class='btn btn-secondary' name="user_login">
                        <p class="mt-2 pt-1 mb-0"> Don't have an account? <a href="user_registration.php" >Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php 
if(isset($_POST['user_login'])){
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query = " SELECT * from `user_table` where username = '$user_username'";
    $result = mysqli_query($con,$select_query);
    $rows_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

// Cart item
$select_query_cart = " SELECT * from `cart_details` where ip_address = '$user_ip'";
$select_cart = mysqli_query($con,$select_query_cart);
$rows_count_cart = mysqli_num_rows($select_cart);

if ($rows_count > 0){
    if(password_verify($user_password,$row_data['user_password'])){
    // echo "<script>alert('Login Successful')</script>";
        if($rows_count == 1 and $rows_count_cart ==0){
        echo "<script>alert('Login Successful')</script>";
        echo "<script>window.open('./profile.php','self')</script>";        
    }else {
        echo "<script>alert('Login Successful')</script>";
        echo "<script>window.open('./payment.php','self')</script>";
    }
    }else{
        echo "<script>alert('Invalid credentials')</script>";    
    }
    
}
else{
    echo "<script>alert('Invalid credentials')</script>";    
}
}
?>