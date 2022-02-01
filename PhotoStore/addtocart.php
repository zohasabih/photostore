<?php

    include "db_conn.php";
    $get_price = $_GET['price'];
    $get_src = $_GET['item'];
    $usr = "SELECT * FROM images WHERE img_src = '$get_src'";
    $res = mysqli_query($conn, $usr);
    $ans = mysqli_fetch_assoc($res);
    $cust = $ans['username'];
    $sql = "INSERT INTO temp_img VALUES ('$get_src', '$get_price', '$cust')";
    mysqli_query($conn, $sql);
    header("Location: shopping-cart.php");
?>