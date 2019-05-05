<?php
defined('EXEC') or die;
Rules::settingsWorkers($main) or die('Access Denied');
$workerGroups = Workers::getGroups();
$workerUsers = Workers::getUsers();
?> 
<p>Группы</p>
<?php
foreach($workerGroups as $key => $value){
	print HTML::Name($main,'groups',$key) .' - '. $key . ' - ' . $value . '<br>';
}

//group_id
//group_service_id
//group_name
//group_desc

//var_dump($workerGroups);
//var_dump($workerUsers);
?>
<p>Сотрудники</p>