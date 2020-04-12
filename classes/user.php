<?php
class User{
	//attributes
	public $email;
	public $username;
	public $password;
	public $id;
	
	public function create() {
		require_once('database.php');
		$pdo=DB::connect();
		
		//CHECK FOR DUPLICATE EMAIL
		$q=$pdo->prepare('SELECT ID FROM users WHERE email=?');
		$q->execute([$this->email]);
		if($q->rowCount()>0) die('This user already exists.');
		
		//CHECK FOR DUPLICATE USERNAME
		$q=$pdo->prepare('SELECT ID FROM users WHERE username=?');
		$q->execute([$this->email]);
		if($q->rowCount()>0) die('This user already exists.');
		
		//ADD THE USER
		$query='INSERT INTO users (email, username, password) VALUES (?,?,?)';
		$q=$pdo->prepare($query);
		$q->execute([$this->email,$this->username,password_hash($this->password,PASSWORD_DEFAULT)]);
		echo 'Congratulations, you have signed up. <br> <a href="index.php">Back to home page</a>';
	}
	
	public function modify() {
		require_once('database.php');
		$pdo=DB::connect();
		
		//CHECK FOR DUPLICATES
		//CHECK FOR DUPLICATE EMAIL
		$q=$pdo->prepare('SELECT ID FROM users WHERE email=?');
		$q->execute([$this->email]);
		if($q->rowCount()>0) die('This user already exists.');
		
		//CHECK FOR DUPLICATE USERNAME
		$q=$pdo->prepare('SELECT ID FROM users WHERE username=?');
		$q->execute([$this->email]);
		if($q->rowCount()>0) die('This user already exists.');
		
		//MODIFY THE USER
		$query='UPDATE users SET email=?,username=?,password=? WHERE ID=?';
		$q=$pdo->prepare($query);
		$q->execute([$this->email,$this->username,password_hash($this->password, PASSWORD_DEFAULT),$this->id]);
		echo 'User has been modified';
		
	}
	
	public function delete() {
		require_once('database.php');
		$pdo=DB::connect();
		
		//DELETE THE USER
		$query='DELETE FROM users WHERE id=?';
		$q=$pdo->prepare($query);
		$q->execute([$this->id]);
		echo 'User has been removed.';
	}
	
	public function index() {
		require_once('database.php');
		$pdo=DB::connect();
		$edit = 'user_edit.php';
		$delete ='user_delete.php';
		
		$result=$pdo->query('SELECT * FROM users');
		//PROCESS RESULT
		while($record=$result->fetch()) {
			echo 'ID: '.$record['ID'].'<br>Email: '.$record['email'].'<br> Username: '.$record['username'].'<br>';
			echo '<a href="user_edit.php?id='.$record['ID'].'" style="margin-left:0px; margin-right:20px; color:blue;">Edit this user</a>';
			echo '<a href="user_delete.php?id='.$record['ID'].'" style="color:red;">Delete this user</a><br<br><br><br>';
		}
	}
}

