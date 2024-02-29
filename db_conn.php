<?php
// session_start();

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "project4";
$servername = "localhost";
$username = "mhospet1";
$password = "mhospet1";
$dbname = "mhospet1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
  }
?>