<?php
defined('EXEC') or die;
include $main->root.'/api/methods/main.php';

if(isset($_GET['task'])){
	$task = checkInput::strip($_GET['task']);
	if($task == 'login'){
		$arrUser = User::findBase($_POST);
		if($arrUser){
			if($arrUser->user_status == 1){
				//$session = Session::getAll($arrUser->user_id);
				if(!$session){
					$sessionId = Session::create($arrUser->user_id);
					$session = Session::get($arrUser->user_id,$sessionId);
				}else{
					Session::drop($arrUser->user_id);
					$session = Session::create($arrUser->user_id);
					if($session){
						$session = Session::get($arrUser->user_id);
					}
				}
			}
		}
	}
}

?>