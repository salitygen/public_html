<?php
define('EXEC',1);
ini_set('display_errors','Off');

if(isset($_GET['get']) || isset($_GET['set'])){
	
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
			
			$db = dataBase::pdo();

			if(isset($_GET['get']) && !isset($_GET['set'])){
				
				$lastLogId = (int)Input::getSanitise($_GET['get']);
				$timeout = 24;
				$now = time();

				while((time() - $now) < $timeout){
					
					$logs = $db->query("SELECT * FROM crm_logs WHERE log_id > {$lastLogId}");
					$data = $logs->fetchAll();
					
					if($data != $count){
						
						print $data;
						exit;
						
					}
					
					sleep(1);
					
				}

				print '0';
				
			}elseif(isset($_GET['set'])){
				
				$count = (int)Input::getSanitise($_GET['set']);
				
			}
			
		}else{
			
			die('Access Denied');
			
		}
		
	}else{
		
		die('Access Denied');
		
	}
	
}elseif(isset($_GET['get_hash']) && !isset($_GET['set']) && !isset($_GET['get'])){
	
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