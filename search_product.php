<!-- connection file -->
<?php
include("./includes/connect.php");
include("./functions/common_function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contigo Appaerl. Co website using PHP and MySQL</title>
<!-- bootstrap CSS link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<!-- font awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<!-- css file -->
<link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid p-0">
    <img src="./Images/Contigo logo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
            <?php
            cart_items();
            ?>
            </sup></i></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Total Price: Ksh <?php total_cart_price(); ?> </a>
        </li>
    </ul>
    <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
        <input type="submit" value="search" class="btn btn-outline_secondary" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<!-- calling cart function -->
<?php
cart();
?>

<!-- second child -->
<nav class="navbar-expand-lg navbar-dark  bg-secondary">
    <ul class="navbar-nav margin-auto">
    <li class="nav-item p-1">
          <a class="nav-link" href="#">Welcome to Contigo: </a>
        </li>
        <li class="nav-item p-1 ">
          <a class="nav-link" href="#"> Login</a>
        </li>
    </ul>
</nav>

<!-- third child -->
<div class="bg-light">
    <h3 class="text-center">Apparel Store</h3>
    <p class="text-center">Your one-stop shop for Kenyan made apparel.</p>
</div>

<!-- fourth child -->
<div class="row px-1">
    <div class="col-md-10">
        <!-- Products -->
<div class="row">

<!-- fetching products -->
<?php
get_unique_brands();
search_product();
get_unique_categories();
  ?>
    <!-- row end -->
</div>
<!-- col end -->
    </div>


        <!-- sidenav -->
    <div class="col-md-2 bg-secondary p-0">
        <!-- brands to be desplayed -->
<ul class="navbar-nav me-auto text-center">
<li class="nav-item bg-info">
    <a href="#" class="nav-link text-light"><h4>Brands</h4></a>
</li>

<!-- fetching brands -->
<?php
getbrands();
?>

</ul>
<!-- categories to be desplayed -->
<ul class="navbar-nav me-auto text-center">
<li class="nav-item bg-info">
    <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
</li>

<!-- fetching categories -->
<?php
getcategories();
?>

</ul>
    </div>
    
</div>

<!-- last child -->
<!-- Include footer -->
<?php
include("./includes/footer.php");
?>
</div>

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>