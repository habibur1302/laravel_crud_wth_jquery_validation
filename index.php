<?php
include 'database.php';

if(isset($_POST['done'])){
	$name=$_POST['user'];
	$address=$_POST['address'];
	$q="INSERT INTO `info` (`name`,`address`) VALUES('$name','$address')";
	$query=mysqli_query($db,$q);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
	<br>
	<div class="col-lg-6 m-auto ">
		
			<div class="card-header bg-dark">
				<h1 class="text-white text-center"> INSERT STUDENT </h1>

			</div>
			<br>
			<form action="display.php" method="post">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Name</label>
			    <input type="text" class="form-control" name="user" >
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Address</label>
			    <input type="text" class="form-control" name="address" >
			  </div>

			  <button type="submit" class="btn btn-primary" name="done">Submit</button>
	
		</form>
	</div>
</body>
</html>