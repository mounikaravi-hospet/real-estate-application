 <?php include("db_conn.php");?>
<?php 

session_start();

	
	include("functions.php");

	// $conn = new mysqli('localhost', 'root', '','project4');
	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($password) && !is_numeric($email))
		{

			$query = "select * from users where email = '".$email."' limit 1";
			$result = mysqli_query($conn, $query);
			

			if($result)
			{
				if(mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					$userType = $user_data['user'];
					// echo $userType;
					if(password_verify($password, $user_data['password']) == 1)

					{
						if($userType === 'buyer'){
							$_SESSION['user_id'] = $user_data['id'];
							header("Location: buyer.php");
							die;
						}

						if($userType === 'seller'){
							$_SESSION['user_id'] = $user_data['id'];
							header("Location: seller.php");
							die;
						}		
						
						if($userType === 'admin'){
							$_SESSION['user_id'] = $user_data['id'];
							header("Location: admin.php");
							die;
						}
					}
				}
			}
			else{
			echo "wrong username or password";
			$err = "wrong username or password!";
			}
		}
		else
		{
			echo "wrong username or password";
			$err = "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="./styles/forms.css">
	<link rel="stylesheet" href="./styles/common.css">

</head>
<body>

<?php include("./navigation.php") ?>

	<div id="box">
		
		<form method="post" style="margin-top:30%;">
			<div class="formName">Login</div>

		

			<input id="text" type="email" name="email" placeholder="Enter your email id"><br><br>
			<?php 
				if(isset($err)){
					echo "<p class = 'errorMessage'>".$err."<p/>";
					echo "<br>";
				}
			?>
			<input id="text" type="password" name="password" placeholder="Enter your password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<span class="small-text">New here? </span> <a href="signup.php">Sign Up</a> <br><br>
		</form>
	</div>
</body>
</html>