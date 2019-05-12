<?php
defined('EXEC') or die;
Rules::settingsWorkers($main) or die('Access Denied');

if($main->session->user_service_id !== 0){
	$selectAll = false; 
	$services = Service::get($main->session->user_service_id); 
}else{
	$selectAll = true;
	$services = Service::getAll(); 
}

if($main->session->user_workshop_id !== 0){
	$selectAll2 = false; 
	$workshops = Workshop::getService($main->session->user_workshop_id); 
}else{
	$selectAll2 = true; 
	$workshops = Workshop::getAll();
}

$workers = Workers::getAll();

if(isset($_GET['id'])){
	$opened = (int)Input::getSanitise($_GET['id']);
}else{
	$opened = 0;
}

?>
<p>Сотрудники</p>
<?php if($mess = SystemMessage::get($main)) print $mess; ?>
<div id="workersList">
	<?php foreach($workers as $worker):?>
	<div class="slideBlock <?php print ($opened !== $worker->user_id ? 'hide' : 'show' ); ?>">
		<form action="/?view=settings&params=workers&task=update&id=<?php print $worker->user_id; ?>" method="POST">
			<div class="panel">
				<div class="status">
					<?php if($worker->user_status):?>
					<p>Работает</p>
					<?php else:?>
					<p class="off">Не работает</p>
					<?php endif;?>
				</div>
				<div class="center">
				  <input type="checkbox" name="user_status" id="cbx<?php print $worker->user_id; ?>" style="display:none" <?php if($worker->user_status) print 'checked="true"'; ?> >
				  <label for="cbx<?php print $worker->user_id; ?>" class="toggle"><span></span></label>   
				</div>
				<button class="openClose icon-down-open"></button>
			</div>
			<div class="workerName name">
				<input type="text" disabled="disabled" required="required" name="user_name" value="<?php if($worker->user_name != '') print $worker->user_name; ?>">
			</div>
			<div class="workerService grouplist">
				<label><?php print HTML::Name($main,'groups','GROUP_SERVICE'); ?></label>
				<select name="user_service_id">
					<?php if($selectAll):?>
					<option value="0" <?php print ($worker->user_service_id == 0 ? 'selected' : ''); ?>>
					<?php print HTML::Name($main,'groups','GROUP_SERVICE_ALL'); ?>
					</option>
					<?php endif;?>
					<?php foreach($services as $service): ?>
					<option value="<?php print $service->service_id; ?>"<?php print ($worker->user_service_id == $service->service_id ? 'selected' : ''); ?>>
					<?php print $service->service_name; ?>
					</option>
					<?php endforeach;?>
				</select>
			</div>
			<div class="workerWorkshop grouplist">
				<label><?php print HTML::Name($main,'groups','GROUP_SERVICE'); ?></label>
				<select name="user_workshop_id">
					<?php if($selectAll2):?>
					<option value="0" <?php print ($worker->user_workshop_id == 0 ? 'selected' : ''); ?>>
					<?php print HTML::Name($main,'groups','GROUP_SERVICE_ALL'); ?>
					</option>
					<?php endif;?>
					<?php foreach($workshops as $workshop): ?>
					<option value="<?php print $workshop->workshop_id; ?>"<?php print ($worker->user_workshop_id == $workshop->workshop_id ? 'selected' : ''); ?>>
					<?php print $workshop->workshop_name; ?>
					</option>
					<?php endforeach;?>
				</select>
			</div>
			<div class="workerNote note">
				<label>Дополнительная информация</label>
				<textarea name="worker_note" ><?php if($worker->user_note != '') print $worker->user_note; ?></textarea>
			</div>
			<button class="save icon-floppy" name="workshop_id" value="<?php print $worker->user_id; ?>" type="submit">Сохранить</button>
		</form>
	</div>
	<?php endforeach;?>
</div>