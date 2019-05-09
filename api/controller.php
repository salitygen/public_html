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

if(isset($main->task)){
	
	if($main->task == 'update'){
		
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
	
}


?>
