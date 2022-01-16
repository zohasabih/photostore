<?php

    $sname = "localhost";
    $uname = "zoha";
    $password = "zoha";
    $db_name = "photostore";
    $conn = mysqli_connect($sname, $uname, $password, $db_name);

    if(!$conn) {
        echo ("Connection failed!");
        exit();
    }

?>