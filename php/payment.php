<?php

session_start();
if(isset($_SESSION["user_name"])) {
}else{
	header("Location:login.php");
}
?>

<!DOCTYPE html>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
<link rel="stylesheet" href="../css/payment.css">


<head>
	
	<?php include('includes/header.php'); ?>
		
</head>

<body>

	
	
	<div class="box">
		<h1>Payment Details</h1>	
		<div class="payment_method">
			<label class="method card" for='card'>
			<div class="radio-input">
            	<input id="card" type="radio" name="payment">
				Credit/Debit card
        	</div>
			</label>

			<label class="method cash" for='cash'>
			<div class="radio-input">
            	<input id="cash" type="radio" name="payment">
				Cash On Delivery
        	</div>
			</label>
		</div>

		<div class="payment_details">
			<div class="card_details">
				<p>Card Number</p>
				<input type="text" class="inputbox" name="cardnumber" value="1234567890" required />

				<p>Cardholder Name</p>
				<input type="text" class="inputbox" name="name" value="John" required />

				<div class="w3-row-padding">
					<div class="date_cvv w3-half">
						<p>Expiry Date</p>
						<input type="number" id="date" placeholder="MM / YY" required />
					</div>
					<div class="date_cvv w3-half">
						<p>CVV*</p>
						<input type="number" class="inputbox" name="cvv" required />

					</div>
				</div>
			</div>
		</div>
		<p></p>
		<center><div class="buttons">
		  <input type="submit" name="submit" value="Cancel" class="btn back-btn" onclick="location.href='product.php'">
		  <input type="button" name="submit" value="Pay" class="btn pay-btn" >
    	</div></center>
		
		<script src="../js/product.js"></script>
	</div>
	
</body>