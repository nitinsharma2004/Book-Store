<?php
if(isset($_GET['delete_brands'])){
    $delete_brands=$_GET['delete_brands'];

    $delete_query="Delete from `brands` where brand_id=$delete_brands";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('Brands is been deleted sucessfully')</script>";
        echo "<script>window.open('./index.php?view-brands','_self')</script>";
    }
}

?>