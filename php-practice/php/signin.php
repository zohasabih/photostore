<?php
    include "db_conn.php";
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = "SELECT username, password FROM users WHERE username = '$username' AND password = '$password'";
    if($result = mysqli_query($conn, $sql)) {
        if(mysqli_num_rows($result) == 0) {
            echo "<script language='javascript' type='text/javascript'>alert('Incorrect credentials!');  
                    </script>";
            echo "<meta http-equiv='refresh' content='1; URL=../html/signin.html'>";
        }
        else {
            session_start();
            $_SESSION['username'] = $_POST['username'];
            header("Location: ../index.html");
        }
    }
?>