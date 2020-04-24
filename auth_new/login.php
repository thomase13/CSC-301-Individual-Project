<?php
require('../classes/database.php');
require_once('../classes/auth.php');
if(Auth::logged_in()) header('location: ../manager/index.php');

require_once('../classes/template.php');

Template::showHeader('Log In');

//when the user hits submit
if(count($_POST)>0){
	$error=Auth::signIn($_POST,'../manager/index.php');
	$message=$error;
	$alert_type='danger';
}
if(count($_POST)>0) echo '<div class="alert alert-'.$alert_type.'" role="alert">'.$message.'</div>';
?>
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
			<input type="password" class="form-control" name="password"  required minlength="8"/>
			<br>
	<button type="submit" class="btn btn-primary">Submit</button>
	</form>
	<br><br>
<a href="auth_new/signup.php">Create your account</a>
<?php
Template::showFooter();