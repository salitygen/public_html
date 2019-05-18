<?php
header("X-Frame-Options: SAMEORIGIN");
define('EXEC',1);
session_start();

include 'config.php';
include 'api/controller.php';
$main->csrf = CSRF::set();

if(defined('ISLOGIN')){
	//
	include 'admin/index.php';
}else{
	include 'login/index.php';
}
?>