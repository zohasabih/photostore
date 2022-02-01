<!DOCTYPE html>
<html lang="en">

  <head>
  <title>PhotoStore - Image</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Pixie - Product Detail</title>
    <link rel="shortcut icon" href="assets/images/logo.png">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/flex-slider.css">
    <style>
      #disp {
        display: none;
      }
    </style>
<!--
Tooplate 2114 Pixie
https://www.tooplate.com/view/2114-pixie
-->
  </head>

  <body>
    
    <!-- Pre Header -->
    <?php
  session_start();
  if(isset($_SESSION['username'])) {
              $GLOBALS['grant'] = "gallery.php";
              $GLOBALS['cart'] = "shopping-cart.php";
              $GLOBALS['addnew'] = "new.php";
              $GLOBALS['checker'] = "";
            }
            else {
              $GLOBALS['grant'] = "signin.php";
              $GLOBALS['cart'] = "signin.php";
              $GLOBALS['addnew'] = "new.php";
              $GLOBALS['checker'] = "disp";
            } ?>
  <div id="pre-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12" style="font-size: 20px;">
            <div style="display: flex; color: white; justify-content: end; margin: 5px">
              <a href=<?php echo $GLOBALS['cart'] ?> style="color: white;" id="<?php echo $GLOBALS['checker'] ?>">
                <i class="fa fa-shopping-cart" style="margin: 8px;"></i>
              </a>
              <a href=<?php echo $GLOBALS['grant'] ?> style="color: white">
                <i class="fa fa-user" style="margin: 8px;"></i>
              </a>
              <a href=<?php echo $GLOBALS['addnew'] ?> style="color: white;" id="<?php echo $GLOBALS['checker'] ?>">
                <i class="fa fa-plus" style="margin: 8px;"></i>
              </a>
              <a href="dbsignin.php?logout=true" style="color: white;" id="<?php echo $GLOBALS['checker'] ?>">
                <i class="fa fa-sign-out" style="margin: 8px;"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="assets/images/c.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="products.php">Products
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact Us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <!-- Single Starts Here -->
    <div class="single-product">
      <div class="container">
        <div class="row" style="justify-content: center;">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Single Product</h1>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-slider">
              <div id="slider" class="flexslider">
                <ul class="slides">
                  <li>
                    <img src="uploads/<?=$_GET['link']?>" alt="">
                  <!-- items mirrored twice, total of 12 -->
                </ul>
              </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-content">
              <h4>Single Product Name</h4>
              
              <h6>
              <?php
                  include "db_conn.php";
                  $temp = $_GET['link'];
                  $pricequery = "SELECT img_price FROM images WHERE img_src = '$temp'";
                  $price = mysqli_fetch_assoc(mysqli_query($conn, $pricequery));
                  echo "$" . $price['img_price'];
                ?>
              </h6>
              <?php
                if(isset($_SESSION['username'])) {
                  $goto_url = "addtocart.php?item=";
                }
                else {
                  $goto_url = "signin.php?item=";
                }
              ?>
              <form action="<?php echo $goto_url . $_GET['link']?>&price=<?php echo $price['img_price'] ?>" method="POST">
                <label for="quantity">Quantity:</label>
                <input name="quantity" type="quantity" class="quantity-text" id="quantity" value="1" readonly>
                <input type="submit" class="button" value="Order Now!">
              </form>
              <div class="down-content">
                <div class="categories">
                  <h6>Category: <span><a href="#">Pants</a>,<a href="#">Women</a>,<a href="#">Lifestyle</a></span></h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Single Page Ends Here -->



    
    <!-- Footer Starts Here -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="logo">
              <img src="assets/images/c.png" alt="">
            </div>
          </div>
          <div class="col-md-12">
            <div class="footer-menu">
              <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">How It Works?</a></li>
                <li><a href="contact.php">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-12">
            <div class="social-icons">
              <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer Ends Here -->


    <!-- Sub Footer Starts Here -->
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="copyright-text">
              <p>Copyright &copy; 2022 PhotoStore</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Sub Footer Ends Here -->


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/flex-slider.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
