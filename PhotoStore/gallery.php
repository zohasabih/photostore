<!DOCTYPE html>
<html lang="en">
<head>
  <title>PhotoStore - Gallery</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="shortcut icon" href="assets/images/logo.png">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/972b03b0ac.js" crossorigin="anonymous"></script>
  <style>
      .gallery-heading {
        font-size: 36px;
        color: #3a8bcd;
        font-family: 'Circular-Loom';
        text-align: center;
      }
      .gallery-header {
          text-align: center;
      }
  </style>
</head>
<body>


<br> <br>
<div class="container">
    <div class="gallery-header">
        <h1 class="gallery-heading">Image Gallery</h1>
    </div>
  <hr>
  <div>
    <a href="index.php">
      <i class="fa fa-times" style="float: right; font-size: 20px;" aria-hidden="true"></i>
    </a>
  </div>
  <br>
  <br>
  <?php
    session_start();
    include "db_conn.php";
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM images WHERE username = '$username'";
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) > 0) {
        while($images = mysqli_fetch_assoc($res)) {
            $del_link = $images['img_src'];
  ?>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="uploads/<?=$images['img_src']?>" target="_blank">
        <img src="uploads/<?=$images['img_src']?>" style="width: 100%">
        </a>
        <div class="caption" style="text-align: center;">
            <a href="delete-function.php?delete=<?php echo $del_link ?>">
                <i class="fa fa-trash-o" aria-hidden="true"></i>
            </a>
          </div>
      </div>
    </div>
    <?php
        } } ?>
</div>

</body>
</html>