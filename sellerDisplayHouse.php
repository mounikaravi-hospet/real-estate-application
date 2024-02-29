<?php

$sql0 = "SELECT * FROM houses WHERE sellerId=" . $_SESSION['user_id'];
$res = mysqli_query($conn,  $sql0);

if (mysqli_num_rows($res) > 0) {
    while ($houses = mysqli_fetch_assoc($res)) {
   
        $sql1 = "SELECT * FROM images WHERE houseId=" . $houses['id']; 
        $res1 = mysqli_query($conn,  $sql1);

        if (mysqli_num_rows($res1) > 0) {
            while ($image = mysqli_fetch_assoc($res1)) {  ?>
            <div class="container">
                <a href="sellerHouseDetails.php">
                <!-- <div class="left" style="display:inline-block;"> -->
                    <img class='houseImg' style="width:50%;" src="uploads/<?=$image['imgFileName']?>"></a>
                <!-- </div> -->
            <?php 
            } 
        }?>
        </div>

            <div class = "main" >
             <p>Bedrooms: <?=$houses['bedrooms']?></p>
             <p>Bathrooms: <?=$houses['bathrooms']?></p>
             <p>Price: <?=$houses['price']?></p>
             <p>City: <?=$houses['city']?></p>
             <p>Zip Code: <?=$houses['zipCode']?></p>
            <?php 
                $sql2 = "SELECT * FROM views WHERE houseId=".$houses['id']; 
                $res2 = mysqli_query($conn,  $sql2);
                $viewed = mysqli_num_rows($res2);
                $sql3 = "SELECT * FROM likes WHERE houseId=".$houses['id']; 
                $res3 = mysqli_query($conn,  $sql3);
                $liked = mysqli_num_rows($res3);              
            ?>
             <p>Viewed:  <?=$viewed?></p>
             <p>Liked:  <?=$liked?></p>
        </div>
        

        
    <?php 
    }  
    
    // header("Location: seller.php");
    
} 
?>