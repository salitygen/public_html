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

if($task == 'updatecompany'){

	if(Rules::settingsWorkshop($main)){
		$data = (object)$_POST;
		$data->phones = json_encode($data->phones);
		$data->mails = json_encode($data->mails);
		$data->addres = json_encode($data->addres);
		//if(Workshop::update($main,$data)){
			var_dump($data);//return true;
		//}
	}else{
		//return false;
	}
	
}

?>