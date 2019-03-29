<?php
defined('EXEC') or die;

$dsn = "mysql:host=localhost;dbname={$main->dbname};charset=utf8";
$opt = [
	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES   => false,
];
$db = new PDO($dsn, $main->dbUser, $main->dbPass, $opt);

?>