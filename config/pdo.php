<?php
defined('EXEC') or die;

class dataBase{
	
	public function pdo(){
		
		$dsn = "mysql:host=localhost;dbname={$main->dbname};charset=utf8";
		$opt = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false,
		];
		
		$pdo = new PDO($dsn, $main->dbUser, $main->dbPass, $opt);
		return $pdo;
		
	}
}

?>