
<?php 

    session_start();

    if(isset($_POST["submit"])){

        $_SESSION['username'] = $_REQUEST['username'];
        $_SESSION['password'] = $_REQUEST['password'];
    }

?>


<?php
    require_once '../view/readData.php';

        if(isset($_REQUEST['username'])){
                $users = fetchAllUsers($_REQUEST['username']);
        }

    //$user = fetchUsers($_SESSION['username']);
?>



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
            $usernameErr = "invalid user name";
          } 
    else
    {
      $username = test_input($_POST["username"]);
      //validating alphabet
      if (!preg_match("/^[0-9a-zA-Z-_]{2,}[^\s.]$/",$username)) {
        $usernameErr = "Can contain a-z, A-Z, period(.) , dash only(-) and at least two words";
      }
      else
        $check++; 
    }


    //password validation
    if (empty($_POST["password"])) {
            $passwordErr = "invalid password";
          } 
    else
    {
      $password = test_input($_POST["password"]);
      //validating alphabet
      if (!preg_match("/^[0-9a-zA-Z@%#$]{8,}$/",$password)) {
        $passwordErr = "At least 8 and No use of special characters (space,@, #, $, %)";
      }
      else
        $check++; 
    }

    
        if($check==2){   

            $_SESSION['username'] = $_REQUEST['username'];
            $_SESSION['password'] = $_REQUEST['password'];

                foreach($users as $row)  
                {  
                     if($_SESSION['username']==$row["User_Name"] && $_SESSION['password']==$row["Password"])
                     {  
                            $flag=1;
                            if(!empty($_POST["remember"])) {
                                setcookie ("username",$_POST["username"],time()+ 1000);
                                setcookie ("password",$_POST["password"],time()+ 1000);
                                echo "<h1>Cookies Set Successfuly</h1>";
                            } 
                            else {
                                setcookie("username","");
                                setcookie("password","");
                                echo "<h1>Cookies Not Set</h1>";
                            }
                            header('location:../view/homepageManager.php');
                     }else
                            $flag=0;

            }
        }
        if($flag==0)    
                echo '<p><br></p><p><br></p><p><br></p><h1 align="center" style="color: red;" >wrong passwor and username </h1>';
             


    }
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }



?>


<!DOCTYPE html>





<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

 <?php include('../header.php')?>


 <style>
.error {color: #FF0000;}
</style>




<center>
<fieldset id="loginContent">
    
    <h1 align="center" style="color: #0F9934">LOGIN</h1>
    <hr/>
    <p><br></p><p>
    <div class="form_container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <span style="color:white">User Name</span>
        <input type="text" name="username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" id="userName" onkeyup="userVal()"><br><br>

        <div><span class="error" id="usernameErr">*<?php echo $usernameErr;?></span></div><br>

        <span style="color:white">Password</span>
        <input type="text" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" id="password" onkeyup="passVal()">
        <div><span class="error" id="passwordErr">*<?php echo $passwordErr;?></span></div>
        <hr />
        <br>
        <input name="remember"  type="checkbox"><span style="color:white">Remember Me</span>
        <br/><br/>
        <input type="submit" name="submit" value="Submit">     
        &nbsp;&nbsp;
    </form>
</div>
    <p><br></p>
</fieldset>

</center>





<body>


<script type="text/javascript" src="../javascript/loginn.js"></script>
<!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>

<?php include('../view/footer.php');?>


</html>