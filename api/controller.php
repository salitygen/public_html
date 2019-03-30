<?php
defined('EXEC') or die;
include $main->root.'/api/methods/main.php';

if(isset($_GET['task'])){
	$task = checkInput::strip($_GET['task']);
	if($task == 'login'){
		$arrUser = User::findBase($_POST);
		if($arrUser){
			if($arrUser->user_status == 1){
				Session::create($arrUser->user_id);
				header('Location: /');
			}
		}
	}
}

?>