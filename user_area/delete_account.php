
    <h3 class="text-success mb-4 mt-4">Delete Account</h3>
    <form action="" method="post" class="mt-4">
<div class="form-outline mb-4">
    <input type="submit" class="form-control w-50 m-auto" name="delete" value="Delete Account">
</div>
<div class="form-outline mb-4">
    <input type="submit" class="form-control w-50 m-auto" name="dont_delete" value="dont Delete Account">
</div>
    </form>

    <?php
$username_sess=$_SESSION['username'];
if(isset($_POST['delete'])){
    $delete_query="Delete from `user_table` where username='$username_sess'";
    $result=mysqli_query($con,$delete_query);
    if($result){
        session_destroy();
        echo "<script>alert('Account Deleted successfully')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
if(isset($_POST['delete'])){
    echo "<script>window.open('profile.php,'_self')</script>";
}
?>

