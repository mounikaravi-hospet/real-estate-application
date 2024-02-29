<?php 
          $sql = "SELECT * FROM images WHERE houseId=$houses['id']";
          $res = mysqli_query($conn,  $sql);

          if (mysqli_num_rows($res) > 0) {
          	while ($images = mysqli_fetch_assoc($res)) {  ?>
             
             <div class="alb">
             	<img src="uploads/<?=$images['imgFileName']?>">
             </div>
          		
<?php } }?>

<?php
if(isset($_POST["addImgBtn"])){
    $sql = "SELECT MAX(id) FROM houses LIMIT 1";
    $res = mysqli_query($conn,  $sql);
    $houseId = $res['id'];

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
            VALUES('$houseId','$new_img_name')";
    mysqli_query($conn, $sql);
    header("Location:seller.php");
    }
?>

    <!-- <form method="POST" action = "" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" name="addImgBtn" id="addImgBtn" value="Upload">
	</form> -->





   <?php include "db_conn.php"; ?>
    <?php include "sellerAddHouse.php"; ?>  
    <?php include "sellerDisplayHouse.php"; ?>  


    <?php
    $bed=$_POST["bedrooms"];
    $bath=$_POST["bathrooms"];
    $price=$_POST["price"];
    $city=$_POST["city"];
    $zip = $_POST["zipCode"];
    $housename = $_POST["houseName"];

    // insert into HOUSES table
    $sql10 = "INSERT INTO houses (sellerId, houseName,bedrooms, bathrooms,price,city,zipCode) VALUES ('$_SESSION['user_id']','$houseName', $bed, $bath, $price','$city','$zip')";
    ?>
    <h1><?=$sql10 ?></h1>
    <?php
    mysqli_query($conn, $sql10);
    header("Location: seller.php");

?>



mysqli_query($conn, $sql10);
    header("Location: seller.php");

<?

$sql = "select * from houses where bedrooms=" . $bedrooms . 
" AND bathrooms = " . $bathrooms ."  AND price>" . $plow . 
" AND price<" . $phigh . 
" AND sellerId in (select userId from members) 

UNION ALL 

SELECT * FROM houses WHERE bedrooms=" . $bedrooms . 
" AND bathrooms = " . $bathrooms ."  AND price>" . $plow . 
" AND price<" . $phigh. " 
AND sellerId NOT IN (select userId from members)";
