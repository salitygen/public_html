<?php
define('EXEC',1);
session_start();
// The order of connection is important!
include 'config/config.php';
include 'config/pdo.php';
include 'api/controller.php';
var_dump($main);
$main->csrf = CSRF::set();

if(defined('ISLOGIN')){
	// Admin panel template connection
	include 'panel/index.php';
}else{
	// Site template connection
	include 'site/index.php';
}
	

?>