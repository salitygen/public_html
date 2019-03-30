<?php
define('EXEC',1);
session_start();
// The order of connection is important!
include 'config/config.php';
include 'config/pdo.php';
include 'api/controller.php';

$sessionHash = Session::getHash();
if($sessionHash){
	$session = Session::check($sessionHash);
	if($session){
		if($session->session_stat){
			// Admin panel template connection
			include 'panel/index.php';
		}else{
			// Site template connection
			include 'site/index.php';
		}
	}else{
		// Site template connection
		include 'site/index.php';
	}
	
}else{
	// Site template connection
	include 'site/index.php';
}

?>