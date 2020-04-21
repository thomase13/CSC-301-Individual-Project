<?php
require_once('database.php');

class Auth {
	static function signUp($data, $header_URL) {
		if(count($data)>0) {
			//check for empty fields
			if(!isset($data['email']{0}) || !isset($data['username']{0}) || !isset($data['password']{0})) return 'You must enter an e-mail, username, and password'; 
			
			//validate e-mail
			if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)) return 'Your e-mail address is not valid';
			$data['email']=strtolower($data['email']); //convert to lowercase
			
			//validate username
			$data['username']=trim($data['username']); //remove spaces
			if(strlen($data['username'])<6) return 'Your username must be at least 6 characters long';
			
			//validate password
			$data['password']=trim($data['password']); //remove spaces
			if(strlen($data['password'])<8) return 'Your password must be at least 8 characters long';
			
			$pdo = DB::connect(); //open db connection
			
			//check for duplicate email
			$query=$pdo->prepare('SELECT ID FROM users WHERE email=?');
			$query->execute([$data['email']]);
			if($query->rowCount()>0) return 'This email already has an account associated.';
			
			//check for duplicate username
			$query=$pdo->prepare('SELECT ID FROM users WHERE username=?');
			$query->execute([$data['username']]);
			if($query->rowCount()>0) return 'This username already has an account associated.';
			
			//encrypt password
			$data['password']=password_hash($data['password'], PASSWORD_DEFAULT);
			
			//store user in db
			$query=$pdo->prepare('INSERT INTO users(email,username,password) VALUES(?,?,?)');
			$query->execute([$data['email'],$data['username'],$data['password']]);
			header('location: '.$header_URL);
			
		}
	}
	
	static function signIn($data,$header_URL){
		session_start();
		if(count($data)>0){
			//Check if all fields are filled
			if(!isset($data['email']{0}) || !isset($data['username']{0}) || !isset($data['password']{0})) return 'You must enter e-mail, username and password';
			
			//Validate email
			if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) return 'Please enter a valid email address';
			$data['email']=strtolower($data['email']);
			
			//Validate the username
			$data['username']=trim($data['username']);
			if(strlen($data['username'])<6) return 'Username must be at least 6 characters long';
			
			// Validate the password
			$data['password']=trim($data['password']);
			if(strlen($data['password'])<8) return 'Your password must be at least 8 characters long.';
			
			$pdo=DB::connect(); //open connection to db
			
			//check for correct email
			$query=$pdo->prepare('SELECT ID, password FROM users WHERE email=?');
			$query->execute([$data['email']]);
			if($query->rowCount()==0) return 'E-mail not associated with any accounts';
			$user=$query->fetch();
			
			//check for correct username
			$query=$pdo->prepare('SELECT ID, password FROM users WHERE username=?');
			$query->execute([$data['username']]);
			if($query->rowCount()==0) return 'Username not associated with any accounts.';
			$user=$query->fetch();
			
			if(!password_verify($data['password'],$user['password'])) return 'Incorrect Password';
			$_SESSION['user/ID']=$user['ID'];
			header('location:'.$header_URL);
			
			}
		}
	
	static function signout($header_URL) {
		$_SESSION=[];
		session_destroy();
		header('location:'.$header_URL);
	}
	
	static function logged_in($key='user/ID'){
		//Check if ID is there and valid
		if(isset($_SESSION[$key])){
			if(is_numeric($_SESSION[$key])) return true;
			else if(isset($_SESSION[$key]{0})) return true;
		}
		return false;
	}
}