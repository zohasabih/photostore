<?php
    if(isset($_GET['logout'])) {
        session_start();
        session_unset();
        session_destroy();
        header("Location: index.php");
    }
    else {
        include "db_conn.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $res = mysqli_query($conn, $sql);
    if(mysqli_num_rows($res) > 0) {
        while($users = mysqli_fetch_assoc($res)) {
            if($users['username'] == $username) {
                session_start();
                $_SESSION['username'] = $username;
                header("Location: index.php?login=success");
            }
        }
    }
    else {
       header("Location: signin.php?login=error");
    }
    }
    
?>