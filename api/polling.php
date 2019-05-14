<?php
defined('EXEC') or die;

	$count = (int)Input::getSanitise($_GET['poll']);
	$timeout = 25;
	$now = time();
	$db = dataBase::pdo();

	while((time() - $now) < $timeout){
		
		$row = $db->query("SELECT * FROM db_updating_table");
		$data = $row->rowCount();
		
		if($data != $count){
			
			print $data;
			exit;
			
		}
		
		sleep(1);
		
	}

	print 'next';
	

?>