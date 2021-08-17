

<?php

session_start()

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




      //email validation//email validation//email validation
    
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } 
      else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Must be a valid email_address : anything@example.Com";
        }
        else
          $check++;
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





      //gender validation//gender validation//gender validation

      if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
      } 
      else {
        $gender = test_input($_POST["gender"]);
        $check++;
      }
      

      //date validation 
      if(empty($_POST["birthdate"])){
        $birthdateErr = " select up year, month, date ";
      }
      else{
        $birthdate = test_input($_POST["birthdate"]);
        $check++;
      }
      

      //form changing 
      if ($check == 6) {
          $_SESSION['name']=$_REQUEST['name'];
          $_SESSION['email']=$_REQUEST['email'];
          $_SESSION['username']=$_REQUEST['username'];
          $_SESSION['pass']=$_REQUEST['newpass'];
          $_SESSION['dob']=$_REQUEST['birthdate'];
          $_SESSION['gender']=$_REQUEST['gender'];


          $_SESSION['image'] = basename($_FILES["image"]["name"]);


          $_SESSION['tmp_name']=$_FILES["image"]["tmp_name"];
          $_SESSION['dir'] = "../uploads/";
          $_SESSION['target_file'] = $_SESSION['dir'] . $_SESSION['image'];

          if (move_uploaded_file($_SESSION['tmp_name'], $_SESSION['target_file'])) {
            echo "The file ". $_SESSION['image']. " has been uploaded.";
          } 
          else {
            echo "Sorry, there was an error uploading your file.";
          }


          header('location:registrationDone.php');
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
                <form action="/action_page.php" class="form_container">
                    <div class="form-group">
                        <label for="email">Name:</label>
                        <input type="text" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Email:</label>
                        <input type="text" class="form-control" id="pwd">
                    </div>
                    <div class="form-group">
                        <label for="pwd">User Name:</label>
                        <input type="text" class="form-control" id="pwd">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="text" class="form-control" id="pwd">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Confirm Password:</label>
                        <input type="text" class="form-control" id="pwd">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Gender:</label>
                        <input type="text" class="form-control" id="pwd">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Date Of Birth:</label>
                        <input type="text" class="form-control" id="pwd">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" id="pwd">
                    </div>

                    


                    <button type="submit" class="btn btn-outline-success btn-block mt-3 font-weight-bold">Submit</button>
                </form>
            </div>
        </div>
    </div>
    </div>



<script type="text/javascript" src="../javascript/regiScript.js"></script>




<!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>