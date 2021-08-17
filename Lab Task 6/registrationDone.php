
<?php
session_start();

if(!empty($_SESSION['username'])){


}
else
    header('Location:registration.php');
?>


<!DOCTYPE html>
<html>

 <?php include('header.php')?>

<style>
.error {color: #2BDE1A;}
</style>

<?php
    


    require_once 'model/model.php';


    $data['Name']                     =     $_SESSION['name'];
    $data['Email']                    =     $_SESSION['email']; 
    $data['Gender']                   =     $_SESSION['gender'];
    $data['Dob']                      =     $_SESSION['dob'];  
    $data['User Name']                =     $_SESSION['username'];  
    $data['Password']                 =     $_SESSION['pass'];

    addUsers($data);
    


    session_unset();
    session_destroy();
    	
?>
<span class="error"> <b> <h1><?php echo  "successfully completed ";?></h1> </span>

<body style="background-color:#DFF0E2;">




</body>
<?php include('footer.php')?>
</html>