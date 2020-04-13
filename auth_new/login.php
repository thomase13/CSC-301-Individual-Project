<?php
require_once('../classes/user.php');
session_start();
$error = '';

if(isset($_POST['submit'])) {
	if(empty($_POST['email']) ||  empty($_POST['username']) || empty($_POST['password'])) {
		$error = "One or more attributes is invalid";
	}
	else {
		//DEFINE ATTRIBUTES
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		//CONNECT TO DATABASE
		require_once('../classes/database.php');
		$pdo = DB::connect();
		
		//FETCH INFO FOR USERS
		$query = "SELECT email, username, password FROM users WHERE email=? AND username=? AND password=? LIMIT 1";
		
		$q = $pdo->prepare($query);
		$q->execute($this->email,$this->username,$this->password);
		
		if($q->fetch()) { //FETCH CONTENTS
			$_SESSION['login_user'] = $email;
			header("location: ../index.php");
		}
		else {
			$error = "One or more attributes is invalid";
			}
		$this->pdo = null;
	}
}


if(isset($_SESSION['login_user'])){
	header("location: ../index.php");
}
?>

<html>
<head>

		<meta charset="uft-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<title>Sign Up</title>
		
		  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</head>
<body>
<h1>Sign In</h1>
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
</body>
</html>