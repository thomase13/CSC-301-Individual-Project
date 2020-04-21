<?php

class Like{
	//attributes
	public comp_id;
	
	public function create() {
		require_once('../classes/database.php');
	$pdo=DB::connect();

	
		
	$query='INSERT INTO likes (comp_id) VALUES (?)';
	$q=$pdo->prepare($query);
	$q->execute([$this->comp_id]);
		
	}
}