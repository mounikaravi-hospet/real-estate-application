<?php 

// obtain Form data
if(isset($_POST['submit']) && isset($_POST['bedrooms'])){
    $_SESSION["plow"] = $_POST['price_low'];
    $_SESSION['phigh'] = $_POST['price_high'];
    $_SESSION['bedrooms'] = $_POST['bedrooms'];
    $_SESSION['bathrooms'] = $_POST['bathrooms'];
    $plow = $_POST['price_low'];
    $phigh = $_POST['price_high'];
    $bedrooms = $_POST['bedrooms'];
    $bathrooms = $_POST['bathrooms'];
}
else{
    $plow = $_SESSION['plow'];
    $phigh = $_SESSION['phigh'];
    $bedrooms = $_SESSION['bedrooms'];
    $bathrooms = $_SESSION['bathrooms'];       
}

$sql = "select * from houses where bedrooms=" . $bedrooms . " AND bathrooms = " . $bathrooms ."  AND price>" . $plow . " AND price<" . $phigh . " AND sellerId in (select userId from members) UNION ALL SELECT * FROM houses WHERE bedrooms=" . $bedrooms . " AND bathrooms = " . $bathrooms ."  AND price>" . $plow . " AND price<" . $phigh. " AND sellerId NOT IN (select userId from members)";

// $sql2 = "SELECT * FROM houses WHERE bedrooms=" . $bedrooms . " AND bathrooms = " . $bathrooms ."  AND price>" . $plow . " AND price<" . $phigh. " AND sellerId NOT IN (select userId from members)";

$res = mysqli_query($conn,  $sql);

//getting $liked, $viewed


if (mysqli_num_rows($res) > 0) {
while ($houses = mysqli_fetch_assoc($res)) {

    $sql1 = "SELECT * FROM images WHERE houseId=".$houses['id']." LIMIT 1"; // error
    $res1 = mysqli_query($conn,  $sql1);

    if (mysqli_num_rows($res1) > 0) {
    while ($image = mysqli_fetch_assoc($res1)) {  ?>
    <div class="container">
        <div class="left">
            <a href='buyerHouseDetails.php'> 
                <img class='houseImg' src="uploads/<?=$image['imgFileName']?>">
            </a>
        </div>
    <?php } }?>

    <div class='right'>
        <p>Bedrooms: <?=$houses['bedrooms']?></p>
        <p>Bathrooms: <?=$houses['bathrooms']?></p>
        <p>Price: <?=$houses['price']?></p>
        <p>City: <?=$houses['city']?></p>
        <p>Zip Code: <?=$houses['zipCode']?></p>
        <form method="POST">
            <input type="hidden" name="curHouseId" value="<?= $houses['id']?>" />
            <button name='likeBtn' id='likeBtn' class="btn like" value='like' type='submit'>Like</button>
            <button name='viewBtn' id='viewBtn' class="btn view" value='mark as viewed' type='submit'>Mark as Viewed</button>
        </form>
    </div>
    </div>
<?php } } ?>