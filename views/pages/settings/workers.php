<?php
defined('EXEC') or die;
Rules::settingsWorkers($main) or die('Access Denied');

$workers = Workers::getAll();

if(isset($_GET['id'])){
	$opened = (int)Input::getSanitise($_GET['id']);
}else{
	$opened = 0;
}

var_dump($workers);

?>
<p>Сотрудники</p>
<?php if($mess = SystemMessage::get($main)) print $mess; ?>
<div id="workersList">
	<?php foreach($workers as $worker):?>
	<div class="slideBlock <?php print ($opened !== $worker->user_id ? 'hide' : 'show' ); ?>">
		<form action="/?view=settings&params=workers&task=update&id=<?php print $worker->user_id; ?>" method="POST">
			<div class="panel">
				<div class="userStatus">
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
			<div class="workerName">
				<input type="text" disabled="disabled" required="required" name="user_name" value="<?php if($worker->user_name != '') print $worker->user_name; ?>">
			</div>
			<div class="workerNote">
				<label>Дополнительная информация</label>
				<textarea name="worker_note" ><?php if($worker->user_note != '') print $worker->user_note; ?></textarea>
			</div>
			<button class="save icon-floppy" name="workshop_id" value="<?php print $worker->user_id; ?>" type="submit">Сохранить</button>
		</form>
	</div>
	<?php endforeach;?>
</div>