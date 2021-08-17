<?php
session_start();

if(isset($_SESSION['username'])){


}
else{

    header('location: ../controller/login.php');
}

?>


<?php  
    require_once 'readData.php';
    //$_SESSION['username']="Apurbo6";
    //echo 'ok';
    //$users = fetchAllUsers();
    $user = fetchUsers($_SESSION['username']);

?>




<!DOCTYPE html>
<html>



<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
  <title>My profile</title>
</head>


<style>
    .error {color: black;}

    table, th, td {
          border: 4px solid black;
          
        }

    th, td {
        padding: 4px;
    }


</style>




 <?php include('../header2.php')?>






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
<p><br></p>
<div  align="center">
<table id="content" align="center" style="color:#0F9934;">
    <tr>

    </tr>
    <?php //foreach ($users as $i => $data): ?>

            <tr>
                <td align="center"> <img align="center" width="100px" src="<?php echo '../uploads/'.$user['Picture'].'"';?>"></td>
            <tr>
            <tr>
                <td><h4>Name: <?php echo $user['Name'] ?></h4> </td>
            <tr>
            <tr>
                <td><h4>Email Adress : <?php echo $user['Email'] ?></h4></td>
            </tr>
            <tr>
                <td><h4>User Name : <?php echo $user['User_Name'] ?></h4></td>
            </tr>
            <tr>
                <td><h4> Date Of Birth : <?php echo $user['Dob'] ?></h4></td>
            </tr>
            <tr>
                <td><h4>Gender : <?php echo $user['Gender'] ?></h4></td>
            </tr>
            <tr>
                <!--<td><h4>Picture : <?//php echo $user['Picture'] ?></h4></td>  --> 
            </tr>
        <?php //endforeach; ?>
</table>

</div>
<p><br></p>
</fieldset>





</body>


  <?php include('footer.php');?>

  </html>