<?php
defined('EXEC') or die;

$dsn = "mysql:dbname={$main->dbname};host=localhost";

try {
    $db = new PDO($dsn, $main->dbUser, $main->dbPass);
	$db->exec("set names utf8");
} catch (PDOException $e) {
    echo 'Error connect database: ' . $e->getMessage();
}

?>