<?php
if(isset($_GET['delete_users'])){
    $delete_user_id=$_GET['delete_users'];

    $delete_users="Delete from `user_table` where delete_user_id=$delete_users";
    $result_users=mysqli_query($con,$delete_users);
    if($result_users){
        echo "<script>alert('user is been deleted sucessfully')</script>";
        echo "<script>window.open('./index.php?list_users','_self')</script>";
    }
}

?>