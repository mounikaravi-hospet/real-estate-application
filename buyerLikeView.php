<?php 
    // Save Like to TABLE: LIKES.
    session_start();
    if(isset($_POST['likeBtn']))
    {
        $cur_usr_id = $_SESSION['user_id'];
        $cur_house_id = $_POST['curHouseId'];

        // Check if `like` exist
        $query = "SELECT * FROM likes WHERE houseId=" . $cur_house_id . " AND userId=" . $cur_usr_id;
        $result = mysqli_query($conn, $query);
       
        if(mysqli_num_rows($result) > 0){
            // echo "You already liked it.";
            header("Location: buyer.php");
            // header("Location: " . $_GET["continue"]);
            // header("location:".$_SERVER['REQUEST_URI']);
        }
        else{
            $query1 = "INSERT INTO likes (houseId,userId) VALUES('$cur_house_id','$cur_usr_id')";
            $result = mysqli_query($conn, $query1);
            
            if($result){
                // echo 'YOUR LIKES FOR THE HOUSE IS SAVED!';
                // echo('houseid:'.$cur_house_id.'<br />');
                // echo('usrid:'.$cur_usr_id);
                header("Location: buyer.php");
                // header("Location: " . $_GET["continue"]);
                // header($_SERVER['REQUEST_URI']);
                // header("location:".$_SERVER['REQUEST_URI']);
            }else{
                // echo 'not saved.';
                header("Location: buyer.php");
                // header("Location: " . $_GET["continue"]);
                // header($_SERVER['REQUEST_URI']);
                // header("location:".$_SERVER['REQUEST_URI']);
            }
        } 
        
    }

    if(isset($_POST['viewBtn']))
    {
        $cur_usr_id = $_SESSION['user_id'];
        $cur_house_id = $_POST['curHouseId'];

        // Check if `like` exist
        $query = "SELECT * FROM views WHERE houseId=" . $cur_house_id . " AND userId=" . $cur_usr_id;
        $result = mysqli_query($conn, $query);
       
        if(mysqli_num_rows($result) ==0){
            $query1 = "INSERT INTO views (houseId,userId) VALUES('$cur_house_id','$cur_usr_id')";
            $result = mysqli_query($conn, $query1);
            
            if($result){

                header("Location: buyer.php");

            }else{
                header("Location: buyer.php");
            }
        } 
    }
    ?>