
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>credit card info form</title>
		<link rel="stylesheet" href="./styles/forms.css">
		<link href="./styles/common.css" type="text/css" rel="stylesheet" />
		<link rel="stylesheet" href="./styles/seller.css">
		<style>
			body,h1{
				text-align: center;
			}
			.sub{
				text-align:center;
				width:100%;
				height:300px;
				border-width: 1cm;
				margin-top: 30%;
			}
		</style>
	</head>
	
	<body>
		<div class='sub'>
		<h1> Subscribe Today!</h1>
		<form method="post" action="sellerSub.php">
		<input type='submit' class="btn upload" name='sub' value='Try Subscription now!'/>
        </form>	
</div>
		<div class='creditcard' >
		<h1>Add your credit card information here. </h1>

<div id="box">
<form action="sellerCC.php" method="post"> 
		<dl>
			<dt>Name</dt>
			<dd>
				<input name="visitor_name" size="64" type="text"> 
			</dd>
			
			<dt>Credit Card</dt>
			<dd>
				<input name="visitor_credit_card" size="64" type="text"> <br>
				<input type="radio" id="visa" name="payment_method" value="visa">
				<label for="visa">Visa</label>
				<input type="radio" id="mastercard" name="payment_method" value="masterCard">
				<label for="mastercard">MasterCard</label>
				<input type="radio" id="discover" name="payment_method" value="discover">
				<label for="discover">Discover</label>
			</dd>
			<dt>CVV</dt>
			<dd>
				<input name="cvv" size="64" type="text"> 
			</dd>
		</dl>
		<input type='submit' class="btn add" style="font-size: medium;width: auto;">
		</form>
</div>
</div>


		<div style="text-align: center;color: darkgray;margin:0 20px;font-size: 1.3em;">
			welcome to housie.
		</div>
	</body>
</html>