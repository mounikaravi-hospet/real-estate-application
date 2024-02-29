<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$fName = $_POST['fName'];
		$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
		$user = $_POST['user'];
		$password = strip_tags($_POST['password']);
		$cPassword = $_POST['confirmPassword'];

		$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

		if($password != $cPassword){
			$passwordError = "Passwords do not match";
		}

		if(empty($email)){
			$errMsg[0][] = "Email is required";
		}

		if(empty($fName)){
			$errMsg[1][] = "Name is required";
		}

		if (preg_match('~[0-9]+~', $fName)) {
			$errMsg[1][] = "Name cannot contain numbers";
		}		

		if(empty($password)){
			$errMsg[2][] = "Password is required";
		}
		if(strlen($password) < 6){
			$errMsg[2][] = "Password must be at least 6 characters";
		}

		if(empty($user)){
			$errMsg[3][] = "Usage is required";
		}

		$checkUser = "select * from users where email = '$email' limit 1";
		$result = mysqli_query($conn, $checkUser);

		if($result)
		{
			if($result && mysqli_num_rows($result) > 0)
			{

				$user_data = mysqli_fetch_assoc($result);
				
				if($user_data['email'] === $email)
				{
					$errMsg[0][] = "Email is already in use, choose another one or login instead";
				}
			}
		}
		if(empty($passwordError) && empty($errMsg))
		{
			//save to database
			if($user=='buyer'){
				$query = "insert into users (fullName, email, user, password, isBuyer) values ('$fName', '$email', '$user', '$hashedPwd', 1)";
			}
			if($user=='seller'){
				$query = "insert into users (fullName, email, user, password, isSeller) values ('$fName', '$email', '$user', '$hashedPwd', 1)";
			}			
			



			mysqli_query($conn, $query);

			header("Location: login.php");
			die;
		}

	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" href="./styles/forms.css">
	<link rel="stylesheet" href="./styles/common.css">
</head>
<body>
	<?php include("./navigation.php") ?>
	<div id="box">		
		<form method="post">
			<div class="formName">Signup</div>

			<?php 
				if(isset($err)){
					echo "<p class = 'errorMessage'>".$err."<p/>";
					echo "<br>";
				}
			?>
			<input id="email" type="text" name="email" placeholder="Enter your email id" class="formInput"><br><br>
			<?php 
				if(isset($errMsg[0])){
					foreach($errMsg[0] as $emailErrors){
						echo "<p class = 'errorMessage'>".$emailErrors."<p/>";
					}
				}
			?>
			<input id="fName" type="text" name="fName" placeholder="Enter your Full Name" class="formInput"> <br><br>
			<?php 
				if(isset($errMsg[1])){
					foreach($errMsg[1] as $nameErrors){
						echo "<p class = 'errorMessage'>".$nameErrors."<p/>";
					}
				}
			?>
			<label for="user">Please select your usage:</label>
			<div class="select">
			<select name="user" id="user">
				<option value="">None</option>
				<option value="buyer">Buyer</option>
				<option value="seller">Seller</option>
			</select> 
			</div>
			<br>
			<?php 
				if(isset($errMsg[3])){
					foreach($errMsg[3] as $userErrors){
						echo "<p class = 'errorMessage'>".$userErrors."<p/>";
					}
				}
			?>
			<input id="password" type="password" name="password" placeholder="Enter a Password" class="formInput"><br><br>
			<?php 
				if(isset($errMsg[2])){
					foreach($errMsg[2] as $pwdErrors){
						echo "<p class = 'errorMessage'>".$pwdErrors."<p/>";
					}
				}
			?>
			<input id="confirmPassword" type="password" name="confirmPassword" placeholder="Re-enter your password" class="formInput"><br><br>
			<?php 
				if(isset($passwordError)){
					echo "<p class = 'errorMessage'>".$passwordError."<p/>";
					echo "<br><br>";
				} 
			?>
			<input id="button" type="submit" value="Signup"><br><br>
			<span class="small-text">Already a member? </span> <a href="login.php">Login</a> <span class="small-text">instead</span> <br><br>
		</form>
	</div>
</body>
</html>