<?php
    include "db_conn.php";
    $username = $_POST['username'];
    $display_name = $_POST['display_name'];
    $password = $_POST['password'];
    $date_created = date("Y-m-d");
    $email = $_POST['email'];
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) > 0) {
        while($users = mysqli_fetch_assoc($res)) {
            if($users['username'] == $username) {
               header("Location: signup.php?login=error");
            }
            if($users['email'] == $email) {
                header("Location: signup.php?login=emailerror");
            }
        }
    }
    else {
        $sql_insert = "INSERT INTO users VALUES ('$username', '$password', '$date_created', '$display_name', '$email')";
        mysqli_query($conn, $sql_insert);
        session_start();
        $_SESSION['username'] = $username;
        header("Location: index.php?login=success");
    } 
?>