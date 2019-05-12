<?php
defined('EXEC') or die;
Rules::settingsGroups($main) or die('Access Denied');
$groups = Groups::getAll();
$services = Service::getAll();

if(isset($_GET['id'])){
	$opened = (int)Input::getSanitise($_GET['id']);
}else{
	$opened = 0;
}

$group = new stdClass();
$group->data = new stdClass();
$group->data->checkBoxses = new stdClass();
$fl = '';

foreach($groups as $key => $value){
	$name = explode('_',$key)[1];
	if($name != 'id'
	&& $name != 'service'
	&& $name != 'name'
	&& $name != 'desc'){
		if($fl != $name){
			$fl = $name;
			$group->data->checkBoxses->{$name} = '';
		}
		$group->data->checkBoxses->{$name} .= '<label><input type="hidden" name="ch['.$key.']" value="0"><input type="checkbox" value="1" name="ch['.$key.']" '.($value == 1 ? 'checked="checked"' : '').'>'. HTML::Name($main,'groups',$key) .'</label>';
	}else{ 
		if($name == 'service'){
			$group->data->{$name} = '<select name="group_service_id">';
				$group->data->{$name} .= '<option value="0" '.($value == 0 ? 'selected' : '').'>'. HTML::Name($main,'groups','GROUP_SERVICE_ALL') .'</option>';
			foreach($services as $service){
				$group->data->{$name} .= '<option value="'. $service->service_id .'"'.($value == $service->service_id ? 'selected' : '').'>'.$service->service_name.'</option>';
			}
			$group->data->{$name} .= '</select>';
		}else{
			$group->data->{$name} = $value;
		}
	}
}

?>
<p>Группы</p>
<?php if($mess = SystemMessage::get($main)) print $mess; ?>
<div id="groupList">
	<?php foreach($group as $data): ?>
	<div class="slideBlock <?php print ($opened !== $data->id ? 'hide' : 'show' ); ?>">
		<form action="/?view=settings&params=groups&task=update&id=<?php print $data->id; ?>" method="POST">
			<div class="panel">
				<button class="openClose icon-down-open"></button>
			</div>
			<div class="groupName">
				<input type="text" required="required" name="group_name" value="<?php print $data->name; ?>">
			</div>
			<div class="groupService">
				<label><?php print HTML::Name($main,'groups','GROUP_SERVICE'); ?></label>
				<?php print $data->service; ?>
			</div>
			<div class="groupDesc">
				<label><?php print HTML::Name($main,'groups','GROUP_DESC'); ?></label>
				<textarea name="group_desc"><?php print $data->desc; ?></textarea>
			</div>
			<div class="listChkBlocks">
			<?php $n = 0;
				foreach($data->checkBoxses as $key => $checkbox){
					print '<div id="bid'.$n.'" class="chkblock"><h3>'. HTML::Name($main,'groups',$key) .'</h3>'.$checkbox.'</div>';
					$n++;
				}
			?>
			</div>
			<button class="save icon-floppy" type="submit" name="group_id" value="<?php print $data->id; ?>"><?php print HTML::Name($main,'global','SAVE') ?></button>
		</form>
	</div> 
	<?php endforeach;?>
</div>
