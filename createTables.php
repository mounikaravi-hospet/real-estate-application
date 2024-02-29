<?php

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "project4";

$servername = "localhost";
$username = "mhospet1";
$password = "mhospet1";
$dbname = "mhospet1";


// Create connection
$conn = new mysqli($servername,$username,$password,$dbname);

// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

// Create User model
$sql = "CREATE TABLE users (id int(5) primary key auto_increment, 
email varchar(100) not null, fullName varchar(50) not null, 
user varchar(20), password char(255) not null, 
isSeller boolean default 0, 
isBuyer boolean default 0, 
isAdmin boolean default 0)";
if ($conn->query($sql) === TRUE) {
     echo "<br>Tables users created successfully";
} else {
	echo "<br>Error in creating table USERS: " . $conn->error;
}

//Create Houses model
$sql = "CREATE TABLE if not exists houses (id int(5) primary key auto_increment, houseName varchar(40) not null, sellerId int(5) not null, 
addr varchar(100), bedrooms int(5), bathrooms int(5), price int(20), city varchar(100), zipCode int(9))";
if ($conn->query($sql) === TRUE) {
     echo "<br>Tables houses created successfully";
} else {
	echo "<br>Error in creating table HOUSES: " . $conn->error;
}

//Create Images model
$sql = "CREATE TABLE if not exists images (id int(5) primary key auto_increment, houseId int(10), imgFileName varchar(200))";
if ($conn->query($sql) === TRUE) {
     echo "<br>Tables IMAGES created successfully";
} else {
	echo "<br>Error in creating table IMAGES:  " . $conn->error;
}

//Create Likes model
$sql = "CREATE TABLE if not exists likes (id int(5) primary key auto_increment, houseId int(5) not null, 
userId int(5) not null)";
if ($conn->query($sql) === TRUE) {
     echo "<br>Tables likes created successfully";
} else {
	echo "<br>Error in creating table LIKES: " . $conn->error;
}

//Create Views model
$sql = "CREATE TABLE if not exists views (id int(5) primary key auto_increment, houseId int(5) not null, 
userId int(5) not null)";
if ($conn->query($sql) === TRUE) {
     echo "<br>Tables views created successfully";
} else {
	echo "<br>Error in creating table VIEWS:  " . $conn->error;
}


$conn->close();
?>