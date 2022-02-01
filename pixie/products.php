<?php include "db_conn.php" ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>Pixie - Products</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">
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
              <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <!-- Items Starts Here -->
    <div class="featured-page">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Products</h1>
            </div>
          </div>
          <div class="col-md-8 col-sm-12">
            <div id="filters" class="button-group">
              <button class="btn btn-primary" data-filter="*">All Products</button>
              <button class="btn btn-primary" data-filter=".low">Low Price</button>
              <button class="btn btn-primary" data-filter=".high">Highest Price</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="featured container no-gutter">

        <div class="row posts">
        <?php
            $sql = "SELECT * FROM images LIMIT 1";
            $res = mysqli_query($conn, $sql);
            if(mysqli_num_rows($res) > 0) {
                while($images = mysqli_fetch_assoc($res)) { 
                $display = $images['img_src'];?>
            <div id="1" class="item new col-md-4">
              <a href="single-product.php?link=<?php echo $display?>">
                <div class="featured-item">
                <img src="uploads/<?=$images['img_src']?>" alt="">
                  <h6><?php echo "<br>$" . $images['img_price']; ?></h6>
                </div>
              </a>
            </div>
            <?php } } 
            $sql = "SELECT * FROM images LIMIT 1,1";
            $res = mysqli_query($conn, $sql);
            if(mysqli_num_rows($res) > 0) {
            while($images = mysqli_fetch_assoc($res)) { 
              $display = $images['img_src'];?>        
            <div id="2" class="item high col-md-4">
            <a href="single-product.php?link=<?php echo $display?>">
                <div class="featured-item">
                  <img src="uploads/<?=$images['img_src']?>" alt="">
                  <h6><?php echo "<br>$" . $images['img_price']; ?></h6>
                </div>
              </a>
            </div>
            <?php } } 
            $sql = "SELECT * FROM images LIMIT 2,1";
            $res = mysqli_query($conn, $sql);
            if(mysqli_num_rows($res) > 0) {
            while($images = mysqli_fetch_assoc($res)) { 
              $display = $images['img_src'];?> 
            <div id="3" class="item low col-md-4">
            <a href="single-product.php?link=<?php echo $display?>">
                <div class="featured-item">
                <img src="uploads/<?=$images['img_src']?>" alt="">
                <h6><?php echo "<br>$" . $images['img_price']; ?></h6>
                </div>
              </a>
            </div>
            <?php } } 
            $sql = "SELECT * FROM images LIMIT 3,1";
            $res = mysqli_query($conn, $sql);
            if(mysqli_num_rows($res) > 0) {
            while($images = mysqli_fetch_assoc($res)) {
              $display = $images['img_src'];?> 
            <div id="4" class="item low col-md-4">
              <a href="single-product.php?link=<?php echo $display?>">
                <div class="featured-item">
                <img src="uploads/<?=$images['img_src']?>" alt="">
                  <h6><?php echo "<br>$" . $images['img_price']; ?></h6>
                </div>
              </a>
            </div>
            <?php } } 
            $sql = "SELECT * FROM images LIMIT 4,1";
            $res = mysqli_query($conn, $sql);
            if(mysqli_num_rows($res) > 0) {
            while($images = mysqli_fetch_assoc($res)) {
              $display = $images['img_src'];?> 
            <div id="5" class="item new high col-md-4">
            <a href="single-product.php?link=<?php echo $display?>">
                <div class="featured-item">
                <img src="uploads/<?=$images['img_src']?>" alt="">
                  <h6><?php echo "<br>$" . $images['img_price']; ?></h6>
                </div>
              </a>
            </div>
            <?php } } 
            $sql = "SELECT * FROM images LIMIT 5,1";
            $res = mysqli_query($conn, $sql);
            if(mysqli_num_rows($res) > 0) {
            while($images = mysqli_fetch_assoc($res)) { 
              $display = $images['img_src'];?> 
            <div id="6" class="item new col-md-4">
            <a href="single-product.php?link=<?php echo $display?>">
                <div class="featured-item">
                <img src="uploads/<?=$images['img_src']?>" alt="">
                  <h6><?php echo "<br>$" . $images['img_price']; ?></h6>
                </div>
              </a>
            </div>
            <?php } } 
            $sql = "SELECT * FROM images LIMIT 6,1";
            $res = mysqli_query($conn, $sql);
            if(mysqli_num_rows($res) > 0) {
            while($images = mysqli_fetch_assoc($res)) {
              $display = $images['img_src'];?> 
            <div id="7" class="item new high col-md-4">
            <a href="single-product.php?link=<?php echo $display?>">
                <div class="featured-item">
                <img src="uploads/<?=$images['img_src']?>" alt="">
                  <h6><?php echo "<br>$" . $images['img_price']; ?></h6>
                </div>
              </a>
            </div>
            <?php } } 
            $sql = "SELECT * FROM images LIMIT 7,1";
            $res = mysqli_query($conn, $sql);
            if(mysqli_num_rows($res) > 0) {
            while($images = mysqli_fetch_assoc($res)) {
              $display = $images['img_src'];?> 
            <div id="8" class="item low new col-md-4">
            <a href="single-product.php?link=<?php echo $display?>">
                <div class="featured-item">
                <img src="uploads/<?=$images['img_src']?>" alt="">
                  <h6><?php echo "<br>$" . $images['img_price']; ?></h6>
                </div>
              </a>
            </div>
            <?php } } 
            $sql = "SELECT * FROM images LIMIT 7,1";
            $res = mysqli_query($conn, $sql);
            if(mysqli_num_rows($res) > 0) {
            while($images = mysqli_fetch_assoc($res)) {
              $display = $images['img_src'];?> 
            <div id="9" class="item new col-md-4">
            <a href="single-product.php?link=<?php echo $display?>">
                <div class="featured-item">
                <img src="uploads/<?=$images['img_src']?>" alt="">
                  <h6><?php echo "<br>$" . $images['img_price']; ?></h6>
                </div>
              </a>
            </div>
            <?php } } ?>
        </div>
    </div>

    <!-- Featred Page Ends Here -->
    
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