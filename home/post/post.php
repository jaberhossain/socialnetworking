
	<!DOCTYPE html>
	<html>
	<head>
	<title>POST </title>
	</head>
	<body>
	<form method = "POST" action = "post.php" >
	TITLE: <input type="text" name = "titleText" placeholder = "Enter the title here"><br><br>
	Select City : &nbsp 
	<select>
  	<option value="Dhaka">Dhaka</option>
	</select> 
	Select Area : &nbsp
	<select>
  	<option value="Uttora">Uttora</option>
	<option value="Farmgate">Farmgate</option>
	<option value="Mirpur">Mirpur</option>
	<option value="Gulshan">Gulshan</option>
	<option value="Banani">Banani</option>
	<option value="Mogh Bazar">Mogh Bazar</option>
	<option value="Nikunjo-1">Nikunjo-1</option>
	<option value="Nikunjo-2">Nikunjo-2</option>
	<option value="Bashundhora">Bashundhora</option>
	<option value="Gulisthan">Gulisthan</option>
	<option value="Badda">Badda</option>
	<option value="Puran Dhaka">Puran Dhaka</option>
	<option value="Mouchak">Mouchak</option>
	<option value="Rampura">Rampura</option>
	<option value="Malibag">Malibag</option>
	<option value="Shyamoli">Shyamoli</option>
	<option value="Niketon">Niketon</option>
	<option value="Mohakhali">Mohakhali</option>
	<option value="Agargao">Agargao</option>
	<option value="Dhanmondi">Dhanmondi</option>
	</select> <br><br>
	Description:<br><br><textarea rows="4" cols="50" placeholder="Describe here..."></textarea><br><br>
	
	
	<input type="file" name = "propic">&nbsp&nbsp&nbsp&nbsp&nbsp
	<input type="submit" name = "pic_choose_btn1" value = "Upload pic" /> <br><br>
	
	<input type="file" name = "propic">&nbsp&nbsp&nbsp&nbsp&nbsp
	<input type="submit" name = "pic_choose_btn2" value = "Upload pic" /><br><br>
		
	<input type="file" name = "propic">&nbsp&nbsp&nbsp&nbsp&nbsp
	<input type="submit" name = "pic_choose_btn3" value = "Upload pic" /><br>
		
	
	<br><br><input type="submit" name = "post_button" value= "POST" />
	</form>
	</body>
	</html>