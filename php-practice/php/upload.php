<?php

    if(isset($_POST['submit']) && isset($_FILES['my_image'])) {
        include "db_conn.php";

        echo "<pre>";
        print_r($_FILES['my_image']);
        echo "</pre>";
        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];

        if($error === 0) {
            if($img_size > 125000) {
                $em = "Sory, your file is too large!";
                header("Location: uploadindex.php?error=$em");
            }
            else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array("jpg", "jpeg", "png");
                if(in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid ("IMG-", true). '.' . $img_ex_lc;
                    $img_upload_path = '../uploads/' . $new_img_name;
                    echo "$img_upload_path";
                    move_uploaded_file($tmp_name, $img_upload_path);
                    
                    //Insert into Database
                    $sql = "INSERT INTO images(img_src, username)
                            VALUES ('$new_img_name', 'zohasabih')";
                    mysqli_query($conn, $sql);
                    header("Location: view.php");
                }
                else {
                    $em = "You can't upload files of this type!";
                    header("Location: uploadindex.php?error=$em");
                }
            }
        }
        else {
            $em = "Unknown error occurred!";
            header("Location: uploadindex.php?error=$em");
        }
    } 
    else {
        header("Location: uploadindex.php");
    }
?>