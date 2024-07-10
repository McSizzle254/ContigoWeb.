<?php
include("../includes/connect.php");
if(isset($_POST["insert_product"])) {
    
    $product_title=$_POST["product_title"];
    $product_description=$_POST["product_description"];
    $product_keywords=$_POST["product_keywords"];
    $product_category=$_POST["product_category"];
    $product_brand=$_POST["product_brand"];
    $product_image1=$_FILES["product_image1"]['name'];
    $product_price=$_POST["product_price"];
    $product_status='true';

    //image tmp name
    $tmp_image1=$_FILES["product_image1"]['tmp_name'];

    //checking empty condition
    if ($product_title=='' || $product_description=='' || $product_keywords=='' || $product_category=='' || $product_brand=='' || $product_price=='' || $product_image1=='' ){
        echo "<script>alert('Fill all fields')</script>";
        exit();   
    }else{
        move_uploaded_file($tmp_image1,"./product_images/$product_image1");

        //insert query
        $insert_product="insert into products (product_title,product_description,product_keywords,category_id,brand_id,product_image1,product_price,date,status)
        values('$product_title','$product_description','$product_keywords','$product_category','$product_brand','$product_image1','$product_price',NOW(),'$product_status')";
        $result_query=mysqli_query($con,$insert_product);
                if($result_query){
            echo "<script>alert('New product inserted successfuly')</script>";
        }
    }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product_Admin Dash</title>
    <!-- bootstrap CSS link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<!-- font awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<!-- css file -->
<link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title "class="form-label">
                    Product Title
                </label>
                <input type="text" name="product_title" class="form-control" id="product_title" placeholder="Enter product title" autocomplete="off" required="required">
            </div>

            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description "class="form-label">
                    Product Description
                </label>
                <input type="text" name="product_description" class="form-control" id="product_description" placeholder="Enter product description" autocomplete="off" required="required">
            </div>
        
    <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords "class="form-label">
                    Product Keywords
                </label>
                <input type="text" name="product_keywords" class="form-control" id="product_keywords" placeholder="Enter product keywords" autocomplete="off" required="required">
            </div>

    <!--categories  -->
    <div class="form-outline mb-4 w-50 m-auto">
        <select name="product_category" id=""  class="form-select">
            <option value="">select category</option>
                <?php
                $select_query= "select * from categories";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $category_title = $row['category_title'];
                    $category_id = $row['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                }
                
            ?>  
            
        </select>
    </div>

        <!--brands  -->
        <div class="form-outline mb-4 w-50 m-auto">
        <select name="product_brand" id=""  class="form-select">
            <option value="">select brand</option>
                <?php
                $select_query= "select * from brands";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $brand_title = $row['brand_title'];
                    $brand_id = $row['brand_id'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                }
                
            ?>  
            
        </select>
    </div>

    <!-- images  -->
        <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1"class="form-label">
                    Product Image 1
                </label>
                <input type="file" name="product_image1" class="form-control" required="required">
            </div>


            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price "class="form-label">
                    Product price
                </label>
                <input type="text" name="product_price" class="form-control" id="product_price" placeholder="Enter product price" autocomplete="off" required="required">
            </div>

            <!-- submit btn -->
    <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-dark mb-3 px-3" id="Insert Product" value="Insert Product">
            </div>
        </form>
    </div>

<!-- bootstrap js link    -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>