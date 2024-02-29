<?php
session_start();
?>
<?php include "db_conn.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/seller.css">
    <link rel="stylesheet" href="./styles/common.css">
    <link rel="stylesheet" href="./styles/forms.css">
    <title>Seller Dashboard</title>
</head>
<body>
	<a href="logout.php">
        <button class="btn logout">
            Logout
        </button>
    </a>
    <h1>Seller Dashboard seller id: <?=$_SESSION['user_id']?></h1>
    <div id="box">
        <form method="POST" action="sellerAddHouse.php">
            <div class="formName">New House</div>
                <p>bedrooms: <input name="bedrooms" type="text"></p>
                <p>bathrooms: <input name="bathrooms" type="text"></p>
                <p>price: <input name="price" type="text"></p>
                <p>city: <input name="city" type="text"></p>
                <p>zip code: <input name="zipCode" type="text" value="30303"></p>	
                <p>house name: <input name='houseName' type="text"></p>
                <input type="submit" id="addHouseBtn" class="btn add" name="addHouseBtn" value="Add house">
                <!-- <a href="seller.php"><input type="button" id="btn1"  value="Cancel"></a> -->
        </form>
    </div>
    
    <br /><br />
    <div class="textData">
        <form method="POST" action="sellerAddImg.php" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" name="addImgBtn" id="addImgBtn" class="btn upload" value="Upload">
        </form>  
        <br><br>
        Subscribe to have your houses appear at the top!
        <a href='sellerCreditCard.php'>
            <button class="btn add">
                Subscribe
            </button>
        </a>
    </div>
    <?php include "sellerDisplayHouse.php"; ?>

</body>
</html>

