<?php
include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); 
?>

<html>
<head>	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Homepage</title>
</head>

<body>
<div class="container">
<a class="btn btn-primary" href="add.html">Add New Data</a><br/><br/>

<table class="table">
  <thead class="thead-dark">
	<tr>
		<th scope="col">Name</th>
		<th scope="col">Age</th>
		<th scope="col">Email</th>
		<th scope="col">Update</th>
	</tr>
	</thead>
	<tbody>
	<?php 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['name']."</td>";
		echo "<td>".$res['age']."</td>";
		echo "<td>".$res['email']."</td>";	
		echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</tbody>
	</table>
</div>
</body>
</html>
