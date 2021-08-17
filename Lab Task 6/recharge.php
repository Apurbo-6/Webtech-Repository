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
.error {color: #394393;}


</style>

 <?php include('header2.php')?>


</style>


		<span class="error"> <b> <h1 align="center"><?php echo  "NOT SET UP YET ";?></h1> </span>
		

<body style="background-color:#DFF0E2;">




</body>


  <?php include('footer.php')?>

  </html>