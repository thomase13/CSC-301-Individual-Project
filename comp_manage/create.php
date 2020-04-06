<?php
if(count($_POST)>0) {
	require_once('../classes/database.php');
	DB::connect();
	require_once('../classes/companion.php');
	
	
	$companion=new Companion;
	$companion->name=$_POST['name'];
	$companion->picture=$_POST['picture'];
	$companion->age=$_POST['age'];
	$companion->gender=$_POST['gender'];
	$companion->size=$_POST['size'];
	$companion->health=$_POST['health'];
	$companion->create();
	
}
?>

<html>
<head>
		<meta charset="uft-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<title>Add a Companion</title>
		
		  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</head>
<body>
<div class="container">
	<h1>Add a new companion</h1>
	<form method="POST">
		<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control" name="name" />
	</div>
		<div class="form-group">
			<label>Picture</label>
			<input type="text" class="form-control" name="picture" />
	</div>
		<div class="form-group">
			<label>Age</label>
			<input type="text" class="form-control" name="age" />
	</div>
		<div class="form-group">
			<label>Gender</label>
			<input type="text" class="form-control" name="gender" />
	</div>
		<div class="form-group">
			<label>Size</label>
			<input type="text" class="form-control" name="size" />
	</div>
		<div class="form-group">
			<label>Health</label>
			<input type="text" class="form-control" name="health" />
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
	</form>
	</div>
</body>
</html>

<form action="create.php" method="POST">
Name: <br><input type="text" name="name"><br>
Gender: <br><input type="text" name="gender"><br>
Age:    <br><input type="text" name="age"><br>
Size:   <br><input type="text" name="size"><br>
Health: <br><input type="text" name="health"><br>
Picture URL: <br><input type="text" name="picture"><br>
<input type="submit">