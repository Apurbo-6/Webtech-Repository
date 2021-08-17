




<?php

    $con = mysqli_connect('localhost','root','','greenDhaka');
    if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con,"ajax_demo");
    $sql="SELECT * FROM `employee_info` ";
    $result = mysqli_query($con,$sql);


    echo '<table align="center">
    <tr>
    <th>Name</th>
    <th>Email</th>
    <th>User Name</th>
    <th>Password</th>
    <th>DOB</th>
    <th>Gender</th>
    <th>Picture</th>
    <th>Action</th>
    </tr>';

    while($row = mysqli_fetch_array($result)) {
        //echo "succes";
    echo "<tr>";


        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['User_Name'] . "</td>";
        echo "<td>" . $row['Password'] . "</td>";
        echo "<td>" . $row['Dob'] . "</td>";
        echo "<td>" . $row['Gender'] . "</td>";
        echo '<td>'.'<img id="image" width="100px" src="../uploads/'.$row['Picture'].'" >'.'</td>';
        //echo '<td><a href="delete.php?rn=$row["User_Name"]">Delete</a></td>';
        //echo '<td><a href="?rn='.$row['User_Name'].'" >Delete</a></td>';
        $username=$row['User_Name'];
        echo '<td><button onclick="deleteEmployee(\''.$username.'\')">Delete</button></td>';
        echo "</tr>";

        /*/alt="<?php echo $row["image"] ?>"*/
    }
    echo "</table>";




    mysqli_close($con);

  ?>




  
  