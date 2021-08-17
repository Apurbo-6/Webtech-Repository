



<?php
session_start();

if(isset($_SESSION['username'])){


}
else{

    header('../controller/location: login.php');
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
.error {color: #2BDE1A;}
</style>
<p><br><br></p><p><br><br></p><p><br><br></p>
<div id="helloContent">
    <span class="error"> <b> <h1 align="center" style= "color: #0F9934";><?php echo  "Welcome Admin to Our System";?></h1> </span>
</div>

<body>

</body>

<p><br><br></p><p><br><br></p><p><br><br></p>
<?php


include('footer.php');


?>

</html>