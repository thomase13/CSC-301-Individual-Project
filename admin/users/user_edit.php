<?php
require_once('../../classes/database.php');
require_once('../../classes/user.php');
$pdo=DB::connect();
$query=$pdo->prepare('SELECT * FROM users WHERE ID=?');
//$query->execute([$_GET['ID']]);
print_r($user);
	
if(count($_POST)>0) {
	$user=$query->fetch();	
}
?>

<html>
<head>
		<meta charset="uft-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<title>Edit a User</title>
		
		  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</head>
<body>
<div class="container">
	<h1>Edit this user</h1>
	<form method="POST">
		<div class="form-group">
		<label>Email</label>
		<input type="email" class="form-control" name="email" />
	</div>
		<div class="form-group">
			<label>Username</label>
			<input type="text" class="form-control" name="username" />
	</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="password" />
			<br>
	<button type="submit" class="btn btn-primary">Submit</button>
	</form>
	</div>
</body>
</html>

