<!DOCTYPE html>
<html>
<head>
  <title>Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="payment.css">
  
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
</head>
<body>
  <main class="page payment-page">
    <section class="payment-form dark">
      <div class="container">
        <div class="block-heading">
          <a href="shopping-cart.php" style="font-size: 30px; float: right;">
						<i class="fa fa-times" aria-hidden="true"></i>
					</a>
          <h2>Payment</h2>
          </div>
        <form action="customers.php" method="POST">
          <div class="products">

            <h3 class="title">Checkout</h3>
            <?php include "db_conn.php";
              $total = "SELECT SUM(img_price) FROM temp_img";
              $res_total = mysqli_query($conn, $total);
              $price = mysqli_fetch_assoc($res_total);
              $sql = "SELECT * FROM temp_img";
              $res = mysqli_query($conn, $sql);
              if(mysqli_num_rows($res) > 0) {
                while($images = mysqli_fetch_assoc($res)) { 
            ?>
            <div class="item">
              <span class="price"><?php echo "$" . $images['img_price'] ?></span>
              <img class="item-name" src="uploads/<?=$images['img_src']?>" width="30%" height="30%">
            </div>
            <?php } ?>
            <div class="total">Total<span class="price"><?php echo "$" . implode(" ",$price); ?></span></div>
            <?php } ?>
          </div>
          <div class="card-details">
            <?php
              include "db_conn.php";
              session_start();
              $username = $_SESSION['username'];
              $sql = "SELECT * FROM users WHERE username = '$username'";
              $res = mysqli_query($conn, $sql);
              if(mysqli_num_rows($res) > 0) {
                while($results = mysqli_fetch_assoc($res)) {
                  $display_name = $results['username'];
                  $email = $results['email'];
                }
            ?>
            <h3 class="title">Customer Details</h3>
            <div class="row">
              <div class="form-group col-sm-7">
                <label for="cust-name">Full Name</label>
                <input id="cust-name" type="text" class="form-control" placeholder="<?php echo $display_name ?>" aria-label="Full Name" aria-describedby="basic-addon1" readonly>
              </div>
              <div class="form-group col-sm-5">
                <label for="datepicker">Date Of Birth</label>
                <div class="input-group expiration-date">
                  <input type="text" class="form-control" placeholder="MM/DD/YYYY" aria-label="MM" aria-describedby="basic-addon1" id="datepicker" required>
                </div>
              </div>
              <div class="form-group col-sm-10">
                <label for="email">E-mail</label>
                <input id="email" type="text" class="form-control" placeholder="<?php echo $email ?>" aria-label="E-mail" aria-describedby="basic-addon1" readonly>
              </div>
            </div>
            <?php } ?>
            <br>
            <h3 class="title">Credit Card Details</h3>
            <div class="row">
              <div class="form-group col-sm-7">
                <label for="card-holder">Card Holder</label>
                <input id="card-holder" type="text" class="form-control" placeholder="Card Holder" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-5">
                <label for="">Expiration Date</label>
                <div class="input-group expiration-date">
                  <input type="text" class="form-control" placeholder="MM" aria-label="MM" aria-describedby="basic-addon1">
                  <span class="date-separator">/</span>
                  <input type="text" class="form-control" placeholder="YY" aria-label="YY" aria-describedby="basic-addon1">
                </div>
              </div>
              <div class="form-group col-sm-8">
                <label for="card-number">Card Number</label>
                <input id="card-number" type="text" class="form-control" placeholder="Card Number" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-4">
                <label for="cvc">CVC</label>
                <input id="cvc" type="text" class="form-control" placeholder="CVC" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-12">
                <input type="submit" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModalLong" value="Proceed">
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </main>
  <!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Order Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="marginss">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>
          <p>Thank you for Shopping with us!</p>
          <p>Your Order has been placed.</p>
        </div>
      </div>
      <div class="modal-footer">
        <a href="index.php" type="button" class="btn btn-primary styleButton">Continue Shopping</a>
      </div>
    </div>
  </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>