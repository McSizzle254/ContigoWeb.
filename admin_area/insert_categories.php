<?php
include('../includes/connect.php');
if(isset($_POST['insert_category'])){
    $category_title = $_POST['category_title'];

    //select data from database
    $select_query = "Select * from categories where category_title = '$category_title'";
    $result_select = mysqli_query($con,$select_query);
    $number = mysqli_num_rows($result_select);
    if($number > 0){
        echo"<script>alert('This is present inside the database')</script>";
    }else {
    $insert_query = "insert into categories (category_title) values ('$category_title')";
    $result = mysqli_query($con,$insert_query);
    if($result){
        echo"<script>alert('Category Inserted Sucessfuly')</script>";
    }
}
}
?>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="category_title" placeholder="Category" aria-label="Categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="btn btn-dark text-light my-1" name="insert_category" value="Insert Category" >
    </button>
    </div>
</form>