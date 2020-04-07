<?php
require_once('classes/companion.php');
?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset=:utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<title>Companion</title>
		
		<style>
		@media only screen and (max-width: 683px) {
			h1 {text-align:center;}
		}
		</style>
		</head>
		<body>
			<div class="container">
			<?php
			$id=$_GET['id'];
			$companion=new Companion();
			$companion->id=$id;
			$companion->detail();
			?>
			</div>
		</body>
</html>