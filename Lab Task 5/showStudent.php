<?php  
require_once 'showInfo.php';

$users = fetchAllUsers();
//$users=fetchStudent($_GET['username']);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table>
	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>User_name</th>
		<th>Date of Birth</th>
		<th>Gender</th>
		<th>Images</th>

	</tr>
	<?php foreach ($users as $i => $data): ?>
			<tr>
				<td><a href="showStudent.php?id=<?php echo $student['ID'] ?>"><?php echo $data['Name'] ?></a></td>
				<td><?php echo $data['Name'] ?></td>
				<td><?php echo $data['Email'] ?></td>
				<td><?php echo $data['Password'] ?></td>
				
			</tr>
		<?php endforeach; ?>
</table>


</body>
</html>