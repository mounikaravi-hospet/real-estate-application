<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/navigation.css">
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="./home.php" class="active">
      <span id="logo">H</span>
  </a>
  <a href="./about.php">About</a>
  <a href="./contact.php">Contact</a>
  <a href="./signup.php">Signup</a>
  <a href="./login.php">Login</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>



<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

</body>
</html>