<?php
define('EXEC',1);
ini_set('display_errors','Off');

if(isset($_GET['poll'])){
	
	include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
	include $main->root.'/config/pdo.php';
	include $main->root.'/api/methods/Input.php';
	include $main->root.'/api/methods/Session.php';
	
	if(isset($_GET['hash'])){
		
		$sessionHash = Input::getSanitise($_GET['hash']);
		
		if($sessionHash){
			$session = Session::check($sessionHash,true);
			if($session){
				if($session->session_stat && $session->user_status){
					define('ISLOGIN',1);
				}
			}
		}
		
		if(defined('ISLOGIN')){

			$count = (int)Input::getSanitise($_GET['poll']);
			$timeout = 20;
			$now = time();
			$db = dataBase::pdo();

			while((time() - $now) < $timeout){
				
				$row = $db->query("SELECT * FROM crm_users");
				$data = $row->rowCount();
				
				if($data != $count){
					
					print $data;
					exit;
					
				}
				
				sleep(1);
				
			}

			print 'next';
			
		}else{
			
			die('Access Denied1');
			
		}
		
	}else{
		
		die('Access Denied');
		
	}
	
}elseif(isset($_GET['get_hash']) && !isset($_GET['poll'])){
	
	include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
	include $main->root.'/api/methods/Input.php';

	$sessionId = Input::getSanitise($_GET['get_hash']);
	session_id($sessionId);
	session_start();
	print md5($sessionId.''.$_SESSION['session_hash']);
	
}else{
	die('Access Denied');
}

?>