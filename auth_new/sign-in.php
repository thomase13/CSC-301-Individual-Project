<?php
//START SESSION
session_start();

//CONNECT TO DATABASE
require 'config.php';

if(isset($_POST['login'])) {
	//RETRIEVE FIELD VALUES FROM FORM
	$username = !empty($_POST['username']) ? trim($_POST['username']) : null;
	$passwd = !empty($_POST['username']) ? trim($_POST['username']) : null;
	
	//RETRIEVE ACCOUNT INFO FOR GIVEN USERNAME
	$query = "SELECT id, username, password FROM users WHERE username = :username";
	$q=$pdo->prepare($query);
	
	//BIND USERNAME VALUE
	$q->bindValue(':username', $username);
	
	$q->execute();
	
	//FETCH ROW
	$user = $q->fetch(PDO::FETCH_ASSOC);
	
	//IF USERNAME NOT FOUND
	if($user === false) die('Incorrect username and/or password.');
	else {
		//CHECK IF PASSWORD MATCHES
		$passwordValid = password_verify($passwd, $user['password']);
		
		if($passwordValid) {
			
			//PROVIDE LOGIN SESSION
			$_SESSION['user_id'] = $user['id'];
			$_SESSION['logged_in'] = time();
			
			//REDIRECT TO PAGE
			header('Location: ../index.php');
			exit;
			
		} else die('Incorrect username and/or password');
		}
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
		<input type="email" class="form-control" name="email" id="email">
	</div>
		<div class="form-group">
			<label>Username</label>
			<input type="text" class="form-control" name="username" id="username">
	</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="password" id="password">
			<br>
	<input type="submit" value="Login" name="login">
	</form>
</body>
</html>