<?php
defined('EXEC') or die;
Rules::settingsWorkers($main) or die('Access Denied');
$workerGroups = Workers::getGroups();
$workerUsers = Workers::getUsers();
?> 
<p>Группы</p>
<?php

$groupData = new stdClass();
$groupData->checkBoxses = new stdClass();
$fl = '';

foreach($workerGroups as $key => $value){
	
	$name = explode('_',$key)[1];
	
	if($name != 'id'
	&& $name != 'service'
	&& $name != 'name'
	&& $name != 'desc'){
		
		if($fl != $name){
			$fl = $name;
			$groupData->checkBoxses->{$name} = '';
		}
		
		$groupData->checkBoxses->{$name} .= '<label><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</label>';
		
	}else{
		
		$groupData->{$name} = ''. HTML::Name($main,'groups',$key) .' : '.$value.'';
		
	}
	
}
?>
<?php foreach($groupData as $key => $value){ ?>
	<div class="slideBlock hide">
		<form>
		<?php 
		 if(!is_object($value)){
			print $value;
		 }
		?>
		</form>
	</div> 
<?php } ?>

<?php

var_dump($groupData);

//group_id
//group_service_id
//group_name
//group_desc

//var_dump($workerGroups);
//var_dump($workerUsers);
?>
<p>Сотрудники</p>