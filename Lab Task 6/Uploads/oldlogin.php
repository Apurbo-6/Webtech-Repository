

<?php
    session_start();

?>


<!DOCTYPE html>

<html lang="en">
 <?php include('header.php')?>

<center>
<fieldset>
    
    <h1 align="center" style="color: #5D006F">Sign In</h1>
    <hr/>
    <p><br></p><p><br></p>

    <form action="checkLog.php" method="POST">
        <table>
            <tr>
                <td>User Name</td>
				<td>:</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
				<td>:</td>
                <td><input type="password" name="password" minlength="8" ></td>
            </tr>
        </table>
        <hr />
        <br>
		<input name="remember" type="checkbox">Remember Me
		<br/><br/>
        <input type="submit" name="submit" value="Submit">     
        &nbsp;&nbsp;
		<a href="forgot_password.php">Forgot Password?</a>
    </form>

    <p><br></p><p><br></p><p><br></p>
</fieldset>

</center>


<body style="background-color:#DFF0E2;">


</body>

<?php include('footer.php')?>


</html>