<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
</head>
<body>
	<a href="logout.php">Logout</a>
    <h1>Seller Dashboard</h1>
    <!--  -->
    <form method="POST" action = "addImage.php" enctype="multipart/form-data">
            Select image to upload:
            <p>house id: <input type='number' name='houseId'></p>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" name="submit" id="btn2" value="Upload">
	</form>
</body>
</html>