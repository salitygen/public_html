<?php
defined('EXEC') or die;
include $main->root.'/api/methods/main.php';

if(isset($_GET['task'])){
	$task = Input::sanitise($_GET['task']);
	if($task == 'login'){
		$user = User::find($_POST);
		if($user){
			if($user->user_status == 1){
				Session::create($user->user_id);
				header('Location: /');
			}
		}
	}
}

// NOT REMOVE! IS CHECK LOGINED USER!!!
$sessionHash = Session::getHash();
if($sessionHash){
	$session = Session::check($sessionHash);
	if($session){
		if($session->session_stat){
			define('ISLOGIN',1);
		}
	}
}
if(!defined('ISLOGIN')){
	if(isset($_GET)){
		unset($_GET);
	}
}
print $_GET['test'];
// NOT REMOVE! IS CHECK LOGINED USER!!!

?>