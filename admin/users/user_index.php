<?php
require_once('../../classes/database.php');
require_once('../../classes/user.php');
?>
<html>
<head>
		<meta charset="uft-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<title>User Index</title>
		
		<style>
		* {
			margin: 5px;
		}
		</style>
	</head>
	<body>
	<h1>User Index</h1>
	<br>
	<button style="margin-left: 5px;" class="btn btn-success" onclick="window.location.href = '../../auth_new/signup.php';">Add a user</button>
		<br><br>
	</body>
</html>

<?php
$user = new User();
$user->index();
?>
