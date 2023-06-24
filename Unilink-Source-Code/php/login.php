<?php
session_start();
if(isset($_POST['submit'])){
	$_SESSION['meterid']=$_POST['meterID'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Unilink</title>
	<link rel="stylesheet" href="../css/login.css">
</head>
<body>
	<div class = "hero">
		<div class = "form-box">
		<div class = "button-box">
			<div id = "btn"></div>
			<button type = "button" class = "toggle-btn" onclick="login()">Log In</button>
			<button type = "button" class = "toggle-btn" onclick = "register()">Register</button>
			</div>
			<form action = "views/login.inc.php" id = "login" class = "input-group" method="post">
				<input type="text" id="meterID" class = "input-field" name="meterID" placeholder="MeterID" required>
				<input type="password" class = "input-field" name="Password" placeholder="Password" required>
				<button type="submit" name = "submit" class="submit-btn">Login</button>
			</form>
			<form action = "views/signup.inc.php" id = "register" class = "input-group" method="post">
				<input type="text" class = "input-field" name="name" placeholder="First Name" required>
				<input type="email" class = "input-field" name="email" placeholder="Email" required>
				<input type="text" class = "input-field" name="meterID" placeholder="Meter ID" required>
				<input type="text" class = "input-field" name="mobile" placeholder="Mobile Number" required>
				<input type="text" class = "input-field" name="adress" placeholder="Adress" required>
				<input type="password" class = "input-field" name="password" placeholder="Password" required>
				<input type="password" class = "input-field" name="reppassword" placeholder="Repeat Password" required>
				<button type="submit" name = "submit" class="submit-btn">Register</button>
				<div class="form-group">
				<input type="checkbox" name="agree"/> By checking this box, you give us consent to store and process your personal information inaccordance with <a href="views/privacy-policy.php">Privacy Policy.</a>
				</div>
				
			</form>
		</div>
	</div>
	<script>
		var x = document.getElementById("login");
		var y = document.getElementById("register");
		var z = document.getElementById("btn");

		function register(){
			x.style.left = "-400px";
			y.style.left = "50px";
			z.style.left = "110px";
		}

		function login(){
			x.style.left = "50px";
			y.style.left = "450px";
			z.style.left = "0px";
		}
	</script>
</body>
</html>