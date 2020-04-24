<?php
class Admin{
	//atrributes
	public $email;
	public $username;
	public $password;
	public $id;
	
	public function create() {
		require_once('database.php');
		$pdo=DB::connect();
		
		//CHECK FOR DUPLICATE EMAIL
		$q=$pdo->prepare('SELECT ID FROM admins WHERE email=?');
		$q->execute([$this->email]);
		if($q->rowCount()>0) die('This admin already exists.');
		
		//CHECK FOR DUPLICATE USERNAME
		$q=$pdo->prepare('SELECT ID FROM admins WHERE username=?');
		$q->execute([$this->email]);
		if($q->rowCount()>0) die('This admin already exists.');
		
		//ADD THE ADMIN
		$query='INSERT INTO admins (email, username, password) VALUES (?,?,?)';
		$q=$pdo->prepare($query);
		$q->execute([$this->email,$this->username,password_hash($this->password,PASSWORD_DEFAULT)]);
	}
	
	static function signIn($data,$header_URL){
		if(count($data)>0){
			//Check if all fields are filled
			if(!isset($data['email']{0}) || !isset($data['username']{0}) || !isset($data['password']{0})) return 'You must enter e-mail, username and password';
			
			//Validate email
			if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) return 'Please enter a valid email address';
			$data['email']=strtolower($data['email']);
			
			//Validate the username
			$data['username']=trim($data['username']);
			if(strlen($data['username'])<8) return 'Username must be at least 8 characters long';
			
			// Validate the password
			$data['password']=trim($data['password']);
			if(strlen($data['password'])<8) return 'Your password must be at least 8 characters long.';
			
			$pdo=DB::connect(); //open connection to db
			
			//check for correct email
			$query=$pdo->prepare('SELECT ID, password FROM admins WHERE email=?');
			$query->execute([$data['email']]);
			if($query->rowCount()==0) return 'E-mail not associated with any accounts';
			$user=$query->fetch();
			
			//check for correct username
			$query=$pdo->prepare('SELECT ID, password FROM admins WHERE username=?');
			$query->execute([$data['username']]);
			if($query->rowCount()==0) return 'Username not associated with any accounts.';
			$user=$query->fetch();
			
			if(!password_verify($data['password'],$user['password'])) return 'Incorrect Password';
			$_SESSION['user/ID']=$user['ID'];
			header('location:'.$header_URL);
			
			}
		}
		public function modify() {
		require_once('database.php');
		$pdo=DB::connect();
		
		//CHECK FOR DUPLICATES
		//CHECK FOR DUPLICATE EMAIL
		$q=$pdo->prepare('SELECT ID FROM admins WHERE email=?');
		$q->execute([$this->email]);
		if($q->rowCount()>0) die('This admin already exists.');
		
		//CHECK FOR DUPLICATE USERNAME
		$q=$pdo->prepare('SELECT ID FROM admins WHERE username=?');
		$q->execute([$this->email]);
		if($q->rowCount()>0) die('This admin already exists.');
		
		//MODIFY THE ADMIN
		$query='UPDATE admins SET email=?,username=?,password=? WHERE ID=?';
		$q=$pdo->prepare($query);
		$q->execute([$this->email,$this->username,password_hash($this->password, PASSWORD_DEFAULT),$this->id]);
		echo 'Admin has been modified';
		
	}
	
	public function delete() {
		require_once('../classes/database.php');
		$pdo=DB::connect();
		
		//DELETE THE ADMIN
		$query='DELETE FROM admin WHERE id=?';
		$q=$pdo->prepare($query);
		$q->execute([$this->id]);
		echo 'Admin has been removed.';
	}
	
	public function index() {
		require_once('../classes/database.php');
		$pdo=DB::connect();
		$edit = 'edit.php';
		$delete ='delete.php';
		
		$result=$pdo->query('SELECT * FROM users');
		//PROCESS RESULT
		while($record=$result->fetch()) {
			echo 'ID: '.$record['ID'].'<br>Email: '.$record['email'].'<br> Username: '.$record['username'].'<br>';
			echo '<a href="edit.php?id='.$record['ID'].'" style="margin-left:0px; margin-right:20px; color:blue;">Edit this admin</a>';
			echo '<a href="user_delete.php?id='.$record['ID'].'" style="color:red;">Delete this user</a><br<br><br><br>';
		}
	}
	
	static function login($data, $header_URL) {
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
			$query=$pdo->prepare('SELECT ID, password FROM admins WHERE email=?');
			$query->execute([$data['email']]);
			if($query->rowCount()==0) return 'E-mail not associated with any accounts';
			$user=$query->fetch();
			
			//check for correct username
			$query=$pdo->prepare('SELECT ID, password FROM admins WHERE username=?');
			$query->execute([$data['username']]);
			if($query->rowCount()==0) return 'Username not associated with any accounts.';
			$user=$query->fetch();
			
			if(!password_verify($data['password'],$user['password'])) return 'Incorrect Password';
			session_start();
			$_SESSION["loggedIn"]=true;
			$_SESSION['username']=$data['username'];
			header('location:'.$header_URL);
			
			}
	}
	
}