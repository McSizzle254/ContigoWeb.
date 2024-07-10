<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- css file -->
<link rel="stylesheet" href="../style.css">
</head>
<body>
<!-- navbar -->
<div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar-expand-lg navbar-dark ">
        <div class="container-fluid">
            <img src="../Images/Contigo logo.png" alt="" class="logo">
            <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="" class="nav-link">Welcome Guest</a>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>

    <!-- second child -->
    <div class="bg-secondary">
        <h3 class="text-center p-2">Manage Details</h3>
    </div>

    <!-- third child -->
    <div class="row">
        <div class="col-md-12 bg-light p-1 d-flex align-items-center">
            <div class="p-3">
                <a href="#"><img src="../Images/True Denim.png" alt="" class="admin_image" ></a>
                <p class="text-dark text-center">Admin Name</p>
            </div>
            <div class="button text-center">
                <buton class="my-3"><a href="insert_product.php" class="btn btn-dark text-light my-1">Insert Products</a></buton>
                <buton><a href="" class="btn btn-dark text-light my-1">View Products</a></buton>
                <buton><a href="index.php?insert_categories" class="btn btn-dark text-light  my-1">Insert Categories</a></buton>
                <buton><a href="" class="btn btn-dark text-light my-1">View Categories</a></buton>
                <buton><a href="index.php?insert_brands" class="btn btn-dark text-light my-1">Insert Brands</a></buton>
                <buton><a href="" class="btn btn-dark text-light my-1">View Brands</a></buton>
                <buton><a href="" class="btn btn-dark text-light my-1">All Orders</a></buton>
                <buton><a href="" class="btn btn-dark text-light my-1">All Payments</a></buton>
                <buton><a href="" class="btn btn-dark text-light my-1">List Users</a></buton>
                <buton><a href="" class="btn btn-dark text-light my-1">Logout</a></buton>
            </div>
        </div>
    </div>
    
</div>
<!-- fourth child -->
<div class="container my-5 ">
    <?php 
    if(isset($_GET["insert_categories"]))
    {
        include("insert_categories.php");
    }
    ?>
    
    <?php 
    if(isset($_GET["insert_brands"]))
    {
        include("insert_brands.php");
    }
    ?>
</div>


<footer class="container-fluid fixed-bottom bg-info p-0  text-center">
<div>
        <p>All rights reserved © -Designed by Ben M. Opot- 2023</p>
    </div>
</footer>

 <!-- bootstrap js link    -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>