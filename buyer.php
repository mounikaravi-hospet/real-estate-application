<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Dashboard</title>
    <link rel="stylesheet" href="./styles/buyer.css">
    <link rel="stylesheet" href="./styles/common.css">



</head>
<body>
	<a href="logout.php">
        <button class="btn logout">
        Logout
        </button>
    </a>
    <h1>Buyer Dashboard</h1>
    <form method="POST" action="">
        <label for="bedrooms">Bedrooms:</label>
        <input type="text" id="bedrooms" name="bedrooms" type="number" maxlength="4">
        <label for="bathrooms">Bathrooms:</label>
        <input type="text" id="bathrooms" name="bathrooms" type="number" maxlength="4">
        <label for="price_low">Price greater than:</label>
        <input type="text" id="price_low" name="price_low" type="number" maxlength="10">
        <label for="price_high">Price lower than:</label>
        <input type="text" id="price_high" name="price_high" type="number" maxlength="10">
        <input type="submit" name="submit" id="btn2" class="btn search" value="Search">
    </form>
    <br /><br />
    <a href='buyerLiked.php'> 
        <button class="btn view">
        Show Your Liked Houses
        </button>    
    </a>
    <br /><br />
    <?php include "db_conn.php"; ?>
    <?php include "buyerLikeView.php"; ?>
    <?php include "buyerDisplayHouse.php"; ?>

    
</body>
</html>