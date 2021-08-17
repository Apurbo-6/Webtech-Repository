
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


     $data['Name1']                     =     $_SESSION['name1'];
     $data['Password1']                 =     $_SESSION['pass1'];

     $data['image1']                    = $_SESSION['image1'];
     $data['User Name']                =     $_SESSION['username'];


    if (updateUsers($data)) {
        //header('location:myProfile.php');
        echo 'Successfully updated!!';
    } else {
        echo 'You are not allowed to access this page.';    
    }
			
?>
<span class="error"> <b> <h1 align="center" style= "color: #15319d;"><?php echo  "Successfully updated";?></h1> </span>

<body>



</body>

<?php
include('../view/footer.php');;
?>


</html>