<?php
session_start();
require('../classes/database.php');
require_once('../classes/auth.php');
require_once('../classes/template.php');
Template::showHeader('Sign Up');
//if(Auth::logged_in()) header('location: ../manager/index.php');

if(count($_POST)>0) {
	$error=Auth::signUp($_POST,'signin.php');
	$message=$error;
	$alert_type='danger';
}

if(count($_POST)>0) {
	echo '<div class="alert alert-'.$alert_type.'"role="alert">'.$message.'</div>';
}
?>

<html>
<body>
<div class="container">
	<form method="POST">
		<div class="form-group">
		<label>Email</label>
		<input type="email" class="form-control" name="email"/>
	</div>
		<div class="form-group">
			<label>Username</label>
			<input type="text" class="form-control" name="username" required minlength="6"/>
	</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="password" required minlength="8" />
			<br>
			</div>
	<button type="submit" class="btn btn-primary">Submit</button>
	</form>
	<br><br>
	<p><a href="signin.php">Sign In to your existing account</a></p>
	
</body>
<?php Template::showFooter();?>
</html>


