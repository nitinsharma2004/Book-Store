<!-- connect file -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecommerse Website</title>

 

  <!-- bootstrap css link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- font awsome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/> -->

  <!-- css link -->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/index3.css">


  <style>
    body{
        overflow-x: hidden;
    }
    .image-fluid{
       height: 40%;
       width: 40%;
    }
    .cardbody{
      height: 90%;
      width: 90%;
    }
    
</style>
</head>

<body>
  <!-- navbar -->
  <div class="container-fluid p-0 ">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info ">
      <div class="container-fluid ">
        <img src="./images/PicsArt_06-12-09.48.24.png" alt="" class="logo ">

        <!-- <button class="navbar-toggler navb" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> -->
        <button class="navbar-toggler navb" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- <div class="collapse navbar-collapse" id="navbarCollapse"> -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php"><b>Home</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="display_all.php"><b>Products</b></a>
            </li>
            <?php
if(isset($_SESSION['username'])){
echo "<li class='nav-item'>
<a class='nav-link' href='./user_area/profile.php'><b>My Account</b></a>
</li>";
}else{
  echo "<li class='nav-item'>
<a class='nav-link' href='./user_area/user_registration.php'><b>Register</b></a>
</li>";
}
?>
            <li class="nav-item">
              <a class="nav-link" href="#contact"><b>Contact</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?> </sup></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><b>Total Price:</b> <?php total_cart_price(); ?>/-</a>
            </li>
          </ul>
          <form class="d-flex" action="search_product.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">

          </form>
        </div>
      </div>
    </nav>

<!-- calling cart function -->
<?php
cart();
?>
    <!-- second child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">
       
        <?php
        if(!isset($_SESSION['username'])){
         echo "  <li class='nav-item'>
         <a class='nav-link' href='#'>Welcome Guest</a>
       </li>";
        }else{
          echo " <li class='nav-item'>
          <a class='nav-link' href='#'>welcome ".$_SESSION['username']."</a>
         </li>";
        }
      if(!isset($_SESSION['username'])){
      echo " <li class='nav-item'>
      <a class='nav-link' href='./user_area/user_login.php'>Login</a>
     </li>";
       }else{
       echo " <li class='nav-item'>
      <a class='nav-link' href='./user_area/logout.php'>Logout</a>
      </li>";
      }
      ?>

      </ul>
    </nav>


 <!-- Header-->
 <header class="bg-dark py-5" id="main-header">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
          <img src="" alt="">
            <h1 class="display-4 fw-bolder">If you want to make intelligent, get books from here.</h1>
            <p class="lead fw-normal text-white-50 mb-0">Shop Now!</p>
        </div>
    </div>
</header>
<!-- Section-->






    <!-- third child -->
    <div class="bg-light">
      <h3 class="text-center">Book Store</h3>
      <p class="text-center">communication is the heart of e-commerse and community </p>
    </div>

    <!-- fourth child -->
    <!-- <div class="row px-1">
      <div class="col-md-10"> -->
        <!-- products -->
        <div class="row">
          <!-- fetcing products -->
          <?php
          // calling function
          getproducts();
          get_unique_categories();
          get_unique_brands();
          // $ip = getIPAddress();  
          // echo 'User Real IP Address - '.$ip;
          ?>

          <!-- row end -->
        </div>
        <!-- col end -->
      </div>
      <!-- <div class="col-md-2 bg-secondary p-0"> -->
        <!-- brands to be displayed -->
        <!-- <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light">
              <h4> Delivary Brand</h4>
            </a>
          </li> -->
          <?php
        // getbrands();
          ?>

        </ul>

        <!-- categories to be displayed -->
        <!-- <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light">
              <h4> Categories</h4>
            </a>
          </li> -->
          <?php
      //  getcategories();
          ?>
        <!-- </ul>
      </div>
    </div> -->


  


     <!-- end introduction section contaner-->
<!-- start services section    -->
<br><br>
<div class="container text-center border-bottom "id="services">
<h2>Our Services</h2>
<div class="jumbotron text-left">
    <p><b>


    </b></p>

    <div class="row mt-4">
<div class="col-sm-4 mb-4">
    <a href="https://www.flipkart.com/home-kitchen/home-appliances/electric~type/pr?sid=j9e%2Cabm" target="_blank"><i class="fa fa-tv fa-5x text-success ml-5"></i></a>
<h4 class="mt-4">Electronic Appliances</h4>    
</div>
<div class="col-sm-4 mb-4">
    <a href="https://www.ibm.com/in-en/topics/what-is-preventive-maintenance"  target="_blank"><i class="fa fa-sliders fa-5x text-primary ml-5"></i></a>
<h4 class="mt-4">Preventive Maintenance</h4>    
</div>
<div class="col-sm-4 mb-4">
    <a href="https://www.fusiongbs.com/top-5-service-management-fails-and-how-to-fix-them/"  target="_blank"><i class="fa fa-cogs fa-5x text-info"></i></a>
<h4 class="mt-4">Fault Repair</h4>    
</div>
    </div>
    </div>
</div><!-- end services section    -->
<hr>

<br><br>
<!-- review  start-->
<h2 class="revie">Review</h2>
<div class="wrapper">
    <div class="box">
      <i class="fas fa-quote-left quote"></i>
      <p>Absolutely loved shopping at this oshop US over the last 2 years ! I think its good since as for the speed and variety. Also, it's very easy to return the products, the customer service is good! Also, it's possible to get shopping points if you use affiliate credit cards..</p>
      <div class="content">
        <div class="info">
          <div class="name">Alex Smith</div>
          <div class="job">Designer | Developer</div>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
          </div>
        </div>
        <div class="image">
          <img src="./images/pic-5.png" alt="">
        </div>
      </div>
    </div>
    <div class="box">
      <i class="fas fa-quote-left quote"></i>
      <p>I cannot thank oshp enough for providing a consistent high quality of deliveries. My estate has been having road works etc and road closures yet the oshop driver delivered both packages on time and so good. My mum will be very pleased with her new bag..</p>
      <div class="content">
        <div class="info">
          <div class="name">Anna Chris</div>
          <div class="job">YouTuber | Blogger</div>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
          </div>
        </div>
        <div class="image">
          <img src="./images/pic-2.png" alt="">
        </div>
      </div>
    </div>
    <div class="box">
      <i class="fas fa-quote-left  quote"></i>
      <p>I have been a customer for well over 3 years. Their Customer service is an example for ALL to TRY and achieve. Whomever is running the department definitely deserves their salary
I'll give you more stars that are in the sky in the middle of nowhere (more visible).
</p>
      <div class="content">
        <div class="info">
          <div class="name">Kristina Bellis</div>
          <div class="job">Freelancer | Advertiser</div>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
        </div>
        <div class="image">
          <img src="./images/pic-1.png" alt="">
        </div>
      </div>
    </div>
  </div>
<!-- review ends -->


<div class="container mt-5 " id="contact">
<h2 class="text-center mb-4 text-success">Contact Us</h2>
<div class="jumbotron">
<b>

<p >"Thank you for your interest in our services. We would love to hear from you! Please use the contact form below to get in touch with us, and we will get back to you as soon as possible.</p><br>

<p>Alternatively, you can contact us directly using the contact details provided below:</p><br>
<ol>
<li>Phone: 8449696679</li><br>
<li>Email: riderprince231@gmail.com</li><br>
<li>Address: beriparao,haldwani</li><br>
</ol>
<p>Our office hours are [insert office hours], and we are closed on weekends and holidays.</p><br>

<p>If you have any questions, comments, or feedback, please don't hesitate to reach out to us. We value your input and are committed to providing you with exceptional customer service.</p><br>

<p>Thank you for considering our services. We look forward to hearing from you soon!"</p><br></b>
</p>
</div>

<div class="row">
<!--start first column-->


<br><br><br><br>

<div class="col-md-8"><!--start first column-->
<form action="" method="POST">
    <input type="text" clas="form-control" name="name" placeholder="Name"style="width:100%";><br><br>
    <input type="text" clas="form-control" name="subject" placeholder="subject"style="width:100%";><br><br>
    <input type="email" clas="form-control" name="email" placeholder="Email"style="width:100%";><br><br>
<textarea name="message"  class="form-control" placeholder="how can i help you" style="height:120px;"></textarea><br>
<input type="submit" class="btn btn-info" value="Send" name="submit"><br><br>
<?php if(isset($msg)){echo $msg;}?>
</form>
</div><!--end first column-->


<!--end first column-->
<div class="col-md-4  text-center"><!--start 2nd column-->
<strong>Headquater:</strong><br>
Shopping pvt Ltd,<br>
Bariparao,Haldwani <br>
Uttrakhand-263139 <br>
Phone : +91-8449696679 <br>
<a href="#" target="_blank">www.E-Commerse.com</a><br>
<br><br>
<strong>Branch:</strong><br>
Shopping pvt Ltd,<br>
Main road,Nanital <br>
Uttrakhand-263139 <br>
Phone : +91-8449696679 <br>
<a href="#" target="_blank">www.E-Commerce.com</a><br>
</div><!--end 2nd column-->
</div>
</div><!-- end contact us -->



<!-- the second last container -->
<div style="background-color:#c3b8e6;padding:30px 0px">
<div class="container" id="contactss">
<div class="row footer_text">
<div class="col-md-3 pb-3">
<h4 class="mb-2">Help</h4>
<ul class="list-unstyled mb-0">
<li>
<a href="https://www.tutorialspoint.com/e_commerce/index.htm" target="_blank" style="color:#444444">Tutorials</a>
</li>
<li>
<a href="https://databox.com/best-ecommerce-blogs#head2" target="_blank" style="color:#444444">Blog</a>
</li>
</ul>
</div>
<div class="col-md-3 pb-3">
<h4 class="mb-2">Features</h4>
 <ul class="list-unstyled mb-0">
<li>
<a style="color:#444444" href="https://o2vend.com/ecommerce?utm_source=Microsoft&utm_medium=Advt&utm_campaign=eCommerce&utm_term=e%20commerce%20plattform&utm_campaign=&utm_source=bing&utm_medium=ppc&hsa_acc=9606399743&hsa_cam=407113048&hsa_grp=1350200803007570&hsa_ad=&hsa_src=o&hsa_tgt=kwd-84388263491398:loc-90&hsa_kw=e%20commerce%20plattform&hsa_mt=p&hsa_net=adwords&hsa_ver=3&msclkid=88abdbee4d55186d1acabfa510cd6655" target="_blank">Ecommerce</a>
</li>
<li>
<a style="color:#444444" href="https://www.shopify.com/pos" target="_blank">POS</a>
</li>
<li>
<a style="color:#444444" href="https://www.novo.co/apply/4?utm_source=bing&utm_medium=cpc&utm_campaign=686846590&utm_content=1318316074222661&utm_term=nearside%20bank&utm_network=o&utm_adcopy=&b_adgroup=Nearside_Exact&b_adgroupid=1318316074222661&b_adid=82395016685756&b_[%E2%80%A6]uctid=&b_term=nearside%20bank&b_termid=kwd-82395652981850:loc-90&msclkid=14d69420ed3c1421a71ff06bb3ce278b&utm_source=bing&utm_medium=cpc&utm_campaign=Bing_Search_Nonbrand_Competitor&utm_term=nearside%20bank&utm_content=Nearside_Exact" target="_blank">Back Office</a>
</li>
</ul>
</div>
<div class="col-md-3 pb-3">
<h4 class="mb-2">Information</h4>
<ul class="list-unstyled mb-0">
<li>
<a style="color:#444444" href="/home/index/#about">About</a>
</li>
<li>
<a style="color:#444444" href="/home/index/#features">All Features</a>
</li>
<li>
<a style="color:#444444" href="/home/index/#pricing">Pricing</a>
</li>
<li>
<a style="color:#444444" href="/home/index/#contact">Contact us</a>
</li>
</ul>
</div>
<div class="col-md-3 pb-3">
<h4 class="mb-2">Our Address</h4>
<ul class="list-unstyled mb-0">
<li>
<i class="fas fa-map-marker-alt"></i>
Beriparao, Haldwani UTTARAKHAND 263139, INDIA
</li>
<li>
<i class="fas fa-phone"></i>
+ 91 8449696679
</li>
<li>
<i class="fas fa-envelope"></i>
<a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="592a38353c2a19333c2038372d3c3a31373635363e303c2a773a3634">Riderprince231@gmail.com</a>
</li>
</ul>
</div>
</div>
</div>
</div>


<!--start footer-->
<footer class="container-fluid text-white bg-dark mt-3">
<div class="container">
<div class="row py"><br>
<div class="col-md-6 "><!--start first column-->
<br>
    <span class="pr-2">Follow Us:</span>
    <a href="https://www.facebook.com" target="_blank" class="pr-2 fi-color"><i class="fa-brands fa-facebook"></i></a>
    <a href="https://www.twitter.com" target="_blank" class="pr-2 fi-color"><i class="fa-brands fa-twitter" aria-hidden="true"></i></a>
    <a href="https://www.youtube.com" target="_blank" class="pr-2 fi-color"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
    <a href="https://www.google.com" target="_blank" class="pr-2 fi-color"><i class="fa-brands fa-google" aria-hidden="true"></i></a>
    <a href="https://www.linkedin.com" target="_blank" class="pr-2 fi-color"><i class="fa-brands fa-linkedin" aria-hidden="true"></i></a>
</div><!--end first column-->
<div class="col-md-6 text-right"><!--start second column-->
<br>
<p>Designed By  &copy Pradeep  </a>; 2023</p>
<a href="./admin_area/admin_login.php" class="ml-2">Admin login</a>
</div><!--end second column-->
</div>
</div>
</footer>






<!-- javascript -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script> -->

<!-- custom js file link  -->
<!-- <script src="js/script.js"></script> -->

</body>

</html>

