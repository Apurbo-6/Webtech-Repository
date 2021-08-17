


<?php
session_start();

if(isset($_SESSION['username'])){


}
else{

    header('location: login.php');
}

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
          $_SESSION['name1']=$_REQUEST['name'];
          $_SESSION['email1']=$_REQUEST['email'];
          $_SESSION['username1']=$_REQUEST['username'];
          $_SESSION['pass1']=$_REQUEST['newpass'];
          $_SESSION['dob1']=$_REQUEST['birthdate'];
          $_SESSION['gender1']=$_REQUEST['gender'];

          $_SESSION['image1'] = basename($_FILES["image"]["name"]);


          $_SESSION['tmp_name1']=$_FILES["image"]["tmp_name"];
          $_SESSION['dir1'] = "../uploads/";
          $_SESSION['target_file1'] = $_SESSION['dir1'] . $_SESSION['image'];

          if (move_uploaded_file($_SESSION['tmp_name1'], $_SESSION['target_file1'])) {
            echo "The file ". $_SESSION['image1']. " has been uploaded.";
          } 
          else {
            echo "Sorry, there was an error uploading your file.";
          }

          header('location: employeeAdded.php');
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
<html>


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>


<?php


include('../header2.php');


?>

<style>
.error {color: #FF0000;}
</style>

<style>
.error {color: #0F9934;font-size:15px;}
</style>
<style>
.error1 {color: red;font-size:15px;}
</style>


<div id="addProduct" class ="error" align="center" <b><br><br>

    <center>
<fieldset id="regiContent">
  <h1 align = "center" style="color: #0F9934;" >Add Employee</h1>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
    <br/>
    Name
        
        <input name="name" type="text" id="name" onkeyup="nameVal()">
        <div><span class="error1" id="nameErr">*<?php echo $nameErr;?></span></div>
        
      
      <hr/>
        Email
        
          <input name="email" type="text" id="email" onkeyup="emailVal()">
          <abbr title="hint: sample@example.com"><b></b></abbr>
        <div><span class="error1" id="emailErr">*<?php echo $emailErr;?></span></div>
        
      <hr/>

        User Name
        
        <input name="username" type="text" id="userName" onkeyup="userVal()">
        <div><span class="error1" id="usernameErr">*<?php echo $usernameErr;?></span></div>
      <hr/>
      
        Password
        
        <input name="newpass" type="text"  id="password" onkeyup="passVal()">
        <div><span align="right" class="error1" id="passwordErr">*<?php echo $newpassErr;?></span></div>
      <hr/>
        Confirm Password
        
        <input name="renewpass" type="text" id="rePassword" onkeyup="rePassVal()">
      <div><span class="error1" id="rePasswordErr">*<?php echo $renewpassErr;?></span></div>
      <hr/>

      <br><br>
        <input type="file" name="image"><br><br>
      <hr/>

          <fieldset>
            <legend>Gender</legend>    
            <input name="gender" name="male" type="radio" value="male">Male
            <input name="gender"  name="female" type="radio" value="female">Female
            <input name="gender"  name="other" type="radio" value="other">Other
          </fieldset>
        <div><span class="error1">*<?php echo $genderErr;?></span>
      <hr/>

          <fieldset>  
            <legend  > <b> DATE OF BIRTH:</legend><br>
            <input type="date" min="1953-01-01" max="1998-12-31" id="birthdate" name="birthdate"><br><br>
          </fieldset>
      <div><span class="error1">*<?php echo $birthdateErr;?></span></div>


    <hr/>
    <input type="submit" name="submit" value="Submit">
    <input type="reset">
  </form>
</fieldset>
</center>

</div>

<body>


  <script type="text/javascript" src="../javascript/regiScript.js"></script>

  </script>

</body>


<?php


include('../view/footer.php');


?>

</html>