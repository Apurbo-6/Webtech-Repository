<?php
    session_start();

    if(isset($_SESSION['email'])){

      $_SESSION['email']=$_REQUEST['email'];
    }




  $data = file_get_contents("info.json");  

  $data = json_decode($data, true);  

  foreach($data as $row)  
  {  
       if($_SESSION['email']==$row["User Name"] && $_SESSION['password']==$row["Password"])
       {  
              
       }else
              echo "<h1>no match found</h1>";

  }

?>


<!DOCTYPE html>

<html lang="en">
 <?php include('header.php')?>



<center>
<fieldset><p><br></p><p><br></p>
  <h1>FORGOT PASSWORD</h1>
    <form method="post" action="">
		Enter Email:
        <input type="email" /> <br><br>
        <input type="submit" value="Submit" /><p><br></p><p><br></p><p><br></p>
    </form>

</fieldset>

</center>

  

<body style="background-color:#DFF0E2;">
</body>


<?php include('footer.php')?>


</html>