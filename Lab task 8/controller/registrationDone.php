
<?php
session_start();

if(!empty($_SESSION['username'])){


}
else
    header('Location:registration.php');
?>

<!DOCTYPE html>
<html>

<style>
.error {color: #2BDE1A;}
</style>

<?php
     
     include('../header.php');

     require_once '../model/model.php';


     $data['Name']                     =     $_SESSION['name'];
     $data['Email']                    =     $_SESSION['email']; 
     $data['Gender']                   =     $_SESSION['gender'];
     $data['Dob']                      =     $_SESSION['dob'];  
     $data['User Name']                =     $_SESSION['username'];  
     $data['Password']                 =     $_SESSION['pass'];

     $data['image']                    = $_SESSION['image'];


    if (addUsers($data)) {
        //echo 'Successfully added!!';
    } else {
        echo 'You are not allowed to access this page.';    
    }
			
?>
<span class="error"> <b> <h1 align="center" style= "color: #15319d;"><?php echo  "Thanks for Registration";?></h1> </span>

<body>



</body>

<?php
include('../view/footer.php');;
?>


</html>