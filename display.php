



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
	<br>
	<h1 class="text-center">Display Value</h1>
	<br>
	<div class="col-lg-8 m-auto">
		<table class="table">
		   <thead>
		    <tr>
		      <th>ID</th>
		      <th scope="col">Name</th>
		      <th scope="col">Address</th>
		      <th scope="col">Edit</th>
		      <th scope="col">Delete</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
			include 'database.php';


			$q=" select * from info ";
			$query=mysqli_query($db,$q);
			while ($p=mysqli_fetch_array($query)) {
				# code...
			


			?>
		    <tr>
		      <td><?php echo $p['id']; ?></th>
		      <td><?php echo $p['name'];?></td>
		      <td><?php echo $p['address']; ?></td>
		      <td> <a class="btn btn-info" href="edit.php?id=<?php echo $p['id']; ?>" > Edit</a></td>
		      <td> <a href="delete.php?id=<?php echo $p['id']; ?>" class="btn btn-danger"> Delete</a></td>
		      
		    </tr>
			<?php 
			}
			?>
		  </tbody>
		</table>
	</div>
</body>
</html>