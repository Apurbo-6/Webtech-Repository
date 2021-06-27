<!DOCTYPE html>
<html>

<style>
.error {color: #FF0000;}
</style>

<style>
.error2 {color: #2BDE1A;}
</style>


<?php

	$pass ="apurbo123";
	$currentpass = $newpass = $renewpass = "";
	$currentpassErr = $newpassErr = $renewpassErr ="";

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		if(empty($_POST["currentpass"])){
			$currentpassErr=" must need to fill current password";
		}
		else
			$currentpass=test_input($_POST["currentpass"]);

		if(empty($_POST["newpass"])){
			$newpassErr=" must need to fill new password";
		}else
			$newpass=test_input($_POST["renewpass"]);


		if(empty($_POST["renewpass"])){
			$renewpassErr=" must need to fill retype-new password";
		}else
			$renewpass=test_input($_POST["renewpass"]);


		if(!empty($currentpass) && $currentpass==$pass){

			if (!preg_match("/^[0-9a-zA-Z@%#$]+$/",$newpass)) {
        		$newpassErr = "UPassword must not be less than eight (8) characters contain at least one of the special characters (@, #, $, %)";
			}
			else
			{	
				if($newpass==$renewpass){
					$check++;
					header('Location:test.php');
				}
				else
					$renewpassErr="didn't macth the password ";
				
			}

		}//else
			//$currentpassErr="current pass didn't match";

	}
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	//$_POST['currentpass']==$pass
?>



<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <fieldset>
    <legend  > <b> Change Password :</legend><br>
	Current Password: 
	<input type="Password" name="currentpass"><br><br>
	<span class="error">* <?php echo $currentpassErr;?></span><br><br>
	<span class="error2"> <b><?php echo  "New Password :";?></span>&nbsp; 
	<input type="Password" name="newpass" minlength="8"><br><br>
	<span class="error">* <?php echo $newpassErr;?></span><br><br>
	<span > <b><?php echo  "Retype new Password :";?></span>&nbsp;&nbsp; 
	<input type="Password" name="renewpass" minlength="8"><br><br>
	<span class="error">* <?php echo $renewpassErr;?></span><br><br>

	<input type="submit" value="submit">&nbsp;&nbsp;
  </fieldset>
</form>

<body>


</body>

</html>