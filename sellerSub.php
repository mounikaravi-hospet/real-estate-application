<?php include 'db_conn.php';?>
<?php
   session_start();

   $uid = $_SESSION['user_id'];
   // insert into MEMBERS table

   $sql10 = "INSERT INTO members (userId) VALUES ('$uid')";
   mysqli_query($conn,  $sql10);
   header("Location: seller.php");

?>