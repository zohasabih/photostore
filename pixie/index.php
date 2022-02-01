<?php include "db_conn.php" ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>PhotoStore - Home</title>

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
  </head>

  <body>

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

    <?php
      if(isset($_GET['login'])) {
        if ($_GET['login'] == "success") { 
          $current = $_SESSION['username'] ?>
          <div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Welcome, <?php echo "$current"; ?>
          </div>
        <?php }
      }
		?>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="#"><img src="assets/images/c.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="products.php">Products</a>
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
    <!-- Banner Starts Here -->
    <div class="banner" style="background-image: url(assets/images/slideimage.png);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="caption">
              <h2>PhotoStore</h2>
              <div class="line-dec"></div>
              <p>Photostore is the home of all your photos, automatically organized and easy to share. You can find the best pictures when you shop at <strong>PhotoStore</strong> to create your best profile.</p> 
              <p>Create your account or log in to enjoy all new photos in store NOW!</p>
              <div class="main-button">
                <a href="signin.php">Sign In</a>
                <a href="signup.php">Register</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <!-- Featured Starts Here -->
    <div class="featured-items">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>All Items</h1>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-carousel owl-theme">
            <?php
            $sql = "SELECT * FROM images ORDER BY img_id DESC";
            $res = mysqli_query($conn, $sql);
            if(mysqli_num_rows($res) > 0) {
                while($images = mysqli_fetch_assoc($res)) { ?>
              <a href="single-product.php">
                <div class="featured-item">
                  <img src="uploads/<?=$images['img_src']?>" alt="Item 1">
                  <h6><?php echo "<br> $" . $images['img_price'] ?></h6>
                </div>
              </a>
              <?php } } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Featred Ends Here -->


    <!-- Subscribe Form Starts Here -->
    <div class="subscribe-form">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Subscribe to our PhotoStore now!</h1>
            </div>
          </div>
          <div class="col-md-8 offset-md-2">
            <div class="main-content">
              <p>Subscribe to our newsletter today and get an alert about latest photos, offers, deals, and much more! Enter your email to stay in the loop.</p>
              <div class="container">
                <form id="subscribe" action="subscribe.php" method="post">
                  <div class="row">
                    <div class="col-md-7">
                      <fieldset>
                        <input name="email" type="text" class="form-control" id="email" 
                        onfocus="if(this.value == 'Your Email...') { this.value = ''; }" 
                    	onBlur="if(this.value == '') { this.value = 'Your Email...';}"
                    	value="Your Email..." required="">
                      </fieldset>
                    </div>
                    <div class="col-md-5">
                      <fieldset>
                        <button type="submit" id="form-submit" class="button">Subscribe Now!</button>
                      </fieldset>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Subscribe Form Ends Here -->


    
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
