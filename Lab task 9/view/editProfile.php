<?php
session_start();

if(isset($_SESSION['username'])){


}
else{

    header('location: ../controller/login.php');
}

?>


<?php  
    require_once 'readData.php';
    //$_SESSION['username']="Apurbo6";
    //echo 'ok';
    //$users = fetchAllUsers();
    $user = fetchUsers($_SESSION['username']);

?>





<?php
    

    // define variables and set to empty values
    $nameErr = $emailErr = $genderErr = $birthdateErr= $degreeErr = $bloodgroupErr = $newpassErr = $renewpassErr = $usernameErr = "";

    $name = $email = $gender = $birthdate = $degree1 = $degree2 = $degree3 = $degree4= $bloodgroup =$newpass = $renewpass = $username = "";

    $check=0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      
      
      //name validation//name validation//name validation
      if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } 
      else {
        $name = test_input($_POST["name"]);
        //validating alphabet
        if (!preg_match("/^[a-zA-Z][a-zA-Z.\_\-]+ +[a-zA-Z.\-\_]+/",$name)) {
          $nameErr = "Only Can contain a-z, A-Z, period(.) , dash only(-) and at least two words";
        }
        else
          $check++;
          //!preg_match("/^[a-zA-Z-'{2,8} ]*$/",$name  
      }

      
      //username username   
      if (empty($_POST["username"])) {
        $usernameErr = "username is required";
      } 
      else 
      {
          $username = test_input($_POST["username"]);
          //validating alphabet
          if (!preg_match("/^[0-9a-zA-Z-_]{2,}[^\s.]$/",$username)) {
            $usernameErr = "User Name must contain at least two (2) characters and can contain alpha numeric characters, period, dash or underscore only";
          }
          else
            $check++;
      }



      //password validation//password validation//password validation

      if(empty($_POST["newpass"])){
        $newpassErr=" must need to fill password";
      }else
        $newpass=test_input($_POST["renewpass"]);


      if(empty($_POST["renewpass"])){
        $renewpassErr=" must need to fill confirm password";
      }else
        $renewpass=test_input($_POST["renewpass"]);
      

      if (!preg_match("/^[0-9a-zA-Z@%#$]+$/",$newpass)) {
            $newpassErr = "UPassword must not be less than eight (8) characters contain at least one of the special characters (@, #, $, %)";
      }else if($_POST["newpass"]==$_POST["renewpass"]){
          $check++; 
      }
      else
        $renewpassErr="didn't macth the password ";





      

      //form changing 
      if ($check == 3) {
          $_SESSION['name1']=$_REQUEST['name'];
          $_SESSION['pass1']=$_REQUEST['newpass'];

          $_SESSION['image1'] = basename($_FILES["image"]["name"]);


          $_SESSION['tmp_name1']=$_FILES["image"]["tmp_name"];
          $_SESSION['dir1'] = "../uploads/";
          $_SESSION['target_file1'] = $_SESSION['dir1'] . $_SESSION['image'];

          if (move_uploaded_file($_SESSION['tmp_name1'], $_SESSION['target_file'])) {
            echo "The file ". $_SESSION['image1']. " has been uploaded.";
          } 
          else {
            echo "Sorry, there was an error uploading your file.";
          }


          header('location:editProfileDone.php');
      }
  }
  

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>




<!DOCTYPE html>

<style>
.error {color: #FF0000;}
</style>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>

 <?php include('../header2.php')?>

<center>
<fieldset id="regiContent">
	<h1 align = "center" style="color: #0F9934;" >Edit Profile</h1>

	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
		<br/>
		<lebel style="color: white;">Name</lebel>
				
				<input name="name" type="text" id="name" onkeyup="nameVal()">
				<div><span class="error" id="nameErr">*<?php echo $nameErr;?></span></div>
				
			
			<hr/>
				<lebel style="color: white;">Email</lebel>
				
					<input name="email" type="text" id="email" value="<?php echo $user['Email'] ?>" readonly>	
			<hr/>

				<lebel style="color: white;">User Name</lebel>
				
				<input name="username" type="text" id="userName" value="<?php echo $user['User_Name'] ?>" readonly>
			<hr/>
      <br><br>




			
				<lebel style="color: white;">New Password</lebel>
				
				<input name="newpass" type="text"  id="password" onkeyup="passVal()">
				<div><span align="right" class="error" id="passwordErr">*<?php echo $newpassErr;?></span></div>
        
			<hr/>
      <br><br>
				<lebel style="color: white;">Confirm Password</lebel>
				
				<input name="renewpass" type="text" id="rePassword" onkeyup="rePassVal()">
			<div><span class="error" id="rePasswordErr">*<?php echo $renewpassErr;?></span></div>
			<hr/>
      <br><br>
        <input type="file" name="image"><br><br>
      <hr/>
			
					

		<hr/>
		<input type="submit" name="submit" value="Update">
		<input type="reset">
	</form>
</fieldset>
</center>


<body>



<script type="text/javascript" src="../javascript/regiScript.js"></script>

</body>



<?php include('../view/footer.php');?>


</html>