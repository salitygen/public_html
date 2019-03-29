<?php
defined('EXEC') or die;

class dataBase{
	
	public function pdo(){
		
		global $main;
		$dsn = "mysql:host=localhost;dbname={$main->dbname};charset=utf8";
		$opt = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
			PDO::ATTR_EMULATE_PREPARES   => false,
		];
		
		$pdo = new PDO($dsn, $main->dbUser, $main->dbPass, $opt);
		return $pdo;
		
	}
}

?>