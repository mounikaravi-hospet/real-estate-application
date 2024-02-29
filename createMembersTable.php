<?php include "db_conn.php";?>
<?php
$sql = "CREATE TABLE members (id int(5) primary key auto_increment, 
userId int(5))";

if ($conn->query($sql) === TRUE) {
     echo "<br>Tables MEMBERS created successfully";
} else {
	echo "<br>Error in creating table MEMEBERS " . $conn->error;
}

?>