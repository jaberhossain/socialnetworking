<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title> News Feed </title>
		
		<script>
		function Profile()
		{
		  
		 window.location="user/user_profile.php";
		 
		}
		</script>
	</head>
	
	<body>
	<?php
		if ( isset($_SESSION["USERTYPE"]) && isset($_SESSION["USERID"]) ){
			//print_r($_SESSION);
			//die();
			require("database/db_fun.php");
			require("function/functions.php");
			
			//$uname = $_POST['username'];
			//	$pass = $_POST['password'];
			$jsonData = getJSONFromDB("select * from user_table");
			$jsn=json_decode($jsonData);
			foreach($jsn as $v)
			{	
				//Finding the User
				if($v->USER_ID == $_SESSION["USERID"]){
					//echo "<pre>";
					//print_r($v);
					//echo "</pre>";

					if($_SESSION["USERTYPE"] == "AUTH_USER")	{ 
						$destination  = "profile_picture/".$_SESSION["USERID"].".jpg";
						

						
						if(file_exists($destination)){
							echo '<img src="'.$destination.'" alt="icon" align="right" width=80 height=80 onclick="Profile()">';
						}else{
							echo '<img src="profile_picture/noimage.png" alt="icon" align="right" width=80 height=80 onclick="Profile()">';
						}
						echo '<a href = "post/post.php"> Post </a>'.'&nbsp;&nbsp;&nbsp';
						echo '<a href = "user/user_profile.php"> Profile </a>'.'&nbsp;&nbsp;&nbsp';
						echo '<a href = "logout/logout.php"> Logout </a><br>';
						echo "<br>Welcome ".$v->FIRST_NAME." !!!!!";
			
					}
					else if($_SESSION["USERTYPE"] == "ADMIN_USER"){
						$destination  = "profile_picture/".$_SESSION["USERID"].".jpg";
						
						
						if(file_exists($destination)){
						//echo "Next IF: ".$destination."<br/>";
							echo '<img src="'.$destination.'" alt="icon" align="right" width=80 height=80 onclick="Profile()">';
						}else{
						//echo "Next ELSE: ".$destination."<br/>";
							echo '<img src="profile_picture/noimage.png" alt="icon" align="right" width=80 height=80 onclick="Profile()">';
						}
						
						echo '<br>'.'<a href = "post/post.php"> Post </a>'.'&nbsp;&nbsp;&nbsp';
						echo '<a href = "admin/profile/admin_profile.php"> Profile </a>'.'&nbsp;&nbsp;&nbsp';
						echo '<a href = "logout/logout.php"> Logout </a>'; 
						echo "Welcome ".$v->FIRST_NAME."!";
				    }
				}
				
			}
			
		}else {
			include("function/functions.php");
			echo '<a href = "user/user_login.php"> Already Signup? Signin Here  </a> ';
			echo space(10).'<a href = "user/user_registration.php"> Want to Post Ad? Signup Here </a>';
		}
	?>
		
	</body>
</html>