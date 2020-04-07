<?php
require_once('../classes/companion.php');
?>

<?php
?>

<doctype html>
<html lang="en">
	<head>
		<title>Companions</title>
	</head>
	<body>
		<h1>Companion Acquirer</h1><br>
		<button type="button" onclick="window.location.href='comp_manage/create.php'">Add a companion</button>
		<br><br>
		<?php 
		$companion=new Companion();
		$companion->admin_index();
		?>
</body>
</html>