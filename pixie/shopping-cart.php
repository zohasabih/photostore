<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="shopping-cart.css">
</head>
<body>
	<main class="page">
	 	<section class="shopping-cart dark">
	 		<div class="container">
		        <div class="block-heading">
					<a href="products.php" style="font-size: 30px; float: right;">
						<i class="fa fa-times" aria-hidden="true"></i>
					</a>
		          <h2>Shopping Cart</h2>
		        </div>
		        <div class="content">
	 				<div class="row">
	 					<div class="col-md-12 col-lg-8">
	 						<div class="items">
								<?php
								include "db_conn.php";
								$total = "SELECT SUM(img_price) FROM temp_img";
								$res_total = mysqli_query($conn, $total);
								$price = mysqli_fetch_assoc($res_total);
								$sql = "SELECT * FROM temp_img";
								$res = mysqli_query($conn, $sql);
								if(mysqli_num_rows($res) > 0) { 
									while ($results = mysqli_fetch_assoc($res)) { ?>
				 				<div class="product">
				 					<div class="row">
					 					<div class="col-md-3">
					 						<img class="img-fluid mx-auto d-block image" style="padding: 20px;" src="uploads/<?=$results['img_src']?>">
					 					</div>
					 					<div class="col-md-8">
					 						<div class="info">
						 						<div class="row">
							 						<div class="col-md-4 quantity">
							 							<label for="quantity">Quantity:</label>
							 							<input id="quantity" type="number" value ="1" class="form-control quantity-input">
							 						</div>
							 						<div class="col-md-3 price">
							 							<span><?php echo "$" . $results['img_price'] ?></span>
							 						</div>
							 					</div>
							 				</div>
					 					</div>
					 				</div>
				 				</div>
								 <?php  }
											} ?>
				 			</div>
			 			</div>
			 			<div class="col-md-12 col-lg-4">
							<form action="payment.php">
								<div class="summary">
									<h3>Summary</h3>
									<div class="summary-item"><span class="text">Subtotal</span><span class="price"><?php echo "$" . implode(" ",$price); ?></span></div>
									<div class="summary-item"><span class="text">Discount</span><span class="price">$0</span></div>
									<div class="summary-item"><span class="text">Total</span><span class="price"><?php echo "$" . implode(" ",$price); ?></span></div>
									<input type="submit" class="btn btn-primary btn-lg btn-block mt-3" value="Checkout">
								</div>
							</form>
			 			</div>
		 			</div> 
		 		</div>
	 		</div>
		</section>
	</main>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>