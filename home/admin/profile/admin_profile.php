<?php
	session_start();
	if( !isset($_SESSION["USERID"]) && !isset($_SESSION["USERTYPE"]))
		header("location: ../../index.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Profile </title>
		<script type="text/javascript" src="../../js/validation.js"> </script>
	</head>
	<body>
		
		
	<a href = "../../index.php"> HOME </a>
	
	<?php
		if(isset($_SESSION["USERID"]) && $_SESSION["USERTYPE"]){
			
				//echo "<pre>";
				//print_r($_FILES);	
				//echo "<pre>";
				
			require("../../database/db_fun.php");
				
				
				// echo "<pre>";
				// print_r($jsn);
				// echo "</pre>";
				
			$destination  = "../../profile_picture/".$_SESSION["USERID"].".jpg";
			$imageChanged = false;
			//echo "<br/>Prevoius: ".$destination."<br/>";	
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
					echo "<script> alert('Please Insert an Image') </script>";
				}
			}
				
			if(file_exists($destination)){
				//echo "Next IF: ".$destination."<br/>";
				echo '<br><img src="'.$destination.'" alt="icon" width=150 height=150 >'."<br><br>";
				
				if($imageChanged)
					echo "<script> alert('Your Image Changed') </script>";
				
			}else{
				//echo "Next ELSE: ".$destination."<br/>";
				echo '<br><img src="../../profile_picture/noimage.jpg" alt="icon" width=150 height=150 >'."<br><br>";
			}
			
		}		
	?>
		
		<form method = "POST" action = "admin_profile.php" enctype = "multipart/form-data" >
			<input type="file" id = "imageFileUploader"  name = "propic"><br>
			<input type="submit" onclick = "return pictureUpload()" name = "pic_choose_btn" />
		</form>
		
	<?php	
		$joiningQuery = "SELECT * FROM user_table  INNER JOIN user_profile_data_table on user_table.USER_ID = user_profile_data_table.USER_ID 
						WHERE user_table.USER_ID = '".$_SESSION["USERID"]."'";
		$jsonData =  getJSONFromDB($joiningQuery);
		$jsn=json_decode($jsonData);
		echo "<br><br>Name  :".$jsn[0]->FIRST_NAME."&nbsp".$jsn[0]->LAST_NAME."</br>"."</br>";
		//echo "ID    :".$jsn[0]->USER_ID."</br>"."</br>";
		echo "Email :".$jsn[0]->EMAIL."</br>"."</br>";
		echo "Joined:".$jsn[0]->CREATION_DATE_TIME."</br>"."</br>";
		echo "Phone :".$jsn[0]->PHONE_NO."<br><br>";
		echo "Address:".$jsn[0]->ADDRESS;
	?>
	</body>
</html>
