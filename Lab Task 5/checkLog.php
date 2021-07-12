


<?php 

	session_start();

	if(isset($_POST["submit"])){

	    $_SESSION['username'] = $_REQUEST['username'];
	    $_SESSION['password'] = $_REQUEST['password'];
	}

?>

<!DOCTYPE html>
<html>
 <?php include('header.php')?>
<style>
.error {color: #FF0000;}
</style>

<?php
	$username = $password = "";
	$usernameErr = $passwordErr = "";
	$check = $flag = 0 ;
/*
	echo "<h1>". $_SESSION['username']." </h1>";
	echo "<h1>". $_SESSION['password']." </h1>";
*/
	if($_SERVER["REQUEST_METHOD"] == "POST"){

		//username validation
		if (empty($_POST["username"])) {
	        $usernameErr = "Name is required";
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


    //password validation
    if (empty($_POST["password"])) {
	        $passwordErr = "Name is required";
	      } 
    else
    {
      $password = test_input($_POST["password"]);
      //validating alphabet
      if (!preg_match("/^[0-9a-zA-Z@%#$]+$/",$password)) {
        $passwordErr = "UPassword must not be less than eight (8) characters contain at least one of the special characters (@, #, $, %)";
      }
      else
        $check++; 
    }

    
		$data = file_get_contents("info.json");  

		$data = json_decode($data, true);  

		foreach($data as $row)  
		{  
			//echo $_SESSION['username'];
		     if($_SESSION['username']==$row["User Name"] && $_SESSION['password']==$row["Password"])
		     {	
		     		$flag=1;
						header('Location:test.php');
		     }else
		     		$flag=0;

		}
		if($flag==0)	
				echo '<h2 style="color: red;" >Erro Password and login fail </h2>';
				//header('Location:loginFailed.php');
		     


	}
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}



?>

	<span class="error">* <?php echo $usernameErr;?></span><br><br>

	<span class="error">* <?php echo $passwordErr;?></span><br><br>


<body style="background-color:#DFF0E2;">


</body>

<?php include('footer.php')?>
</html>