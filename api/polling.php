<?php
define('EXEC',1);
session_start();

if(isset($_GET['poll'])){
	
	include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
	include $main->root.'/config/pdo.php';
	include $main->root.'/api/controller.php';
	
	$sessionHash = Session::getHash();
	if($sessionHash){
		$session = Session::check($sessionHash);
		if($session){
			if($session->session_stat && $session->user_status){
				$main->session = $session;
				define('ISLOGIN',1);
				print 1;
			}
		}
	}
	
/* 	if(defined('ISLOGIN')){

		$count = (int)Input::getSanitise($_GET['poll']);
		$timeout = 25;
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
	} */
	
}

?>