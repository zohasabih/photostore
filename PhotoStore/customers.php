<?php
    include "db_conn.php";
    session_start();
    $customer = $_SESSION['username'];
    $date_bought = date("Y-m-d");
    $sql = "SELECT * FROM temp_img";
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) > 0) {
        while($results = mysqli_fetch_assoc($res)) {
            $src = $results['img_src'];
            $usr = $results['username'];
            $ins = "INSERT INTO customers VALUES ('$customer', '$src', '$date_bought', '$usr')";
            echo $ins;
            mysqli_query($conn, $ins);
        }
        $del = "DELETE FROM temp_img";
        mysqli_query($conn, $del);
        header("Location: index.php");
    }
?>