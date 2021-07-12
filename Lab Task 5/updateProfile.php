<?php
session_start();


    if(isset($_SESSION['username'])){


    }
    else{

        header('location: login.php');
    }

?>


<!DOCTYPE html>
<html>



<style>
.error {color: #FF0000;}
</style>

 <?php include('header2.php')?>



 <?php



 
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
            $newpassErr = "Password must not be less than eight (8) characters contain at least one of the special characters (@, #, $, %)";
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
      

      

      /*
      //validation of degree//validation of degree//validation of degree
      if ((isset($_REQUEST['degree1']) && isset($_REQUEST['degree2'])) || (isset($_REQUEST['degree2']) && isset($_REQUEST['degree3'])) || (isset($_REQUEST['degree3']) && isset($_REQUEST['degree4'])) || (isset($_REQUEST['degree1']) && isset($_REQUEST['degree4']))) {

        if(isset($_REQUEST['degree1'])){
          $degree1 = test_input($_REQUEST['degree1']);
        }else
          $degree1="";

        if(isset($_REQUEST['degree2'])){
          $degree2 = test_input($_REQUEST['degree2']);
        }else
          $degree2="";

        if(isset($_REQUEST['degree3'])){
          $degree3 = test_input($_REQUEST['degree3']);
        }else
          $degree3="";

        if(isset($_REQUEST['degree4'])){
          $degree4 = test_input($_REQUEST['degree4']);
        }else
          $degree4="";

        $check++;  
      } 
      else {
        $degreeErr = "Select at least two degree";
      }
      //echo "<span class=\"error\">*dvfvfv:::".$degree4."</span>";
      */

      /*
      //Blood group validation
      if(empty($_POST["bloodgroup"])){
        $bloodgroupErr = " Must select a Blood Group";
      }
      else{
        $bloodgroup = test_input($_POST["bloodgroup"]);
        $check++;
      }
      */
      


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





<body style="background-color:#DFF0E2;">
<fieldset><p>
<center>
  <h1 align = "center" style="color: Black;" >Update Profile</h1>
  <hr/>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >

    <b>  User Name: 
    <input type="text" name="username"><br><br>
  <br>


  <span class="error">(*) must need to fill </span><br>
  <b> NAME:
        <input type="text" name="name"><br><br>
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>

  <b> EMAIL :
        <input type="text" name="email"><br><br>
    <span class="error">* <?php echo $emailErr;?></span>
  <br><br>


 
    


    <input type="submit" value="submit">&nbsp;&nbsp;



</center>  
</p>

</fieldset>
  


</form>


<body style="background-color:#DFF0E2;">




</body>


  <?php include('footer.php')?>

  </html>