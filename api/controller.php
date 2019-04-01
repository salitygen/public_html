<?php
defined('EXEC') or die;
include $main->root.'/api/methods/main.php';
if(defined('ISLOGIN')){
	include $main->root.'/panel/them/controller.php';
}

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

$page = null;

switch($task){
    case 'workshop':
		$page = Render::view($path.'workShop',$params);
    break;
    case '':

    break;
    case '':

    break;
}


?>