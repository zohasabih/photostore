<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&amp;family=Poppins:wght@200;300;600;700&amp;display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/972b03b0ac.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="./Assets/logo.png">
    <link rel="stylesheet" href="../Css/signin.css">
    <title>PhotoStore</title>

</head>
<body>
<div class="box">
  <!-- Navigation bar beginning  -->
  <header>
  <section> 
    <nav class="navbar navbar-expand-lg navbar-dark bg-color ">
        <a class="navbar-brand title-nav" href="/index.html"><span>PhotoStore</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse js" id="navbarText">
          <ul class="navbar-nav">
            <li class="nav-item" >
              <a class="nav-link" href="#">About </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" target="_blank" rel="noopener noreferrer" >Contact</a>
            </li>
          </ul>
        </div>
    </nav>
  </section>
  </header>
  <!-- Navigation bar end -->

  <div class="card text-center">
    <?php  if(isset($_GET['error'])): ?>
    <p><?php echo $_GET['error']; ?></p>
    <?php endif ?>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
      <h3>Select Image File to Upload:</h3> <br/>
      <input type="file" name="my_image">
      <input type="submit" name="submit" value="Upload">
    </form>

  </div>

 
  <!-- Landing page footer beginning  -->
  <footer>
    <section class=" d-flex justify-content-center bg-color">
      <p>
       created by zohosquad
      </p>
    </section>
  </footer>

  <!-- Landing page footer end  -->

</div>
</body>
</html>

