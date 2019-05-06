<?php
defined('EXEC') or die;
Rules::settingsWorkers($main) or die('Access Denied');
$workerGroups = Workers::getGroups();
$workerUsers = Workers::getUsers();
?> 
<label>Группы</label>
<?php
$checkboxes  = '';
$f1 = $f2 = $f3 = $f4 = $f5 = $f6 = $f7 = $f8 = $f9 = $f10 = $f11 = $f12 = 0;

foreach($workerGroups as $key => $value){
	
	$group = explode('_',$key)[1];
	
	if($group == 'general'){
		
		if($f1 == 0){
			$checkboxes .= '<div class="chkblock"><h3>Основные</h3>';
			$f1++;
		}
		$checkboxes .= '<label><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</label>';
		
	}elseif($group == 'tasks'){
		
		if($f2 == 0){
			$checkboxes .= '</div><div class="chkblock"><h3>Задачи</h3>';
			$f2++;
		}
		$checkboxes .= '<label><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</label>';
		
	}elseif($group == 'orders'){

		if($f3 == 0){
			$checkboxes .= '</div><div class="chkblock"><h3>Заказы</h3>';
			$f3++;
		}
		$checkboxes .= '<label><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</label>';
		
	}elseif($group == 'shop'){
		
		if($f4 == 0){
			$checkboxes .= '</div><div class="chkblock"><h3>Магазин</h3>';
			$f4++;
		}
		$checkboxes .= '<label><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</label>';
		
	}elseif($group == 'tills'){

		if($f5 == 0){
			$checkboxes .= '</div><div class="chkblock"><h3>Кассы</h3>';
			$f5++;
		}
		$checkboxes .= '<label><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</label>';
		
	}elseif($group == 'account'){
		
		if($f6 == 0){
			$checkboxes .= '</div><div class="chkblock"><h3>Счета</h3>';
			$f6++;
		}
		$checkboxes .= '<label><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</label>';
		
	}elseif($group == 'returns'){
		
		if($f7 == 0){
			$checkboxes .= '</div><div class="chkblock"><h3>Возвраты</h3>';
			$f7++;
		}
		$checkboxes .= '<label><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</label>';
		
	}elseif($group == 'storage'){

		if($f8 == 0){
			$checkboxes .= '</div><div class="chkblock"><h3>Склад</h3>';
			$f8++;
		}
		$checkboxes .= '<label><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</label>';
		
	}elseif($group == 'contractor'){

		if($f9 == 0){
			$checkboxes .= '</div><div class="chkblock"><h3>Контрагенты</h3>';
			$f9++;
		}
		$checkboxes .= '<label><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</label>';
		
	}elseif($group == 'reports'){

		if($f10 == 0){
			$checkboxes .= '</div><div class="chkblock"><h3>Отчеты</h3>';
			$f10++;
		}
		$checkboxes .= '<label><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</label>';
		
	}elseif($group == 'settings'){

		if($f11 == 0){
			$checkboxes .= '</div><div class="chkblock"><h3>Настройки</h3>';
			$f11++;
		}
		$checkboxes .= '<label><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</label>';
		
	}else{
		
/* 		if($f12 == 0){
			$checkboxes .= '<h3>Прочее</h3>';
			$f12++;
		}
		$checkboxes .= '<label><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</label>'; */
		
	}

}

print $checkboxes . '</div>';

//group_id
//group_service_id
//group_name
//group_desc

//var_dump($workerGroups);
//var_dump($workerUsers);
?>
<label>Сотрудники</label>