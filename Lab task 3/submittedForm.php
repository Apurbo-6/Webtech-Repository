
<?php
session_start();
?>


<!DOCTYPE html>
<html>

<style>
.error {color: #2BDE1A;}
</style>

<?php

    $current_data = file_get_contents('data.json');  
    $array_data = json_decode($current_data, true);  
    $extra = array(  
         'Name'     			=>     $_SESSION['name'],  
         'Email'     		 =>     $_SESSION['email'],
         'User Name'      =>     $_SESSION['username'],  
         'Password'     =>     $_SESSION['pass'],
         'dob'     	  =>     $_SESSION['dob'],  
         'gender'  =>     $_SESSION['gender'],
    );  

    $array_data[] = $extra;  
    $final_data = json_encode($array_data);  
    if(file_put_contents('data.json', $final_data))  
    {  
         $message = " <label class='text-success'>File Appended  Success fully</p>"; 
    }    
	else  
	{  
		$error = 'JSON File not exits';  
	} 
			
?>
<span class="error"> <b> <h1><?php echo  " The registration successfully completed ";?></h1> </span>

<body>



</body>

</html>