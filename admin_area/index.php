<?php
include('../connection.php');
// include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asmin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css files -->
    <link rel="stylesheet" href="../style.css">
    <style>
        body{
            overflow-x: hidden;
        }
        .product_img{
            width: 100px;
            object-fit: contain;
        }
    </style>
</head>
<body>

<div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <img src="../images/logo1.webp" class="logo" alt="">
            <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <ul class="navbar-nav">

    <?php
     if(!isset($_SESSION['username'])){
        echo "<script>window.open('./admin_login.php','_self')</script>";
      }else{
        echo "<li class='nav-item'>
        <a class='nav-link active' aria-current='page' href='#'>Welcome ".$_SESSION['username']."</a>
      </li>";
      }
    
    
    ?>
        <li class="nav-item">
            <a href="./logout.php" class="nav-link">Logout</a>
        </li>
    </ul>
    </nav>
        </div>
    </nav>

    <!-- second child -->
    <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
    </div>

    <!-- third child -->
    <div class="row">
        <div class="col-md12 bg-secondary p-1 d-flex align-items-center">
            <div class="px-5">
                <a href=""><img src="" class="admin_image" alt=""></a>
                <p class="text-light text-center">Admin Name</p>
            </div>
            <div class="button text-center mx-3">
                <!-- <button><a href="./insert_product.php" class="nav-link text-light bg-info my-1">Insert City Admin</a></button>
                <button><a href="./index.php?view_products" class="nav-link text-light bg-info my-1">View All City Admin</a></button> -->
                <button><a href="./index.php?insert_city" class="nav-link text-light bg-info my-1">Insert City</a></button>
                <button><a href="./index.php?view_city" class="nav-link text-light bg-info my-1">View city</a></button>
                <button><a href="./index.php?insert_admin" class="nav-link text-light bg-info my-1">Insert City Admin</a></button>
                <button><a href="./index.php?view_admin" class="nav-link text-light bg-info my-1">View All City Admin</a></button>
                <!-- <button><a href="./index.php?list_orders" class="nav-link text-light bg-info my-1">All Orders</a></button>
                <button><a href="./index.php?list_payments" class="nav-link text-light bg-info my-1">All Payments</a></button>
                <button><a href="./index.php?list_users" class="nav-link text-light bg-info my-1">LiSt Users</a></button> -->
                <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
            </div>

        </div>
    </div>
    <!-- forth child -->
    <div class="container my-3">
        <?php
        if (isset($_GET['insert_city'])) {
            include "./insert_city.php";
        }
        if (isset($_GET['insert_admin'])) {
            include "./insert_admin.php";
        }
        // if(isset($_GET['view_products'])){
        //     include('view_products.php');
        // }
        // if(isset($_GET['edit_products'])){
        //     include('edit_products.php');
        // }
        // if(isset($_GET['delete_product'])){
        //     include('delete_product.php');
        // }
        if(isset($_GET['view_city'])){
            include('view_city.php');
        }
        if(isset($_GET['view_admin'])){
            include('view_admin.php');
        }
        if(isset($_GET['edit_category'])){
            include('edit_category.php');
        }
        if(isset($_GET['edit_brand'])){
            include('edit_brand.php');
        }
        if(isset($_GET['delete_category'])){
            include('delete_category.php');
        }
        if(isset($_GET['delete_brand'])){
            include('delete_brand.php');
        }
        if(isset($_GET['list_orders'])){
            include('list_orders.php');
        }
        if(isset($_GET['delete_orders'])){
            include('delete_orders.php');
        }
        if(isset($_GET['list_payments'])){
            include('list_payments.php');
        }
        if(isset($_GET['delete_payments'])){
            include('delete_payments.php');
        }
        if(isset($_GET['list_users'])){
            include('list_users.php');
        }
        if(isset($_GET['delete_user'])){
            include('delete_user.php');
        }
        
        

        ?>
    </div>
    <?php
include("../includes/footer.php");

?>

  

<!-- font awesome link -->
</div>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>