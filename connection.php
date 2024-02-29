<?php
// $host = "localhost";
// $user = "root";
// $pass = "";
// $dbname = "project4";
$host = "localhost";
$user = "mhospet1";
$pass = "mhospet1";
$dbname = "mhospet1";
// mhospet1

//create connection
$conn = new mysqli($host,$user,$pass,$dbname);
if ($conn->connect_error){
    echo "could not connect to server\n";
    die("connection failed: " . $conn->connect_error);
}
?>