<?php
define('EXEC',1);
session_start();

if(isset($_GET['poll'])){
	
	//define('POLLING',1);
	
	include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
	include $main->root.'/config/pdo.php';
	//include $main->root.'/api/controller.php';
	
	define('ISLOGIN',1);
	
	if(defined('ISLOGIN')){

		$count = (int)$_GET['poll'];
		$timeout = 20;
		$now = time();
		$db = dataBase::pdo();

		while((time() - $now) < $timeout){
			
			if(isset($_COOKIE['abort'])){
				$abort = (int)$_COOKIE['abort'];
				if($abort == 1){
					exit;
				}
			}
			
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
		
		die('Access Denied');
		
	}
	
}

?>