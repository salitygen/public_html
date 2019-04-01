<?php
defined('EXEC') or die;
include $main->root.'/api/methods/main.php';

if($task == 'login'){
	$user = User::find($_POST);
	if($user){
		if($user->user_status == 1){
			Session::create($user->user_id);
		}
	}
	header('Location: /');
}

if($task == 'logout'){
	$sessionHash = Session::getHash();
	Session::drop($sessionHash);
	header('Location: /');
}

?>