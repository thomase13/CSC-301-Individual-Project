<?php
require_once('../../classes/database.php');
require_once('../../classes/admin.php');
require_once('../../classes/auth.php');
require_once('../../classes/template.php');
Template::showHeader('Admin Sign In');

//If the user is already logged in, take them back to the index page.
if(Auth::logged_in()) header('location: ../../admin/index.php');

if(count($_POST)>0){
	$error=Admin::login($_POST,'../../admin/index.php');
	$message=$error;
	$alert_type='danger';
}

if(count($_POST)>0) {
	echo '<div class="alert alert-'.$alert_type.'" role="alert">'.$message.'</div>';
}
?>
<html>
<body>
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
<footer>
<?php Template::showFooter();?>
</footer>
</html>