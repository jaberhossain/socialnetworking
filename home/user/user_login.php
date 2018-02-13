<?php
	session_start();
	if(isset($_SESSION["USERID"]) && isset($_SESSION["USERTYPE"]))
		header("location: ../index.php");
?>
<!DOCTYPE>
<html>
	<head>
		<center>
		<title>Login</title>
		<script type="text/javascript" src="../js/validation.js"> </script>
	</head>
	<body>
	<h2>Login From Here</h2>
		<form action = "user_login_checking.php" method = "post"> 
			<b>Username</b> <br>
			<input type="text" id = "username" placeholder="Username" name="username"><br><br>
			<b>Password </b> <br>
			<input type="password" id = "password" placeholder="Password" name="password" ><br><br>
			<input type="hidden" value ="Login" name ="loginValid">
			<input type="submit" id = "loginButton" onclick = "return FirstValidation()" value ="Login" name ="loginButton">
			&nbsp &nbsp
			<a href = "user_registration.php" style="text-decoration: none"> Sign up </a>
		</form>
		</center>
	</body>
</html>

