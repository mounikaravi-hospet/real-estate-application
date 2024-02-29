<?php include "db_conn.php"; ?>
<?php

session_start();
    $bed=$_POST["bedrooms"];
    $bath=$_POST["bathrooms"];
    $price=$_POST["price"];
    $city=$_POST["city"];
    $zip = $_POST["zipCode"];
    $housename = $_POST["houseName"];
    $uid = $_SESSION['user_id'];
    // insert into HOUSES table
    $sql10 = "INSERT INTO houses (sellerId, houseName,bedrooms,bathrooms,price,city,zipCode) 
    VALUES ('$uid', '$housename', '$bed', '$bath', '$price', '$city', '$zip')";
    mysqli_query($conn, $sql10);
    header("Location: seller.php");
?>



