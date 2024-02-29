<html>
    <head>
        <title> you liked these houses </title>
        <link rel="stylesheet" href="./styles/liked.css">
    </head>
    <style>
        h1{
            text-align: center;
            margin-top: 10%;
        }
        .gopick{
            width: 100%;
            height:400px;
            margin-top: 20%;
            text-align: center;
            font: 3em sans-serif;
        }
        .mod{
    display: flex;
    align-items: center;
    height:300px;
    }
    .inner{
        text-align: center;
        font: 3em sans-serif;
        width: 100%;
    }

    </style>
<body>
    
<?php include "db_conn.php"; ?>
<?php 
session_start();

// $sql = "SELECT * FROM houses WHERE bedrooms=" . $bedrooms . " AND bathrooms = " . $bathrooms ."AND price > " .$plow . "AND price<" . $phigh;
$sql = "SELECT houseId,bedrooms,bathrooms,price,zipCode,city FROM likes,houses WHERE likes.userId=" . $_SESSION['user_id'] . " AND likes.houseId=houses.id";
$res = mysqli_query($conn,  $sql);

//getting $liked, $viewed


if (mysqli_num_rows($res) > 0) {
?>
<div class='mod'><p class='inner'>You have liked these houses.</p></div>
<?php

while ($houses = mysqli_fetch_assoc($res)) {

    $sql1 = "SELECT * FROM images WHERE houseId=".$houses['houseId']." LIMIT 1"; // error
    $res1 = mysqli_query($conn,  $sql1);

    if (mysqli_num_rows($res1) > 0) {
    while ($image = mysqli_fetch_assoc($res1)) {  ?>
    <div class="container">
        <div class="left">
            <a href='buyerHouseDetails.php'>
        <img class='houseImg' src="uploads/<?=$image['imgFileName']?>"></a>
        </div>
    <?php } }?>

    <div class='right'>
        <p>Bedrooms: <?=$houses['bedrooms']?></p>
        <p>Bathrooms: <?=$houses['bathrooms']?></p>
        <p>Price: <?=$houses['price']?></p>
        <p>City: <?=$houses['city']?></p>
        <p>Zip Code: <?=$houses['zipCode']?></p>

    </div>
    </div>
<?php } } 
 else{?>
    <div class='likehouse'>
     <h1 style="font-size:3em;">You have not liked any houses yet.</h1>
    </div>
     <div class='gopick'><a href='buyer.php'> Go Pick Some!</a></div>
     <?php
 }
?>
    </body>
    </html>