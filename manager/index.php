<?php
require_once('../classes/companion.php');
require_once('../classes/auth.php');
require_once('../classes/template.php');
session_start();
if(!(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true)) { 
header('location: ../index.php');
}

Template::showManagerHeader('Companion Acquirer');
?>

<?php
?>

<doctype html>
<html lang="en">
	<!--JQuery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<style>
	* {
		margin:5px;
	}
	.a {
		margin-right: 10px;
	}
	</style>
	
	</head>
	<body>
		<button type="button" class="btn btn-success a"  onclick="window.location.href='comp_manage/create.php'">Add a companion</button>
		
		<br><br>
		<?php 
		$companion=new Companion();
		$companion->manager_index();
		?>
</body>
<?php Template::showFooter();?>
</html>