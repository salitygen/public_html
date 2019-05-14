<?php
defined('EXEC') or die;

if(isset($_GET['count'])){

	$count = (int)Input::getSanitise($_GET['count']);
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
	
}

?>