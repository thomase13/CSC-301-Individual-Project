<?php
session_start();
$error = '';

if(isset($_POST['submit'])) {
	if(empty($_POST['email']) ||  empty($_POST['username']) || empty($_POST['password'])) {
		$error = "One or more attributes is invalid";
	}
	else {
		//DEFINE ATTRIBUTES
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		//CONNECT TO DATABASE
		require_once('../classes/database.php');
		$pdo = DB::connect();
		
		//FETCH INFO FOR USERS
		$query = "SELECT email, username, password FROM users WHERE email=? AND username=? AND password=? LIMIT 1";
		
		$q = $pdo->prepare($query);
		$q->execute($this->email,$this->username,$this->password);
		
		if($q->fetch()) { //FETCH CONTENTS
			$_SESSION['login_user'] = $email;
			header("location: ../index.php");
		}
		else {
			$error = "One or more attributes is invalid";
			}
		$this->pdo = null;
	}
}
?>