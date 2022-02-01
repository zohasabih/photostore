<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Bootstrap Simple Login Form with Blue Background</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="assets/css/signup.css">
</head>
<body>
<?php
			session_start();
			if(isset($_GET['login'])) {
			if($_GET['login'] == "error") { ?>
				<div class="alert alert-danger alert-dismissible">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Invalid!</strong> Incorrect username or password.
				</div>
			<?php } } ?>
<div class="signup-form" style="margin-top: 5%;">
    <form action="dbsignin.php" method="post">
		<?php
			if(isset($_GET['login'])) {
			if($_GET['login'] == "error") { ?>
				<div class="alert alert-danger alert-dismissible">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Invalid!</strong> This username already exists.
				</div>
			<?php }
			else if ($_GET['login'] == "emailerror") { ?>
				<div class="alert alert-danger alert-dismissible">
  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Invalid!</strong> This email already exists.
				</div>
			<?php }
			}
		?>
		<a href="index.php" style="font-size: 30px; float: right; color: #333333;">
			<i class="fa fa-times" aria-hidden="true"></i>
		</a>
		<br> <br>
		<h2>Sign In</h2>
		<p>Please fill in this form to log in!</p>
		<hr>
        <div class="form-group">
			<input type="text" class="form-control" name="username" id="username" placeholder="Username" required="required">
        </div>  
		<div class="form-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">
        </div>   
		<div class="form-group">
            <input type="submit" class="btn btn-primary btn-lg" placeholder="Sign Up" name="submit" id="submit">
        </div>
    </form>
	<div class="hint-text">Don't have an account? <a href="signup.php">Register here</a></div>
</div>
</body>
</html>