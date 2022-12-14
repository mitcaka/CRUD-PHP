<html>
<head>
	<title>Add Data</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
	<div class="container">
<?php
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
		
	if(empty($name) || empty($age) || empty($email)) {
				
		if(empty($name)) {
			echo "<div class='alert alert-danger' role='alert'>
						Name field is empty.
		  			</div>";
		}
		
		if(empty($age)) {
			echo "<div class='alert alert-danger' role='alert'>
			Age field is empty.
		  </div>";
		}
		
		if(empty($email)) {
			echo "<div class='alert alert-danger' role='alert'>
			Email field is empty.
		  </div>";;
		}
		
		echo "<br/><a href='javascript:self.history.back();' class='btn btn-primary'>Go Back</a>";
	} else { 
			
		$sql ="INSERT INTO users(name,age,email) VALUES('$name','$age','$email')";
		if(mysqli_query($mysqli, $sql)){
			// Lấy ID đã chèn cuối cùng
			$last_id = mysqli_insert_id($mysqli);
			echo "<div class='alert alert-primary' role='alert'>Chèn bản ghi thành công. ID đã chèn cuối cùng là: " . $last_id . "</div>";
		} else{
			echo "<div class='alert alert-danger' role='alert'>ERROR: Không thể thực thi câu lệnh $sql. " . mysqli_error($mysqli) . "</div>";
		}

		// Đóng kết nối
		mysqli_close($mysqli);

		echo "<div class='alert alert-success' role='alert'>
		Data added successfully.
	  </div>";
		echo "<br/><a href='index.php' class='btn btn-primary'>View Result</a>";
	}
}
?>
</div>
</body>
</html>
