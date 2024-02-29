<?php include "db_conn.php"; ?>

<?php
$img_name = $_FILES['fileToUpload']['name'];
$img_size = $_FILES['fileToUpload']['size'];
$tmp_name = $_FILES['fileToUpload']['tmp_name'];
$error = $_FILES['fileToUpload']['error'];
$houseId = $_POST['houseId'];

$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
$img_ex_lc = strtolower($img_ex);
$new_img_name = uniqid("IMG-",true) . '.' . $img_ex_lc; 
$img_upload_path = 'uploads/'.$new_img_name;
move_uploaded_file($tmp_name, $img_upload_path);
// Insert into Database
$sql = "INSERT INTO images (houseId,imgFileName) 
        VALUES('$houseId','$new_img_name')";
mysqli_query($conn, $sql);
header("Location: view.php");




// $house_name = &_POST('houseName'); 

// if ($error===0){
//     if ($img_size > 1250000){
//         $em = "Sorry, your file is too large."
//         header("Location:image.php?error=$em");
//     } else{
//         $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
//         $img_ex_lc = strtolower($img_ex);
//         $allowed_exs = array("jpg",'jpeg','png');

//         if (in_array($img_ex_lc,$allowed_exs)){
//             $new_img_name = uniqid("IMG-",true) . '.' . $img_ex_lc; 
//             $img_upload_path = 'uploads/'.$new_img_name;
// 			move_uploaded_file($tmp_name, $img_upload_path);
//             // Insert into Database
//             $sql = "INSERT INTO images(houseName,imgFileName) 
//                     VALUES('housename','$new_img_name')";
//             mysqli_query($conn, $sql);
//             header("Location: view.php");
//         } else{
//             $em = "You can't upload files of this type!"
//             header("Location:image.php?error=$em");
//         }
//     }
// }
// else{
//     $em = "unknow error occurred!"
//     header("Location:image.php?error=$em");
// }

?>