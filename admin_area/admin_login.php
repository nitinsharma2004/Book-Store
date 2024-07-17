<?php include('../includes/connect.php');
include('../functions/common_function.php'); 
@session_start();
?>
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
         background-image:url(../images/admin.jpg) ; 
         background-repeat: no-repeat;
         background-attachment: fixed;
         background-size: 100% 100%;
         
        /* overflow: hidden; */
    }
    .login1{
  background-image: url('../images/imagepanel.jpg'); /* Replace with the path to your image */
  background-size: cover; /* Adjust how the background image is sized */
  background-position: center; /* Adjust the position of the background image */
  border-radius: 10px;
  box-shadow: 10px;

    }
    
</style>

</head>
<body>
   <div class="container m-3 px-5">
<h2 class="text-center mb-5 text-light"><b>Admin Login</b></h2>
<div class="row justify-content-center d-flex  ">
    <div class="col-sm-6 col-md-4">
        <!-- <img src="../images/admin_reg1.jpg" alt="Admin Login" class="img-fluid"> -->
        <!-- <img src="../images/books.jpg" height="100%" width="100%" alt=""> -->
    </div>
    <div class="login1 col lg-6 col-xl-4">
       <form action="" method="post">
        <div class="form-outline mb-4">
            <label for="admin_name" class="form-label">Username</label>
            <input type="text" id="admin_name" name="admin_name" placeholder="Enter your username" required="required" class="form-control  ">
            
        </div>
        
        <div class="form-outline mb-4">
            <label for="admin_password" class="form-label">Password</label>
            <input type="password" id="admin_password" name="admin_password" placeholder="Enter your password" required="required" class="form-control">
        </div>
        
        <div>
            <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_login" value="Login">
            <p class="small fw-bold mt-2 pt-1">Don't you have an account? <a href="admin_registration.php" class="link-danger">Register</a></p>
        </div>
       </form>
    </div>
</div>
   </div> 
</body>
</html>


<?php
if(isset($_POST['admin_login'])){
    $admin_name=$_POST['admin_name'];
    $admin_password=$_POST['admin_password'];

    $select_query="select * from `admin_table` where admin_name='$admin_name'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
   
    if($row_count>0){
        $_SESSION['admin_name']=$admin_name;
        if(password_verify($admin_password,$row_data['admin_password'])){

        echo "<script>alert('Login Successful')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
    else
    {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
}
?>


