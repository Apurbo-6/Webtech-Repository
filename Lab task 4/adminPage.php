

<!DOCTYPE html>

<html lang="en">
<head>
    <title>Dashboard Page</title>
</head>

<fieldset >

    
    <center><img  width="230" height="150" src="supershop.png" ></center> 
    <p align="center" >
        <a href="homepage.php" style="font-size:18px" >Home</a>&nbsp;&nbsp;&nbsp;
        <a href="login.php" style="font-size:18px" >Login</a>&nbsp;&nbsp;&nbsp;
        <a href="registration.html" style="font-size:18px" >Register</a>
    </p> 
</fieldset>

<fieldset>
    <legend><b>LOGIN</b></legend>

    <p><br></p><p><br></p>

    <form action="logcheck.php" method="POST">
        <table>
            <tr>
                <td>User Name</td>
                <td>:</td>
                <td><input type="text" name="userName"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="password"></td>
            </tr>
        </table>
        <hr />
        <br>
        <input name="remember" type="checkbox">Remember Me
        <br/><br/>
        <input type="submit" name="submit" value="Submit">     
        &nbsp;&nbsp;
        <a href="forgot_password.html">Forgot Password?</a>
    </form>

    <p><br></p><p><br></p><p><br></p>
</fieldset>


<body>


</body>
 <fieldset>
    <footer><p align=center>Copyright <span>&#169;</span>2021</footer></p>
 </fieldset>


</html>