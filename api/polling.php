<?php
define('EXEC',1);
session_start();

if(isset($_GET['poll'])){
	
	define('POLLING',1);
	
	include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
	include $main->root.'/config/pdo.php';
	include $main->root.'/api/controller.php';
	
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
		die('Access Denied');
	}
	
}

?>