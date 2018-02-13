<!DOCTYPE html>
<html>
	<head>
		<title> SignUp to post and many more ... </title>
		<script type="text/javascript" src="../../js/validation.js"> </script>
	</head>
	<body>
		<h2> Admin SignUp Here </h2>
		<form action = "admin_regi_check.php" method = "POST">
			Enter Your First Name <input type = "text"  name = "firstname" placeholder = "First Name" /> <br><br>
			Enter Your Last Name <input type = "text" name = "lastname" placeholder = "Last Name" /> <br><br>
			Enter Your User Name <input type = "text" name = "username" placeholder = "User Name" /> <br><br>
			Enter Your Email <input type = "text" name = "email" placeholder = "Email" /> <br><br>
			Enter Your Password <input type = "password" name = "password" placeholder = "Passwrod" /> <br><br>
			Enter Your Re-Password <input type = "password" name = "repassword" placeholder = "Re-Passwrod" /> <br><br>
			<input type = "hidden" name = "registration" value = "valid" />
			<input type = "submit" onclick= "return registrationValidation()" name = "admin_signup_button" value = "SignUp" />
			<a href = "../Login/admin_login.php"> Login </a>
		</form>
	</body>
</html>