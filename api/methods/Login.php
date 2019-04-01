<?php
defined('EXEC') or die;

$sessionHash = Session::getHash();
if($sessionHash){
	$session = Session::check($sessionHash);
	if($session){
		if($session->session_stat){
			define('ISLOGIN',1);
		}
	}
}

$task = Input::task();
if(!defined('ISLOGIN')){
	if(isset($_GET) && isset($_POST)){	
		unset($_GET);
		if($task !== 'login'){
			$task = false;
			unset($_POST);
		}
	}
}else{
	$page = null;
	$view = Input::view();
	if($task || $view){
		$params = Input::getParams();
	}
}

?>