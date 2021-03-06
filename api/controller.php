<?php
defined('EXEC') or die;

include $main->root.'/api/methods/Pdo.php';
include $main->root.'/api/methods/Session.php';

foreach(glob($main->root.'/api/methods/*.php') as $filename){
    if(!strripos($filename,'Session') && !strripos($filename,'Pdo')){
		include $filename;
	}
}

if(isset($_POST['csrf'])){
	$csrdata = Input::getSanitise($_POST['csrf']);
}else{
	if(isset($_GET['csrf'])){
		$csrdata = Input::getSanitise($_GET['csrf']);
	}else{
		$csrdata = false;
	}
}

if($task == 'login'){
	
	if(!$main->csrf = CSRF::check($csrdata)){
		die('Acces denied');
	}
	
	$worker = Workers::findLoginPass($_POST);
	if($worker){
		if($worker->user_status == 1){
			Session::create($worker->user_id);
		}
	}
	header('Location: /');
}

if($task == 'logout'){
	
	if(!$main->csrf = CSRF::check($csrdata)){
		die('Acces denied');
	}
	
	$sessionHash = Session::getHash();
	Session::drop($sessionHash);
	header('Location: /');
}

if(isset($main->task)){
	
	if($main->task == 'update'){
		
		if(!$main->csrf = CSRF::check($csrdata)){
			die('Acces denied');
		}
		
		$Name = $main->view;
		$Param = ucfirst($main->params);
		$NameParam = $Name.$Param;
		
		if(method_exists('Rules',$NameParam)){
			
			if(Rules::$NameParam($main)){
				
				$data = (object)$_POST;
				
				if($Param::update($data)){
					SystemMessage::set('succes','Изменения успешно сохранены!',$main);
				}else{
					SystemMessage::set('error','Вы не внесли никаких изменений!',$main);
				}
				
			}else{
				SystemMessage::set('error','Изменения не были сохранены, у вас недостаточно прав!',$main);
			}
			
		}else{
			SystemMessage::set('error','Изменения не были сохранены, система не может обработать этот запрос!',$main);
		}
		
	}
	
}


?>
