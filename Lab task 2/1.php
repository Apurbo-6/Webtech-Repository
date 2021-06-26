  <!--  comments-->

<!DOCTYPE html>
<html>
<style>
.error {color: #FF0000;}
</style>

<?php
    // define variables and set to empty values
    $nameErr = $emailErr = $genderErr = $birthdateErr= $degreeErr = $bloodgroupErr ="";
    $name = $email = $gender = $birthdate = $degree1 = $degree2 = $degree3 = $degree4= $bloodgroup ="";
    $check=0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      
      
      //name validation
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




      //email validation
    
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } 
      else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Must be a valid email_address : anything@example. Com";
        }
        else
          $check++;
      }
      
        
      if (empty($_POST["birthday"])) {
        $birthdayErr = "Birth date is required";
      } 
      else {
        $birthday = test_input($_POST["birthday"]);
        $check++;
      }
      

      //gender validation

      if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
      } 
      else {
        $gender = test_input($_POST["gender"]);
        $check++;
      }
      

      

      
      //validation of degree
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
      


      //Blood group validation
      if(empty($_POST["bloodgroup"])){
        $bloodgroupErr = " Must select a Blood Group";
      }
      else{
        $bloodgroup = test_input($_POST["bloodgroup"]);
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
          header('location:2.php');
      }
  }
  

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>


<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
  <span class="error">(*) must need to fill </span><br>
  <fieldset>
    <legend  > <b> NAME:</legend><br>
		<input type="text" name="name"><br><br>
    <span class="error">* <?php echo $nameErr;?></span>
  </fieldset><br><br>

  <fieldset>
    <legend  > <b> EMAIL :</legend><br>
		<input type="text" name="email"><br><br>
    <span class="error">* <?php echo $emailErr;?></span>
		
  </fieldset><br><br>

  <fieldset>
    <legend  > <b> DATE OF BIRTH:</legend><br>
  	<input type="date" min="1953-01-01" max="1998-12-31" id="birthdate" name="birthdate"><br><br>
    <span class="error">* <?php echo $birthdateErr;?></span><br><br>
  </fieldset><br><br>


  <fieldset>
    <legend  > <b> GENDER :</legend><br>
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="other">Other
    <span class="error">* <?php echo $genderErr;?></span><br><br>
    
  </fieldset><br><br>

  <fieldset>
    <legend  > <b> DEGREE :</legend><br>

    <input type="checkbox" id="degree1" name="degree1" value="SSC">
    SSC
    <input type="checkbox" id="degree2" name="degree2" value="HSC">
    HSC
    <input type="checkbox" id="degree3" name="degree3" value="BSc">
    BSc
    <input type="checkbox" id="degree4" name="degree4" value="MSc">
    MSc<br><br>
    <span class="error">* <?php echo $degreeErr;?></span><br><br>
  </fieldset><br><br>



  <fieldset>
    <legend  > <b> BLOOD GROUP :</legend><br>
    <select id="bloodgroup" name="bloodgroup">
      <option value="">Select</option>
      <option value="A+">A+</option>
      <option value="A-">A-</option>
      <option value="B+">B+</option>
      <option value="B-">B-</option>
      <option value="O+">O+</option>
      <option value="O-">O-</option>
      <option value="AB+">AB+</option>
      <option value="AB-">AB-</option>
    </select>
    <br><br>
    <span class="error">* <?php echo $bloodgroupErr;?></span><br><br>
    <input type="submit" value="submit">&nbsp;&nbsp; 
  </fieldset><br><br>

<--echo $birthdate("mm")  echo date_format($birthdate,"Y/m/d H:i:s");-->



  



  


</form>



</body>
</html>