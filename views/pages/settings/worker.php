<?php
defined('EXEC') or die;
Rules::settingsWorkers($main) or die('Access Denied');
$workerGroups = Workers::getGroups();
$workerUsers = Workers::getUsers();
?> 
<p>Группы</p>
<?php
$checkboxes  = '';
$f1 = $f2 = $f3 = $f4 = $f5 = $f6 = $f7 = $f8 = $f9 = $f10 = $f11 = $f12 = 0;

foreach($workerGroups as $key => $value){
	
	$group = explode('_',$key)[1];
	
	if($group == 'general'){
		
		if($f1 == 0){
			$checkboxes .= '<h3>Основные</h3>';
			$f1++;
		}
		$checkboxes .= '<p><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</p>';
		
	}elseif($group == 'tasks'){
		
		if($f2 == 0){
			$checkboxes .= '<h3>Задачи</h3>';
			$f2++;
		}
		$checkboxes .= '<p><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</p>';
		
	}elseif($group == 'orders'){

		if($f3 == 0){
			$checkboxes .= '<h3>Заказы</h3>';
			$f3++;
		}
		$checkboxes .= '<p><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</p>';
		
	}elseif($group == 'shop'){
		
		if($f4 == 0){
			$checkboxes .= '<h3>Магазин</h3>';
			$f4++;
		}
		$checkboxes .= '<p><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</p>';
		
	}elseif($group == 'tills'){

		if($f5 == 0){
			$checkboxes .= '<h3>Кассы</h3>';
			$f5++;
		}
		$checkboxes .= '<p><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</p>';
		
	}elseif($group == 'account'){
		
		if($f6 == 0){
			$checkboxes .= '<h3>Счета</h3>';
			$f6++;
		}
		$checkboxes .= '<p><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</p>';
		
	}elseif($group == 'returns'){
		
		if($f7 == 0){
			$checkboxes .= '<h3>Возвраты</h3>';
			$f7++;
		}
		$checkboxes .= '<p><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</p>';
		
	}elseif($group == 'storage'){

		if($f8 == 0){
			$checkboxes .= '<h3>Склад</h3>';
			$f8++;
		}
		$checkboxes .= '<p><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</p>';
		
	}elseif($group == 'contractor'){

		if($f9 == 0){
			$checkboxes .= '<h3>Контрагенты</h3>';
			$f9++;
		}
		$checkboxes .= '<p><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</p>';
		
	}elseif($group == 'reports'){

		if($f10 == 0){
			$checkboxes .= '<h3>Отчеты</h3>';
			$f10++;
		}
		$checkboxes .= '<p><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</p>';
		
	}elseif($group == 'settings'){

		if($f11 == 0){
			$checkboxes .= '<h3>Настройки</h3>';
			$f11++;
		}
		$checkboxes .= '<p><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</p>';
		
	}else{
		
/* 		if($f12 == 0){
			$checkboxes .= '<h3>Прочее</h3>';
			$f12++;
		}
		$checkboxes .= '<p><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</p>'; */
		
	}

}

print $checkboxes;

//group_id
//group_service_id
//group_name
//group_desc

//var_dump($workerGroups);
//var_dump($workerUsers);
?>
<p>Сотрудники</p>