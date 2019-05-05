<?php
defined('EXEC') or die;
Rules::settingsWorkers($main) or die('Access Denied');
$workerGroups = Workers::getGroups();
$workerUsers = Workers::getUsers();
?> 
<p>Группы</p>
<?php
foreach($workerGroups as $key => $value){
	
	$group = explode('_',$key)[1];
	
	if($group == 'general'){
		print '<h3>Основные</h3>';
		print HTML::Name($main,'groups',$key) .' - ' . $value . '<br>';
		
	}elseif($group == 'tasks'){
		print '<h3>Задачи</h3>';
		print HTML::Name($main,'groups',$key) .' - ' . $value . '<br>';
		
	}elseif($group == 'orders'){
		print '<h3>Заказы</h3>';
		print HTML::Name($main,'groups',$key) .' - ' . $value . '<br>';
		
	}elseif($group == 'shop'){
		print '<h3>Магазин</h3>';
		print HTML::Name($main,'groups',$key) .' - ' . $value . '<br>';
		
	}elseif($group == 'tills'){
		print '<h3>Кассы</h3>';
		print HTML::Name($main,'groups',$key) .' - ' . $value . '<br>';
		
	}elseif($group == 'account'){
		print '<h3>Счета</h3>';
		print HTML::Name($main,'groups',$key) .' - ' . $value . '<br>';
		
	}elseif($group == 'returns'){
		print '<h3>Возвраты</h3>';
		print HTML::Name($main,'groups',$key) .' - ' . $value . '<br>';
		
	}elseif($group == 'storage'){
		print '<h3>Склад</h3>';
		print HTML::Name($main,'groups',$key) .' - ' . $value . '<br>';
		
	}elseif($group == 'contractor'){
		print '<h3>Контрагенты</h3>';
		print HTML::Name($main,'groups',$key) .' - ' . $value . '<br>';
		
	}elseif($group == 'reports'){
		print '<h3>Отчеты</h3>';
		print HTML::Name($main,'groups',$key) .' - ' . $value . '<br>';
		
	}elseif($group == 'settings'){
		print '<h3>Настройки</h3>';
		print HTML::Name($main,'groups',$key) .' - ' . $value . '<br>';
		
	}else{
		print '<h3>Прочее</h3>';
		print HTML::Name($main,'groups',$key) .' - ' . $value . '<br>';
		
	}

}

//group_id
//group_service_id
//group_name
//group_desc

//var_dump($workerGroups);
//var_dump($workerUsers);
?>
<p>Сотрудники</p>