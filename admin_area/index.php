
<!-- connect file -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title> 
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    

    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
<style>
    body{
        overflow-x: hidden;
       
    }
    /* .back{
        background-color: cyan;
        background-image: linear-gradient(45deg, #e6e6e6, #ffffff);
        background-size: 400% 400%;
        animation: gradientAnimation 5s ease infinite;
    }
    @keyframes gradientAnimation {
        0% {background-position: 0% 50%;}
        50% {background-position: 100% 50%;}
        100% {background-position: 0% 50%;}
    } */
    .product_img{
        width: 100px;
        object-fit: contain;
    }
    .buttonview{
        margin-right: 30px;
    }
    .logoutbtn{
        display: inline-block;
        padding: 10px 20px;
        margin: 5px;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3 ease;
    }
    </style>
</head>
<body>

    <!--navbar  -->
<div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <img src="../images/PicsArt_06-12-09.48.24.png" alt="logo" height="5%" width="5%">
            <nav class="navbar navbar-expand-lg">
                <ul class="navbar-nav">


                    <!-- <li class="nav-item">
                        <a href="" class="nav-link">Welcome Guest</a>
                    </li> -->

        <?php
        if(!isset($_SESSION['admin_name'])){
         echo "  <li class='nav-item'>
         <a class='nav-link text-light' href='#'>Welcome Admin</a>
       </li>";
        }else{
          echo " <li class='nav-item'>
          <a class='nav-link' href='#'>welcome ".$_SESSION['admin_name']."</a>
         </li>";
        }
      if(!isset($_SESSION['admin_name'])){
      echo " <li class='nav-item'>
      <a class='nav-link' href='admin_login.php'>Login</a>
     </li>";
       }else{
       echo " <li class='nav-item'>
      <a class='nav-link' href='admin_logout.php'>Logout</a>
      </li>";
      }
      ?>


                </ul>
            </nav>
        </div>
    </nav>

   <!-- second child -->
   <div class="bg-light">
    <h3 class="text-center text-light p-2 bg-secondary">Admin Panel</h3>
   </div>

   <!-- third child -->
   <div class="">
    <!-- <div class=" bg-secondary p-1 d-flex align-items-center"> -->
        <div class="p-1">
            <a href="#"><img src="../images/admin_logo.png" alt="" class="admin_image"></a>
            
        </div>
        <!-- button*10>a.nav-link.text-light.bg-info.my-1 -->
        <div class="button text-center">
        <div class="container">
    
    <div class="row">
      <div class="col-md-6">
        <h3>Products</h3><br>
        <a href="index.php?view_products" class="btn btn-primary buttonview">
          <i class="fas fa-eye"></i> View Products
        </a>
        <a href="insert_product.php" class="btn btn-success">
          <i class="fas fa-plus"></i> Insert Product
        </a>
      </div>
      <div class="col-md-6">
        <h3>Brands</h3><br>
        <a href="index.php?view_brands" class="btn btn-primary buttonview">
          <i class="fas fa-eye"></i> View Brands
        </a>
        <a href="index.php?insert_brand" class="btn btn-success">
          <i class="fas fa-plus"></i> Insert Brand
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6"><br>
        <h3>Categories</h3><br>
        <a href="index.php?view_categories" class="btn btn-primary buttonview">
          <i class="fas fa-eye"></i> View Categories
        </a>
        <a href="index.php?insert_categories" class="btn btn-success">
          <i class="fas fa-plus"></i> Insert Category
        </a>
      </div>
      <div class="col-md-6"><br>
        <h3>Orders</h3><br>
        <a href="index.php?list_orders" class="btn btn-primary">
          <i class="fas fa-eye"></i> View All Orders
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6"><br>
        <h3>Payments</h3><br>
        <a href="index.php?list_payments" class="btn btn-primary">
          <i class="fas fa-eye"></i> View All Payments
        </a>
      </div>
      <div class="col-md-6"><br>
        <h3>Users</h3><br>
        <a href="index.php?list_users" class="btn btn-primary">
          <i class="fas fa-eye"></i> List of users
        </a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <a href="admin_login.php" class="btn btn-danger logoutbtn">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </div>
    </div>
  </div>
        </div>
    </div>
   </div>

   <!-- fourth child -->
   <div class="container my-3">
    <?php
     if(isset($_GET['insert_categories'])){
        include('insert_categories.php');
     } 
     if(isset($_GET['insert_brand'])){
        include('insert_brands.php');
     } 
     if(isset($_GET['view_products'])){
        include('view_products.php');
     } 
     if(isset($_GET['edit_products'])){
        include('edit_products.php');
     } 
     if(isset($_GET['delete_product'])){
        include('delete_product.php');
     } 
     if(isset($_GET['view_categories'])){
        include('view_categories.php');
     } 
     if(isset($_GET['view_brands'])){
        include('view_brands.php');
     } 
     if(isset($_GET['edit_category'])){
        include('edit_category.php');
     }
     if(isset($_GET['edit_brands'])){
        include('edit_brands.php');
     }
     if(isset($_GET['delete_category'])){
        include('delete_category.php');
     }
     if(isset($_GET['delete_brands'])){
        include('delete_brands.php');
     }
     if(isset($_GET['delete_orders'])){
      include('delete_orders.php');
   }
   if(isset($_GET['delete_users'])){
    include('delete_users.php');
 }
     if(isset($_GET['list_orders'])){
        include('list_orders.php');
    }
        if(isset($_GET['list_payments'])){
        include('list_payments.php');
    }
    if(isset($_GET['list_users'])){
        include('list_users.php');
    }
    ?>
   </div>
   <!-- last child  -->
   
    <!-- <div class="bg-info p-3 text-center  footer">
  <footer>All right reserved @- Designed by Pradeep-2023</footer>
    </div> -->
   
</div>

<!--start footer-->
<footer class="container-fluid text-white bg-dark mt-5">
<div class="container">
<div class="row py-3">
<div class="col-md-6 "><!--start first column-->
    <span class="pr-2">Follow Us:</span>
    <a href="https://www.facebook.com" target="_blank" class="pr-2 fi-color"><i class="fa-brands fa-facebook"></i></a>
    <a href="https://www.twitter.com" target="_blank" class="pr-2 fi-color"><i class="fa-brands fa-twitter" aria-hidden="true"></i></a>
    <a href="https://www.youtube.com" target="_blank" class="pr-2 fi-color"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
    <a href="https://www.google.com" target="_blank" class="pr-2 fi-color"><i class="fa-brands fa-google" aria-hidden="true"></i></a>
    <a href="https://www.linkedin.com" target="_blank" class="pr-2 fi-color"><i class="fa-brands fa-linkedin" aria-hidden="true"></i></a>
</div><!--end first column-->
<div class="col-md-6 text-right"><!--start second column-->
<small>Designed By pradeep Sharma  ; 2023</small>
<small><a href="../user_area/user_login.php" class="ml-2">user login</a></small>
</div><!--end second column-->
</div>
</div>
</footer>

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
