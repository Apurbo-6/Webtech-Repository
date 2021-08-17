<?php 

require_once 'db_connect.php';


function showAllUsers(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `admin_info` ';
    try{
        $stmt = $conn->query($selectQuery);
        //echo "success";
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function showUsers($username){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `admin_info` where User_Name = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$username]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}



function addUsers($data){
    $conn = db_conn();
    $selectQuery = "INSERT INTO admin_info( Name ,Email, Dob, Gender, User_Name, Password,Picture )
VALUES (:Name,:Email,:Date_Of_Birth,:Gender,:User_Name, :Password,:image )";
    
    
    try{

        $stmt = $conn->prepare($selectQuery);
        
        $stmt->execute([
            ':Name'                =>    $data['Name'],
            ':Email'              =>   $data['Email'],
            ':Date_Of_Birth'     =>     $data['Dob'], 
            ':Gender'           =>     $data['Gender'],     
            ':User_Name'      =>     $data['User Name'],  
            ':Password'     =>     $data['Password'],
            ':image'       => $data['image']
            
        ]);
        //echo 'again';
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}



function addEmployee($data){
    $conn = db_conn();
    $selectQuery = "INSERT INTO employee_info( Name ,Email, Dob, Gender, User_Name, Password,Picture )
VALUES (:Name,:Email,:Date_Of_Birth,:Gender,:User_Name, :Password,:image )";
    
    
    try{

        $stmt = $conn->prepare($selectQuery);
        
        $stmt->execute([
            ':Name'                =>    $data['Name'],
            ':Email'              =>   $data['Email'],
            ':Date_Of_Birth'     =>     $data['Dob'], 
            ':Gender'           =>     $data['Gender'],     
            ':User_Name'      =>     $data['User Name'],  
            ':Password'     =>     $data['Password'],
            ':image' => $data['image']
            
        ]);
        //echo 'again';
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


/*
function addProduct($data){
    $conn = db_conn();
    $selectQuery = "INSERT INTO product( ID, Name ,Buy_Price, Sell_Price,image)
VALUES (:Id,:name,:buyPrice,:sellPrice,:image)";
    
    //echo "done";
    try{
        echo "done";

        $stmt = $conn->prepare($selectQuery);
        
        $stmt->execute([
            ':Id'                =>    $data['productId'],
            ':name'                =>    $data['productName'],
            ':buyPrice'              =>   $data['buyPrice'],
            ':sellPrice'     =>     $data['sellPrice'],
            ':image' => $data['image']
            
        ]);
        //echo 'again';
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}



function showAllProduct(){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `product` ';
    try{
        $stmt = $conn->query($selectQuery);
        //echo "success";
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

*/

/*function showProduct($productName){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `product` where Name = ?";
    //echo "search";

    try {
        
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$productName]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //echo "search";

    return $row;
}*/


/*
function showProduct($productName){
    
    $productName="Lux";


    $conn = db_conn();
    $selectQuery = "SELECT * FROM `product` where Name = ?";
    //echo "search";

    try {
        
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$productName]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //echo "search";



    echo "<table>
    <tr>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Age</th>
    <th>Hometown</th>
    <th>Job</th>
    </tr>";
    echo "search";

    foreach ($row as $i => $data):
        
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Buy_Price'] . "</td>";
        echo "<td>" . $row['Sell_Price'] . "</td>";
        echo "<td>" . $row['image'] . "</td>";
        echo "</tr>";
    endforeach;
    echo "</table>";

 }   
*/

/*
function search($productName){
    
    $q=$productName="Lux";
    


    $con = mysqli_connect('localhost','root','','eshop');
    if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con,"ajax_demo");
    $sql="SELECT * FROM product WHERE Name = '".$q."'";
    $result = mysqli_query($con,$sql);


    echo "<table>
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Buy Price</th>
    <th>Sell Price</th>
    <th>Image</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
        echo "succes";
    echo "<tr>";

        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Buy_Price'] . "</td>";
        echo "<td>" . $row['Sell_Price'] . "</td>";
        echo "<td>" . $row['image'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";


    mysqli_close($con);
}

*/

/*
function searchUser($user_name){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `user_info` WHERE Username LIKE '%$user_name%'";

    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
*/

/*
function addStudent($data){
	$conn = db_conn();
    $selectQuery = "INSERT into user_info (Name, Surname, Username, Password, image)
VALUES (:name, :surname, :username, :password, :image)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':name' => $data['name'],
        	':surname' => $data['surname'],
        	':username' => $data['username'],
        	':password' => $data['password'],
        	':image' => $data['image']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}
*/

/*
function updateStudent($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE user_info set Name = ?, Surname = ?, Username = ? where ID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['name'], $data['surname'], $data['username'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

*/

/*
function deleteStudent($id){
	$conn = db_conn();
    $selectQuery = "DELETE FROM `user_info` WHERE `ID` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}

*/