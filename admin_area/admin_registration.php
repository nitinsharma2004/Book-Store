<?php include('../includes/connect.php');
include('../functions/common_function.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
     <!-- bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<!-- font awesome link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    body{
        overflow: hidden;
    }
</style>

</head>
<body>
   <div class="container-fluid m-3 px-5">
<h2 class="text-center mb-5 text-success">Admin Registration</h2>
<div class="row d-flex justify-content-center ">
    <div class="col lg-6 col-xl-5">
        <img src="../images/admin_reg1.jpg" alt="Admin Registration" class="img-fluid">
    </div>
    <div class="col lg-6 col-xl-4">
       <form action="" method="post">
        <div class="form-outline mb-4">
            <label for="admin_name" class="form-label">Username</label>
            <input type="text" id="admin_name" name="admin_name" placeholder="Enter your username" required="required" class="form-control">
        </div>
        <div class="form-outline mb-4">
            <label for="admin_email" class="form-label">Email</label>
            <input type="email" id="admin_email" name="admin_email" placeholder="Enter your email" required="required" class="form-control">
        </div>
        <div class="form-outline mb-4">
            <label for="admin_password" class="form-label">Password</label>
            <input type="password" id="admin_password" name="admin_password" placeholder="Enter your password" required="required" class="form-control">
        </div>
        <div class="form-outline mb-4">
            <label for="admin_confirm_password" class="form-label">Confirm Password</label>
            <input type="password" id="admin_confirm_password" name="admin_confirm_password" placeholder="Confirm password" required="required" class="form-control">
        </div>
        <div>
            <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_registration" value="Register">
            <p class="small fw-bold mt-2 pt-1">Do you already have an account? <a href="admin_login.php" class="link-danger">Login</a></p>
        </div>
       </form>
    </div>
</div>
   </div> 
</body>
</html>

<!-- php code -->
<?php
if(isset($_POST['admin_registration'])){
    $admin_name=$_POST['admin_name'];
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['admin_password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    $admin_confirm_password=$_POST['admin_confirm_password'];

    // select query

    $select_query="select * from `admin_table` where admin_name='$admin_name' or admin_email='$admin_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('username and email is already exist')</script>";
    }elseif($admin_password!=$admin_confirm_password){
        echo "<script>alert('password do not match')</script>";
    }
    else{
    $insert_query="insert into `admin_table` (admin_name,admin_email,admin_password) values ( '$admin_name','$admin_email','$hash_password')";
    $sql_execute=mysqli_query($con,$insert_query);
    }
    if($rows_count>0){
        $_SESSION['admin_name']=$admin_name;
          echo "<script>alert('Registration successful')</script>"; 
          echo "<script>window.open('admin_login.php','_self')</script>"; 
      }else{
          echo "<script>window.open('admin_login.php','_self')</script>"; 
      }
      
      }
      
?>