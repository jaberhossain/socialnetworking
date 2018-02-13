<?php
	session_start();
	if( !isset($_SESSION["USERID"]) && !isset($_SESSION["USERTYPE"]))
		header("location: ../index.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Profile </title>
		<script type="text/javascript" src="../js/validation.js"> </script>
	</head>
	
	<body>
		
		
	<a href = "../index.php"> Home </a>
	<br><br> 
	<center>
	
	<?php
	
	
		if(isset($_SESSION["USERID"]) && $_SESSION["USERTYPE"]){
			
			require("../database/db_fun.php");
				
			$destination  = "../profile_picture/".$_SESSION["USERID"].".jpg";
			$imageChanged = false;
			if(isset($_POST['pic_choose_btn'])){
					
				$imageType = $_FILES['propic']['type'];
				$tmp_src = $_FILES['propic']['tmp_name'];
				$imageType = explode('/',$imageType);
				
				if($imageType[0] == 'image'){
					move_uploaded_file($tmp_src,$destination);
					
					$jsoninsertpic="UPDATE user_profile_data_table SET IMAGE = '$destination' WHERE USER_ID  = '".$_SESSION["USERID"]."'" ;
					
					if(updateDB($jsoninsertpic)){
						$imageChanged = true;
					}else{
						//echo "Error: failed to Stored Pic in DB<br/>";
					}
				}else{
					//echo "<script> alert('Please Insert an Image') </script>";
				}
			}
				
			if(file_exists($destination)){
				//echo "Next IF: ".$destination."<br/>";
				echo '<br><img src="'.$destination.'" alt="icon" width=150 height=150 >'."<br><br>";
				
				if($imageChanged)
					echo "<script> alert('Your Image Changed') </script>";
				
			}else{
				//echo "Next ELSE: ".$destination."<br/>";
				echo '<br><img src="../profile_picture/noimage.png" alt="icon" width=150 height=150 >'."<br><br>";
			}
		/*$joiningQuery = "SELECT * FROM user_table  INNER JOIN user_profile_data_table on user_table.USER_ID = user_profile_data_table.USER_ID 
						WHERE user_table.USER_ID = '".$_SESSION["USERID"]."'";
		$jsonData =  getJSONFromDB($joiningQuery);
		$jsn=json_decode($jsonData);
			echo "<br><br><b>".$jsn[0]->FIRST_NAME."&nbsp".$jsn1[0]->LAST_NAME."</b></br>"."</br>";*/
		}		
	?>
		
		
		<form method = "POST" action = "user_profile.php" enctype = "multipart/form-data" >
			<input type="file" id = "imageFileUploader" name = "propic"><br>
			<input type="submit" onclick = "return pictureUpload()" name = "pic_choose_btn" />
		</form>
		
		
	<?php	
		$joiningQuery = "SELECT * FROM user_table  INNER JOIN user_profile_data_table on user_table.USER_ID = user_profile_data_table.USER_ID 
						WHERE user_table.USER_ID = '".$_SESSION["USERID"]."'";
		$jsonData =  getJSONFromDB($joiningQuery);
		$jsn=json_decode($jsonData);
		echo "</br></br>Email : ".$jsn[0]->EMAIL."</br>"."</br>";
		echo "Phone : ".$jsn[0]->PHONE_NO."<br><br>";
		echo "Address : ".$jsn[0]->ADDRESS."<br> <br>";
		echo "Gender : ".$jsn[0] ->Gender."</br>"."</br>";
		echo "Joined:".$jsn[0]->CREATION_DATE_TIME;
	?>
	</center>
	</body>
	
</html>
