<?php
session_start();

if(isset($_SESSION['username'])){


}
else{

    header('location: login.php');
}

?>


<?php  
    require_once 'showInfo.php';
    //$_SESSION['username']="Apurbo6";
    //echo 'ok';
    //$users = fetchAllUsers();
    $user = fetchUsers($_SESSION['username']);

?>




<!DOCTYPE html>
<html>
<style>
.error {color: black;}


</style>

 <?php include('header2.php')?>






 <?php

    /*
    $current_data = file_get_contents('info.json');  
    $array_data = json_decode($current_data, true);  
    /*$extra = array(  
         'Name'           =>     $_SESSION['name'],  
         'Email'         =>     $_SESSION['email'],
         'User Name'      =>     $_SESSION['username'],  
         'Password'     =>     $_SESSION['pass'],
         'dob'        =>     $_SESSION['dob'],  
         'gender'  =>     $_SESSION['gender'],
    );  
  */

    /*
    //echo '<fieldset>';
    foreach($array_data as $row)  
        {  
            if($_SESSION['username']==$row["User Name"] && $_SESSION['password']){

             echo "<fieldset><h1 class=\"error\" align = \"center\">Profile Name : ".$row["Name"]."</h1></fieldset>";

             echo "<fieldset><h1 class=\"error\" align = \"center\">Email Address : ".$row["Email"]."</h1></fieldset>";

             echo "<fieldset><h1 class=\"error\" align = \"center\">User Name : ".$row["User Name"]."</h1></fieldset>";

             echo "<fieldset><h1 class=\"error\" align = \"center\">Date of Birth : ".$row["dob"]."</h1></fieldset>";

             echo "<fieldset><h1 class=\"error\" align = \"center\">Gender : ".$row["gender"]."</h1></fieldset>";

            }
        }

        //echo '</fieldset>';

        */
 
?>
<fieldset>
<table align="center">
    <tr>

    </tr>
    <?php //foreach ($users as $i => $data): ?>
            <tr>
                <td><h2 style="color:red">Name: <?php echo $user['Name'] ?></h2> </td>
            <tr>
            <tr>
                <td><h2 style="color:red">Email Adress : <?php echo $user['Email'] ?></h2></td>
            </tr>
            <tr>
                <td><h2 style="color:red" >User Name : <?php echo $user['User_Name'] ?></h2></td>
            </tr>
            <tr>
                <td><h2 style="color:red" > Date Of Birth : <?php echo $user['Dob'] ?></h2></td>
            </tr>
            <tr>
                <td><h2 style="color:red" >Gender : <?php echo $user['Gender'] ?></h2></td>
            </tr>
            <tr>
                <td><h2 style="color:red">Picture : <?php echo $user['Picture'] ?></h2></td>   
            </tr>
        <?php //endforeach; ?>
</table>
</fieldset>






<body style="background-color:#DFF0E2;">




</body>


  <?php include('footer.php')?>

  </html>