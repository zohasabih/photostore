<?php
    include "db_conn.php";
    $lnk = $_GET['delete'];
    $sql = "DELETE FROM images WHERE img_src = '$lnk'";
    mysqli_query($conn, $sql);
    header("Location: gallery.php");
?>