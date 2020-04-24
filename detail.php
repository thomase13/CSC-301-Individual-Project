<?php
require_once('classes/companion.php');
require_once('classes/template.php');
Template::showDetailHeader();
?>

<!doctype html>
<html lang="en">
	<head>
	<title>
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
		<?php Template::showFooter();?>
</html>