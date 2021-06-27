<!DOCTYPE html>
<html>

<style>
.error {color: #FF0000;}
</style>

<style>
.error2 {color: #2BDE1A;}
</style>


<?php
/*
	if(isset($_FILES['image'])){

		echo "<pre>";
		print_r($_FILES);
		echo "</pre>";

		$fileName=$_FILES['image']['name'];
		$fileSize=$_FILES['image']['size'];
		$fileTemp=$_FILES['image']['tmp_name'];
		$fileType=$_FILES['image']['type'];
		$fileErr=$_FILES['image']['error'];

		//upload
		move_uploaded_file($fileTemp, "uploads/".$fileName);
		
	}	
	*/
?>





<body>
	<fieldset>
		<legend><b>Profile Picture</legend>
		
		<img src="pframe.jpg" alt="Trulli" width="280" height="280">

		<form action="uploadsave.php" method="POST" enctype="multipart/form-data">
			<br><br>
			choose a  image:
			<input type="file"  name="fileToUpload"><br><br>
			<input type="submit">
		</form>
		

	</fieldset>



</body>

</html>