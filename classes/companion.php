<?php
class Companion{
	//attributes
	public $name;
	public $picture;
	public $age;
	public $gender;
	public $size;
	public $health;
	public $id;
	
	
	public function create() {
		require_once('database.php');
		$pdo=DB::connect();
		
		//ADD THE COMPANION
		$query='INSERT INTO companions (name, picture, age, gender, size, health) VALUES (?,?,?,?,?,?)';
		$q=$pdo->prepare($query);
		$q->execute([$this->name,$this->picture,$this->age,$this->gender,$this->size,$this->health]);
		echo 'Your companion has been added<br>';
		echo '<a href="index.php">Go back to home page</a>';
	}
	
	public function modify() {
		require_once('database.php');
		$pdo=DB::connect();
		
		//MODIFY THE COMPANION
		$query='UPDATE companions SET name=?,picture=?,age=?,gender=?,size=?,health=? WHERE ID=?';
		$q=$pdo->prepare($query);
		$q->execute([$this->name,$this->picture,$this->age,$this->gender,$this->size,$this->health,$this->id]);
		echo 'Companion has been modified';
	}
	
	public function delete() {
		require_once('database.php');
		$pdo=DB::connect();
		
		//DELETE THE COMPANION
		$query='DELETE FROM companions WHERE ID=?';
		$q=$pdo->prepare($query);
		$q->execute([$this->id]);
		echo 'Companion has been removed.<br>';
	}
	
	public function index() {
		require_once('database.php');
		$pdo=DB::connect();
		
		$result=$pdo->query('SELECT * FROM companions');
		
		//PROCESS RESULT
		while($record=$result->fetch()) {
			echo '<h1><a href="detail.php?id='.$record['id'].'"</a>'.$record['name'].'<br></h1>'; //NAME
			echo '<img src='.$record['picture'].' alt="Companion Picture" style="height:200px"><br><br> ';	//IMAGE
		}
	}
	
	public function detail() {
		require_once('database.php');
		$pdo=DB::connect();

		$query='SELECT * FROM companions WHERE ID=?';
		$q=$pdo->prepare($query);
		$q->execute([$this->id]);
		
		
		if($q->rowCount() == 0) {
			echo '<p>There is no result matching your query.</p>' ;
			die();
		}
		
		$record=$q->fetch();
		echo '<h1 "align:center">'.$record['name'].'</h1>';
		echo '<img src='.$record['picture'].' alt="Companion Picture" style="height:400px"><br><br> ';
		echo '<p>Age: '.$record['age'].'</p>';
		echo '<p>Gender: '.$record['gender'].'</p>';
		echo '<p>Size: '.$record['size'].'</p>';
		echo '<p>Health: '.$record['health'].'</p>';
	}
	
	public function manager_index() {
		require_once('database.php');
		$pdo=DB::connect();
		
		$result=$pdo->query('SELECT * FROM companions');
		//PROCESS RESULT
		while($record=$result->fetch()) {
			echo '<h1><a href="detail.php?id='.$record['id'].'"</a>'.$record['name'].'<br></h1>'; //NAME
			echo '<img src='.$record['picture'].' alt="Companion Picture" style="height:200px"><br> ';	//IMAGE
			echo '<a href="comp_edit.php?id='.$record['id'].'" style="margin-left:0px; margin-right:20px; color:blue;">Edit</a>';
			echo '<a href="comp_delete.php?id='.$record['id'].'" style="color:red;">Delete</a><br>';
			echo '<a href="../like/like_add.php?id='.$record['id'].'">Like</a>';
		}
	}
	
	public function admin_index() {
		require_once('database.php');
		$pdo=DB::connect();
		
		$result=$pdo->query('SELECT * FROM companions');
		//PROCESS RESULT
		while($record=$result->fetch()) {
			echo 'ID: '.$record['id'].'<br>Name: '.$record['name'].'<br>';
			echo '<a href="detail.php?id='.$record['id'].'" style="margin-left:0px; margin-right:20px; color:blue;">See details</a>';
			echo '<a href="comp_edit.php?id='.$record['id'].'" style="margin-left:0px; margin-right:20px; color:blue;">Edit</a>';
			echo '<a href="comp_delete.php?id='.$record['id'].'" style="color:red;">Delete</a><br<br><br><br>';
		}
	}
	
	public function admin_detail() {
		require_once('database.php');
		$pdo=DB::connect();

		$query='SELECT * FROM companions WHERE ID=?';
		$q=$pdo->prepare($query);
		$q->execute([$this->id]);
		
		
		if($q->rowCount() == 0) {
			echo '<p>There is no result matching your query.</p>' ;
			die();
		}
		
		$record=$q->fetch();
		echo 'Name: '.$record['name'].'<br>';
		echo 'Picture URL: '.$record['picture'].'<br>';
		echo 'Age: '.$record['age'].'<br>';
		echo 'Gender: '.$record['gender'].'<br>';
		echo 'Size: '.$record['size'].'<br>';
		echo 'Health: '.$record['health'].'<br>';
		echo '<a href="comp_edit.php?id='.$record['id'].'" style="margin-left:0px; margin-right:20px; color:blue;">Edit</a>';
		echo '<a href="comp_delete.php?id='.$record['id'].'" style="color:red;">Delete</a>';
	}

}