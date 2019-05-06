<?php
defined('EXEC') or die;
Rules::settingsWorkers($main) or die('Access Denied');
$workerGroups = Workers::getGroups();
$workerUsers = Workers::getUsers();
?> 
<p>Группы</p>

<?php

$ch = array();
$fl = 0;

foreach($workerGroups as $key => $value){
	
	$name = explode('_',$key)[1];
	
	if($fl != $key){
		$ch[$name] = '';
		$fl = $key;
	}
	$ch[$name] .= '<label><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</label>';
	
}

var_dump($ch);

//group_id
//group_service_id
//group_name
//group_desc

//var_dump($workerGroups);
//var_dump($workerUsers);
?>
<p>Сотрудники</p>