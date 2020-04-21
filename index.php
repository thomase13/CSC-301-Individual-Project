<?php
require_once('classes/companion.php');
?>

<?php
?>

<doctype html>
<html lang="en">
	<head>
		<meta charset="uft-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<title>Companion Acquirer</title>
	</head>
	<body>
	<div class="container">
	<div align="right">
	<button type="button" class="btn btn-primary" onclick="window.location.href='auth_new/signup.php';">Sign Up</button>
	<button type="button" class="btn btn-primary" onclick="window.location.href='auth_new/signin.php';">Sign In</button>
	<button type="button" class="btn btn-primary" onclick="window.location.href='auth_new/signout.php';">Sign Out</button>
	</div>
		<h1>Companion Acquirer</h1><br>
		
		<?php 
		$companion=new Companion();
		$companion->index();
		?>
</body>
</html>