
<?php
	
	session_start();
	if(isset($_SESSION["USERID"]) && $_SESSION["USERTYPE"])
		header("location: ../index.php");
	
	if(isset($_POST['loginValid'])){
		require("../database/db_fun.php");
			if (empty($_POST['username']) || empty($_POST['password'])) {
						echo "fileds are empty!!!!!!!!";
			}
			else{
				$uname = $_POST['username'];
				$pass = $_POST['password'];
				$jsonData = getJSONFromDB("select * from user_table");
				
				
			   $jsn=json_decode($jsonData);
			   $loginStatus = false;	
			   foreach($jsn as $v){
				   
					if($uname == $v->USER_NAME && $pass== $v->PASSWORD)
					{
						$_SESSION["USERID"] = $v->USER_ID;
						$_SESSION["USERTYPE"] = $v->USER_TYPE;
						$loginStatus = true;
						header("location:../index.php");	
					}
				}
				
				if(!$loginStatus){
					
					
					echo "User not found or password did not match<br>"; 
					echo '<a href = "user_login.php"> Login </a> ';
					
				}
			}
		 
		   
		}
	else {
		header("location: user_login.php");

	}
?>
 
