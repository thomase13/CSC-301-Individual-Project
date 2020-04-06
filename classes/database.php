<?php

class DB {
	public static function connect(){
		$settings=[
			'host'=>'localhost',
			'db'=>'users',
			'user'=>'root',
			'pass'=>''
		];
		
		$opt=[
			PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES=>false,
		];
		
		//CONNECT TO DATABASE
		$pdo = new PDO('mysql:host='.$settings['host'].';dbname='.$settings['db'].';charset=utf8mb4',$settings['user'],$settings['pass'],$opt);
		
		return $pdo;
	}
}