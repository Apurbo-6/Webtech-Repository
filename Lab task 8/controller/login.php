
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
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    
    <title></title>
</head>


    
<body>

    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="login.php">Green Dhaka</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="registration.php">Registration</a>
              </li>
            </ul>
          </div>
        </nav>

    </div>


    <div class="text-white">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-4 co-sm-4 col-xs-12">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="form_container">
                    <div class="form-group">
                        <label for="name">User Name:</label>
                        <input type="text" name="username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" id="userName" onkeyup="userVal()"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="text" class="form-control" id="pwd">
                    </div>
                    <div class="checkbox">
                        <label class="text-white"><input type="checkbox">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-outline-success btn-block mt-3 font-weight-bold">Submit</button>
                </form>
            </div>
        </div>
    </div>
    </div>


    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../javascript/loginn.js"></script>
</body>
</html>