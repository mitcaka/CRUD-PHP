<?php
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);	
	
	if(empty($name) || empty($age) || empty($email)) {	
			
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}		
	} else {	
		$result = mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',email='$email' WHERE id=$id");
		
		header("Location: index.php");
	}
}
?>
<?php
$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$age = $res['age'];
	$email = $res['email'];
}
?>
<html>
<head>	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Edit Data</title>
</head>

<body>
<div class="container">
	<a href="index.php" class="btn btn-primary">Home</a>
	<br/><br/>
	
	<form action="edit.php" method="post" name="form1">
		<div class="form-group">
			<label>Name</label>
			<input type="text" class="form-control" placeholder="Enter name" name="name" value="<?php echo $name;?>">
		  </div>
		  <div class="form-group">
			<label>Age</label>
			<input type="number" class="form-control" placeholder="Enter age" name="age" value="<?php echo $age;?> ">
		  </div>
		  <div class="form-group">
			<label>Name</label>
			<input type="email" class="form-control" placeholder="Enter Email" name="email" value="<?php echo $email;?> ">
		  </div>

			<input type="submit" name="Submit" value="Save"  class="btn btn-primary">

	</form>
</div>
</body>
</html>
