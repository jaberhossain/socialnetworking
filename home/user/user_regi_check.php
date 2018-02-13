<?php

	session_start();
	if( isset($_SESSION["USERID"]) && isset($_SESSION["USERTYPE"]))
		header("location: ../index.php");

	
	if( isset($_POST["registration"]) ){
		
		
		date_default_timezone_set('Asia/Dhaka');
		
		 
		require("../database/db_fun.php");
		
		$fName = $_POST["firstname"];
		$lName = $_POST["lastname"];
		$email = $_POST["email"];
		$username = $_POST["username"];
		$password = $_POST["password"];
		$repassword = $_POST["repassword"];
		$gender = $_POST["gender"];
	 if (!empty($fName) && !empty($lName)&&!empty($email) && !empty($username) && !empty($password) && !empty($repassword))
	 {	 
		
		if($password == $repassword){
		
			$insertQuery = "INSERT INTO user_table VALUE(NULL,'".$fName."','".$lName."','".$username."', 'AUTH_USER','".
			$email."','".$password."','".date('Y-m-d H:i:s a')."','".$gender."')";
		
			
			if(updateDB($insertQuery)){
				
				$searchQuery = "SELECT USER_ID FROM user_table WHERE USER_NAME ='".$username."'";
				$jnDecode = json_decode(getJSONFromDB($searchQuery));
				if(sizeof($jnDecode) == 1){
					
					$user_id = $jnDecode[0]->USER_ID;
					$insertQuery = "INSERT INTO user_profile_data_table VALUES(NULL,'$user_id',NULL,NULL,NULL)";
					if(updateDB($insertQuery))
						echo "New User added!";
					else
						echo "Update not suc";
				}
				
				header("location:user_login.php");
			}
			
		}else{
			echo "Password is not matched";
		}
	 }
	  else
	  {
		  echo "fields are empty";
	  }
		
		
	
	}
	else
	{
	
		header("location:user_registration.php");
	
	}
?> 