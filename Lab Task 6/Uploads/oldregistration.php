

<!DOCTYPE html>

<html lang="en">
<head>
    <title>Dashboard Page</title>
</head>

 <?php include('header.php')?>

<center>
<fieldset>
	<h1 align = "center" style="color: #5D006F;" >Sign Up</h1>

	<form action="validityRegi.php" method="POST">
		<br/>
		<table width="50%" cellpadding="0" cellspacing="0">

			<tr>
				<td>Name</td>
				<td>:</td>
				<td><input name="name" type="text"></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td>
					<input name="email" type="email">
					<abbr title="hint: sample@example.com"><b>i</b></abbr>
				</td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>User Name</td>
				<td>:</td>
				<td><input name="username" type="text"></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input name="newpass" type="password" minlength="8"></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Confirm Password</td>
				<td>:</td>
				<td><input name="renewpass" type="password" minlength="8"></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td colspan="3">
					<fieldset>
						<legend>Gender</legend>    
						<input name="gender" name="male" type="radio">Male
						<input name="gender"  name="female" type="radio">Female
						<input name="gender"  name="other" type="radio">Other
					</fieldset>
				</td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td colspan="3">
					<fieldset>  
						<legend  > <b> DATE OF BIRTH:</legend><br>
						<input type="date" min="1953-01-01" max="1998-12-31" id="birthdate" name="birthdate"><br><br>
					</fieldset>
				</td>
				<td></td>
			</tr>
		</table>
		<hr/>
		<input type="submit" name="submit" value="Submit">
		<input type="reset">
	</form>
</fieldset>
</center>


<body>


</body>
<?php include('footer.php')?>
</html>