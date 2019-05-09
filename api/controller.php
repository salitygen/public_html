<?php
defined('EXEC') or die;

include $main->root.'/api/methods/Session.php'; // Должен идти первым
foreach(glob($main->root.'/api/methods/*.php') as $filename){
    if(!strripos($filename,'Session')){
		include $filename;
	}
}

if($task == 'login'){
	$user = Users::findLoginPass($_POST);
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

if($task == 'updategeneral'){
	if(Rules::settingsGeneral($main)){
		$data = (object)$_POST;
		if(General::update($data)){
			SystemMessage::set('succes','Изменения успешно сохранены!',$main);
		}
	}
}


// ==================================

if($main->task == 'updateworkshop'){
	$Name = $main->view;
	$Param = ucfirst($main->params);
	$NameParam = $Name.$Param;
	if(method_exists('Rules',$NameParam)){
		if(Rules::$NameParam($main)){
			$data = (object)$_POST;
			if($Param::update($data)){
				SystemMessage::set('succes','Изменения успешно сохранены!',$main);
			}
		}
	}
}

// ==================================


/* if($task == 'updateworkshop'){
	if(Rules::settingsWorkshop($main)){
		$data = (object)$_POST;
		if(Workshop::update($data)){
			SystemMessage::set('succes','Изменения успешно сохранены!',$main);
		}
	}
} */

if($task == 'updateservice'){
	if(Rules::settingsService($main)){
		$data = (object)$_POST;
		if(Service::update($data)){
			SystemMessage::set('succes','Изменения успешно сохранены!',$main);
		}
	}
}

if($task == 'updategroups'){
	if(Rules::settingsGroups($main)){
		$data = (object)$_POST;
		if(Groups::update($data)){
			SystemMessage::set('succes','Изменения успешно сохранены!',$main);
		}
	}
}

?>
