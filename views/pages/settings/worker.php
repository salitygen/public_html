<?php
defined('EXEC') or die;
Rules::settingsWorkers($main) or die('Access Denied');
$workerGroups = Workers::getGroups();
$workerUsers = Workers::getUsers();
?> 
<p>Группы</p>
<?php

$group = new stdClass();
$group->data = new stdClass();
$group->data->checkBoxses = new stdClass();

$fl = '';

foreach($workerGroups as $key => $value){
	
	$name = explode('_',$key)[1];
	
	if($name != 'id'
	&& $name != 'service'
	&& $name != 'name'
	&& $name != 'desc'){
		
		if($fl != $name){
			$fl = $name;
			$group->data->checkBoxses->{$name} = '';
		}
		
		$group->data->checkBoxses->{$name} .= '<label><input type="checkbox" name="'.$key.'" value="'.$value.'">'. HTML::Name($main,'groups',$key) .'</label>';
		
	}else{
		
		$group->data->{$name} = ''. HTML::Name($main,'groups',$key) .' : '.$value.'';
		
	}
	
}
?>
<?php foreach($group as $data){ ?>
	<div class="slideBlock hide">
		<form>
		<?php //print  $data->id; ?>
		<?php $n = 0;
			foreach($data->checkBoxses as $key => $checkbox){
				print '<div id="bid'.$n.'" class="chkblock"><h3>'. HTML::Name($main,'groups',$key) .'</h3>'.$checkbox.'</div>';
				$n++;
			}
		?>
		</form>
	</div> 
<?php } ?>

<?php

//var_dump($group);

//group_id
//group_service_id
//group_name
//group_desc

//var_dump($workerGroups);
//var_dump($workerUsers);
?>
<p>Сотрудники</p>