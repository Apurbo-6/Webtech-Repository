

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


<?php


include('../header2.php');


require_once '../model/model.php';

     $data['Name']                     =     $_SESSION['name1'];
     $data['Email']                    =     $_SESSION['email1']; 
     $data['Gender']                   =     $_SESSION['gender1'];
     $data['Dob']                      =     $_SESSION['dob1'];  
     $data['User Name']                =     $_SESSION['username1'];  
     $data['Password']                 =     $_SESSION['pass1'];
     $data['image']                    = $_SESSION['image1'];


    if (addEmployee($data)) {
        //echo 'Successfully added!!';
    } else {
        echo 'You are not allowed to access this page.';    
    }
     //echo "done";
     //addProduct($data);


?>

<style>
.error {color: #15319d;font-size:15px;}
</style>
<style>
.error1 {color: red;font-size:15px;}
</style>


<div class ="error" align="center" <b><br><br>

    
    <span class="error"> <b> <h1 align="center" style= "color: #15319d";><?php echo  "  Successfully Added Employee";?></h1> </span>

</div>


<body>

</body>


<?php


include('../view/footer.php');;


?>

</html>