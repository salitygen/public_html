<?php
defined('EXEC') or die;
Rules::settingsWorkers($main) or die('Access Denied');
$workerGroups = Workers::getGroups();
$workerUsers = Workers::getUsers();


foreach($workerGroups as $key => $value){
	print HTML::Name($main,'groups',$key) . ' - ' . $value . '<br>';
}

//var_dump($workerGroups);
//var_dump($workerUsers);
?> 

<p>Сотрудники</p>