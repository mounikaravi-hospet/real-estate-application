<?php include "db_conn.php"; ?>
<?php
    $sql111 = "SELECT * FROM houses ORDER BY id DESC LIMIT 1";
    $res111 = mysqli_query($conn,  $sql111);
    while ($houses = mysqli_fetch_assoc($res111)) {
        $hid = $houses['id'];
    }


    $img_name = $_FILES['fileToUpload']['name'];
    $img_size = $_FILES['fileToUpload']['size'];
    $tmp_name = $_FILES['fileToUpload']['tmp_name'];
    $error = $_FILES['fileToUpload']['error'];

    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);
    $new_img_name = uniqid("IMG-",true) . '.' . $img_ex_lc; 
    $img_upload_path = 'uploads/'.$new_img_name;
    move_uploaded_file($tmp_name, $img_upload_path);
    // Insert into Database
    $sql = "INSERT INTO images (houseId,imgFileName) 
            VALUES('$hid','$new_img_name')";
    mysqli_query($conn, $sql);
    header("Location: seller.php");


?>
