<?php include "db_conn.php" ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Gallery</title>
    </head>
    <body>
        <a href="uploadindex.php">&#8592;</a>
        <?php
            $sql = "SELECT * FROM images ORDER BY img_id DESC";
            $res = mysqli_query($conn, $sql);

            if(mysqli_num_rows($res) > 0) {
                while($images = mysqli_fetch_assoc($res)) { ?>

                <div class= "alb">
                    <img src="../uploads/<?=$images['img_src']?>">
                </div>
            

        <?php } } ?>
    </body>
</html>