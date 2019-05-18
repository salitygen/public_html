<?php
header("X-Frame-Options: SAMEORIGIN");
define('EXEC',1);
session_start();

include 'config.php';
include 'api/controller.php';
$main->csrf = CSRF::set();

if(defined('ISLOGIN')){
	// Admin panel template connection
	include 'panel/index.php';
}else{
	// Site template connection
	include 'site/index.php';
}
?>